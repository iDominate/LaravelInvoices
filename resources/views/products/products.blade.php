@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					@if (session()->has('Success'))
					<div class="alert alert-success dismissable fade show" role="alert">
						<strong>{{session()->get('Success')}}</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
						
					@endif

					@if (session()->has('Error'))
					<div class="alert alert-danger dismissable fade show" role="alert">
						<strong>{{session()->get('Error')}}</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
						
					@endif
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<div class="col-sm-6 col-md-4 col-xl-3">
										<a  class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة منتج</a>
									</div>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">اسم المنتج</th>
												<th class="border-bottom-0">اسم القسم</th>
												<th class="border-bottom-0">ملاحظات</th>
												<th class="border-bottom-0">العمليات</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($products as $product)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$product->product_name}}</td>
												<td>{{$product->section_name}}</td>
												<td>{{$product->description}}</td>
												<td>
													<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{$product->id}}"
														data-product_name="{{$product->product_name}}"
														data-section_name="{{$product->section_name}}" data-description="{{$product->description}}" data-toggle="modal" href="#modaldemo9"
														title="تعديل"><i class="las la-pen"></i></a>

														<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{$product->id}}"
															 data-toggle="modal" href="#modaldemo10"
															title="حذف"><i class="las la-trash"></i></a>
												</td>
												
											</tr>
											@endforeach
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal" id="modaldemo8">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="{{ route('products.store') }}" method="post">
									{{ csrf_field() }}
			
									<div class="form-group">
										<label for="exampleInputEmail1">اسم المنتج</label>
										<input type="text" class="form-control" id="product_name" name="product_name">
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">اسم القسم</label>
										<select name="section_id" id="section_id" class="form-control" required>
											<option value="" selected disabled>-- حدد القسم --</option>
											@foreach ($sections as $section)
												<option value="{{$section->id}}">{{$section->section_name}}</option>
											@endforeach
										</select>
									</div>
			
									<div class="form-group">
										<label for="exampleFormControlTextarea1">ملاحظات</label>
										<textarea class="form-control" id="description" name="description" rows="3"></textarea>
									</div>
			
									<div class="modal-footer">
										<button type="submit" class="btn btn-success">تاكيد</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
								<!-- End Basic modal -->
			
													<!-- Basic modal -->
					<div class="modal" id="modaldemo9">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">تعديل القسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="products/update" method="post">
										@method('PUT')
										{{ csrf_field() }}
										<input type="hidden" name="id" id="id">
										<div class="form-group">
											<label for="exampleInputEmail1">اسم المنتج</label>
											<input type="text" class="form-control" id="product_name" name="product_name">
										</div>
	
										<div class="form-group">
											<label for="exampleInputEmail1">اسم القسم</label>
											<select name="section_id" id="section_id" class="form-control" required>
												<option value="" selected disabled>-- حدد القسم --</option>
												@foreach ($sections as $section)
													<option value="{{$section->id}}">{{$section->section_name}}</option>
												@endforeach
											</select>
										</div>
				
										<div class="form-group">
											<label for="exampleFormControlTextarea1">ملاحظات</label>
											<textarea class="form-control" id="description" name="description" rows="3"></textarea>
										</div>
				
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">تاكيد</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
								<!-- End Basic modal -->
			
								<div class="modal" id="modaldemo10">
									<div class="modal-dialog" role="document">
										<div class="modal-content modal-content-demo">
											<div class="modal-header">
												<h6 class="modal-title">تعديل القسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												<form action="products/delete" method="post">
												@method('DELETE')
												{{ csrf_field() }}
													<input type="hidden" name="id" id="id">
												<h3>هل انت متأكد من عملية الحذف؟</h3>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">تاكيد</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
												</div>
											</form>
											</div>
										</div>
									</div>
								</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

<script>
	$('#modaldemo9').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var name = button.data('product_name');
		var description = button.data('description');
		var section_id = button.data('section_id')
		var modal = $(this);
		modal.find('.modal-body #product_name').val(name);
		modal.find('.modal-body #description').val(description);
		modal.find('.modal #section_id').val(section_id);
		modal.find('.modal-body #id').val(id);
		console.log(id);
	});

	$('#modaldemo10').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var modal = $(this);
		modal.find('.modal-body #id').val(id);
		console.log(id);
	});
</script>
@endsection