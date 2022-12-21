@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ معلومات الفاتورة</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
					
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									معلومات عن الفاتورة
								</div>
                                <hr>
                                <br>
								<p class="mg-b-20">انقر اي قسم لمعرفة معلومات اكثر عن الفاتورة</p>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab4" class="nav-link active" data-toggle="tab">الفاتورة</a></li>
														<li><a href="#tab5" class="nav-link" data-toggle="tab">الحالة</a></li>
														<li><a href="#tab6" class="nav-link" data-toggle="tab">مرفقات الفاتورة</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
                                                    <div class="tab-pane active" id="tab4">
                                                            <span>
                                                                <h5>رقم الفاتورة</h5>
                                                                <p>{{$invoice->id}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>تاريخ الفاتورة</h5>
                                                                <p>{{$invoice->invoice_date}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>تاريخ الاستحقاق</h5>
                                                                <p>{{$invoice->due_date}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>المنتج</h5>
                                                                <p>{{$invoice->product_name}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>القسم</h5>
                                                                <p>{{$invoice->section_name}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>الخصم</h5>
                                                                <p>{{$invoice->discount}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>معدل الخصم</h5>
                                                                <p>{{$invoice->rate_vat}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>المبلغ الكلي</h5>
                                                                <p>{{$invoice->total}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>مبلغ العمولة</h5>
                                                                <p>{{$invoice->commision_amount}}</p>
                                                                <hr>
                                                                <br>
                                                            </span>
                                                            <span>
                                                                <h5>اجمالي المبلغ المحصل من العمولة</h5>
                                                                <p>{{$invoice->collection_amount}}</p>
                                                            </span>
													</div>

                                                    <div class="tab-pane" id="tab5">
														<div class="col-xl-12">
                                                            <div class="card mg-b-20">
                                                                <div class="card-header pb-0">
                                                                    <div class="d-flex justify-content-between">
                                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table id="example" class="table key-buttons text-md-nowrap">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="border-bottom-0">#</th>
                                                                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                                                                    <th class="border-bottom-0">تاريخ الفاتورة</th>
                                                                                    <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                                                                    <th class="border-bottom-0">المنتج</th>
                                                                                    <th class="border-bottom-0">القسم</th>
                                                                                    <th class="border-bottom-0">الحالة</th>
                                                                                    <th class="border-bottom-0"></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($invoice_details as $invoice_detail)
                                                                                <tr>
                                                                                    <td>{{$invoice_detail->id}}</td>
                                                                                    <td>{{$invoice_detail->invoice_number}}</td>
                                                                                    <td>{{$invoice_detail->invoice_date}}</td>
                                                                                    <td>{{$invoice_detail->due_date}}</td>
                                                                                    <td>{{$invoice_detail->product_name}}</td>
                                                                                    <td>{{$invoice_detail->section_name}}</td>
                                                                                    @if ($invoice_detail->status_value == 1)
                                                                                        <td class="text-success">{{$invoice_detail->status}}</td>
                                                                                    @else
                                                                                    <td class="text-danger">{{$invoice_detail->status}}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                @endforeach
        
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
													</div>
													<div class="tab-pane" id="tab6">
														<div class="col-xl-12">
                                                            <div class="card mg-b-20">
                                                                <div class="card-header pb-0">
                                                                    <div class="d-flex justify-content-between">
                                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table id="example" class="table key-buttons text-md-nowrap">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="border-bottom-0">اسم الملف</th>
                                                                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                                                                    <th class="border-bottom-0">حرر من قبل</th>
                                                                                    <th class="border-bottom-0">تاريخ الاضافة</th>
                                                                                    <th class="border-bottom-0">العمليات</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($attachments as $attachment)  
                                                                                <tr>
                                                                                    <td>{{$attachment->file_name}}</td>
                                                                                    <td>{{$attachment->invoice_number}}</td>
                                                                                    <td>{{$attachment->created_by}}</td>
                                                                                    <td>{{$attachment->created_at}}</td>
                                                                                    <td>
                                                                                        <a class="btn btn-info"
                                                                                        href="{{route('file.view', ['invoice_number' => $attachment->invoice_number, 'file_name' => $attachment->file_name])}}">
                                                                                        عرض
                                                                                        </a>
                                                                                        <a class="btn btn-primary"
                                                                                        href="{{route('file.download', ['invoice_number' => $attachment->invoice_number, 'file_name' => $attachment->file_name])}}">
                                                                                        تحميل
                                                                                        </a>
                                                                                        <a class="btn btn-danger"
                                                                                        href="{{route('file.download', ['invoice_number' => $attachment->invoice_number, 'file_name' => $attachment->file_name])}}">
                                                                                        حذف
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
        
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
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
@endsection