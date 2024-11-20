
@extends('admin.dashboard.layouts.default')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
						 
								<h1>Order: {{ $orderDetails->order_id}}</h1>
							</div>
							<div class="col-sm-6 text-right">
							    <button class="btn btn-primary" data-toggle="modal" data-target="#extraWorkModal" data-order-id="{{ $orderDetails->id }}"><i class="icofont-plus"></i> Add Extra Work</button>
							    @if($orderDetails->status != "completed" && $orderDetails->status != "canceled")
							    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addOrderPayment" data-order-id="{{ $orderDetails->id }}"><i class="icofont-plus"></i> Add Payment</button>
							   @endif
                                <a href="orders.html" class="btn btn-primary">Back</a>
                                
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header pt-3">
                                       <div class="row invoice-info">
    <!-- Customer Address Section -->
                                            <div class="col-md-6">
                                                <h5 class="mb-3">Customer Address</h5>
                                                <p> 
                                              
                                                    <span><strong>Name:</strong> {{$orderDetails->first_name}} {{$orderDetails->last_name}}</span><br>
                                                    <span><strong>Address:</strong> {{$orderDetails->address}}</span><br>
                                                    <span><strong>Email:</strong> {{$orderDetails->email}}</span><br>
                                                    <span><strong>Alternative Number:</strong> {{$orderDetails->phone}}</span><br>
                                                    <span><strong>Mobile Number:</strong> {{$orderDetails->phone_number}}</span>
                                                </p>
                                            </div>
                                        
                                            <!-- Order Info Section -->
                                            <div class="col-md-6 text-md-right">
                                                <p><strong>Order ID:</strong> {{$orderDetails->order_id}}</p>
                                                <p>
                                                    <strong>Status:</strong>
                                                    <span class="badge badge-success">{{$orderDetails->status}}</span>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body table-responsive p-3">								
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th width="100">Price</th>
                                                    <th width="100">Qty</th>                                        
                                                    <th width="100">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                 
                                                $totalPrice = 0;
                                                $total = 0;
                                                @endphp
                                                @if(!empty($orderDetails->order_details))
                                                @foreach($orderDetails->order_details as $list)
                                               
                                                @php
                                                
                                                
                                                 $total = $list->price * $list->quantity;
                                                 $totalPrice += $total;
                                                @endphp
                                                <tr>
                                                    <td>{{$list->name}}</td>
                                                    <td>{{$list->price}}</td>                                        
                                                    <td>{{$list->quantity}}</td>
                                                    <td>Rs. {{$total}}</td>
                                                </tr>
                                              @endforeach
                                              
                                             
                                                @endif
                                                
                                                
                                                 
                                                
                                                @if(!empty($orderDetails->extra_orders))
                                                
                                                <tr class="mx-auto">
                                                    <th colspan="4" class="text-center">Extra Works</th>
                                                   
                                                </tr>
                                                
                                                @foreach($orderDetails->extra_orders as $list)
                                                
                                                @php
                                                
                                                 $total = $list->price * $list->quantity;
                                                 $totalPrice += $total;
                                                @endphp
                                                <tr>
                                                    <td>{{$list->item_name}}</td>
                                                    <td>{{$list->price}}</td>                                        
                                                    <td>{{$list->quantity}}</td>
                                                    <td>Rs. {{$total}}</td>
                                                </tr>
                                              @endforeach
                                              
                                              
                                              
                                          
                                                @endif
                                                
                                                
                                                @if(!empty($orderDetails->order_details) || !empty($orderDetails->extra_orders))
                                                  <tr>
                                                    <th colspan="3" class="text-right">Grand Total:</th>
                                                    <td>Rs. {{$totalPrice}}</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>								
                                    </div>  
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                 @if(!empty($orderDetails->payment_method))
                                <div class="card">
                                   <form id="orderPayment" action="{{ route('changePaymentStatus') }}" method="post">
                                       @csrf
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Payment Status</h2>
                                        <div class="mb-3">
                                            <select name="method" id="method" class="form-control">
                                                <option value="pending"{{$orderDetails->payment_method == 'pending' ? 'selected':''}}>Pending</option>
                                                <option value="fail"{{$orderDetails->payment_method == 'fail' ? 'selected':''}}>Fail</option>
                                                <option value="success"{{$orderDetails->payment_method == 'success' ? 'selected':''}}>Success</option>
                                                
                                            </select>
                                            <input type="hidden"name="payment_order_id"value="{{$orderDetails->id}}">
                                          
                                        </div>
                                        <div class="mb-3">
                                           <button type="button" id="change-payment-status" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                                @endif
                                
                                <div class="card">
                                   <form id="orderStatus" action="{{ route('changeOrderStatus') }}" method="post">
                                       @csrf
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Order Status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                 
                                                <option value="pending"{{$orderDetails->status == 'pending' ? 'selected':''}}>Pending</option>
                                                <option value="fail"{{$orderDetails->status == 'fail' ? 'selected':''}}>Failed</option>
                                                <option value="completed"{{$orderDetails->status == 'completed' ? 'selected':''}}>Completed</option>
                                            </select>
                                            <input type="hidden"name="order_id"value="{{$orderDetails->id}}">
                                          
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                                @if(!empty($orderDetails->partner_id) && $orderDetails->status == "completed")
                              <div class="card">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Send Invoice Email</h2>
                                    <form id="send-invoice-form">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$orderDetails->order_id}}">
                                        <div class="mb-3">
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="" disabled selected>Select option</option>
                                                <option value="customer">Customer</option>
                                                <option value="partner">Partner</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" id="send-invoice-btn" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                            
                            </div>
                        </div>
					</div>
					<!-- /.card -->
				</section>
				
				
				
<!-- Modal for Extra Work -->
<div class="modal fade" id="extraWorkModal" tabindex="-1" role="dialog" aria-labelledby="extraWorkModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="extraWorkModalLabel">Add Extra Work</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="extraWorkForm" action="{{ route('extra.work.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="itemName">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="item_name" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <input type="hidden" id="modalOrderId" name="order_id">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            </div>
        </div>
    </div>
</div>
		
		<!-- Modal for addOrderPayment -->
<div class="modal fade" id="addOrderPayment" tabindex="-1" role="dialog" aria-labelledby="addOrderPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrderPaymentModalLabel">Add Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="paymentadd" method="POST">
                @csrf
              
                <div class="form-group">
                    <label for="price">Order Amount</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <input type="hidden" id="paymentOrderId" name="order_id">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            </div>
        </div>
    </div>
</div>

@endsection