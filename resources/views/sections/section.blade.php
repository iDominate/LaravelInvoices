@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
قائمة الاقسام - برنامج الفواتير
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاقسام</span>
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
										<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة قسم</a>
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
												<th class="border-bottom-0">اسم القسم</th>
												<th class="border-bottom-0">ملاحظات</th>
												<th class="border-bottom-0">العمليات</th>
												<th class="border-bottom-0"></th>
											</tr>
										</thead>
										<tbody>
											
												@foreach ($sections as $section)
												<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$section->section_name}}</td>
												<td>{{$section->description}}</td>
												<td>
													<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{$section->id}}"
														data-section_name="{{$section->section_name}}" data-description="{{$section->description}}" data-toggle="modal" href="#modaldemo9"
														title="تعديل"><i class="las la-pen"></i></a>

														<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{$section->id}}"
															 data-toggle="modal" href="#modaldemo10"
															title="حذف"><i class="las la-trash"></i></a>

												</td>
											</tr>
												@endforeach
												{{-- <td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td> --}}
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- Basic modal -->
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form action="{{ route('sections.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" class="form-control" id="section_name" name="section_name">
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
						<form action="sections/update" method="post">
						@method('PUT')
                        {{ csrf_field() }}
							<input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" class="form-control" id="section_name" name="section_name">
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
									<form action="sections/delete" method="post">
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
		var name = button.data('section_name');
		var description = button.data('description');
		var modal = $(this);
		modal.find('.modal-body #section_name').val(name);
		modal.find('.modal-body #description').val(description);
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