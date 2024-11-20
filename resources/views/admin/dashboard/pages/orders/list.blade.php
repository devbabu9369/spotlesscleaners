
@extends('admin.dashboard.layouts.default')

@section('content')
<!-- Content Header (Page header) -->



				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Orders</h1>
							</div>
							<div class="col-sm-6 text-right">
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
						<form method="post" action="{{ route('orders') }}">
						    @csrf
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group">
                                        <!-- Search by table_search -->
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        
                                        <!-- Search by status -->
                                        <select name="status" class="form-control float-right ml-2" style="width: 120px;">
                                            <option value="">Select Status</option>
                                            <option value="created">Created</option>
                                            <option value="completed">Completed</option>
                                            <option value="pending">Pending</option>
                                            <option value="fail">Fail</option>
                                        </select>
                        
                                        <!-- Search by date range -->
                                        <input type="date" name="date_from" class="form-control float-right ml-2" placeholder="From Date" id="date_from">
                                        <input type="date" name="date_to" class="form-control float-right ml-2" placeholder="To Date" id="date_to">
                        
                                        <div class="input-group-append ml-2">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>Orders #</th>											
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
											<th>Order Status</th>
											<th>Payment Status</th>
											<th>Payment Type</th>
                                            <th>Total</th>
                                            <th>Order Create Date</th>
                                            <th>Order Date</th>
                                            <th>Assign Order</th>
										</tr>
									</thead>
									<tbody>
									    @foreach($orders as $list)
									  
									  
									  @php
									  
									    $orderDatetime = $list->order_datetime;

                                        $date_time = $list->date_time;
                
                                        
									  @endphp
										<tr>
										<td><a href="{{ route('orderDetails', [$list->id]) }}">{{ $list->order_id }}</a></td>

											<td>{{$list->first_name}}  {{$list->last_name}}</td>
                                            <td>{{$list->email}}</td>
                                            <td>{{$list->phone_number}}</td>
                                             
									 <td>
                                        <span class="badge 
                                            @if($list->status == 'completed')
                                                bg-success
                                            @elseif($list->status == 'pending')
                                                bg-warning
                                            @elseif($list->status == 'processing')
                                                bg-info
                                            @elseif($list->status == 'canceled')
                                                bg-danger
                                            @else
                                                bg-secondary
                                            @endif
                                        ">
                                            
                                            {{$list->status}}
                                        </span>
                                    </td>
                                            											
											
											<td>{{$list->payment_status ?? "Pending"}}</td>
										<td style="text-transform: uppercase;">{{$list->payment_type}}</td>


											
											<td>{{$list->amount}}</td>
                                            <td>{{formatDateTime($date_time)}}</td>																				
                                            <td>{{formatDateTime($orderDatetime)}}</td>																				
                                           <td>
                                                <select name="partner_id"  class="form-control partner_id" data-id="{{$list->id}}">
                                                    <option value="">Select a partner</option>
                                                    @if(!empty($partners))
                                                        @foreach($partners as $p)
                                                           <option value="{{ $p->id }}" {{ $list->partner_id == $p->id ? 'selected' : '' }}>{{ $p->first_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                
                                                
                                            </td>																			
										</tr>
									    @endforeach
									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
								<ul class="pagination pagination m-0 float-right">
								  <li class="page-item"><a class="page-link" href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /.card -->
					
					<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Assignment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="assignmentForm">
                                        @csrf <!-- CSRF token for Laravel -->
                                        <input type="hidden" name="order_id" id="modal_order_id">
                                        <input type="hidden" name="partner_id" id="modal_partner_id">
                                        <p>Are you sure you want to assign this order to the selected partner?</p>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="confirmButton">Yes, Assign</button>
                                </div>
                            </div>
                        </div>
                    </div>
				</section>
			

@endsection