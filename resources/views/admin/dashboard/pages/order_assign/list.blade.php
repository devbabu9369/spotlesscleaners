@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Assign Orders</h1>
            </div>
            <div class="col-sm-6 text-right">
                {{--<a href="{{ route('banner.create')}}" class="btn btn-primary">Assign Orders List</a>--}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">


                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Partner Name</th>
                            <th>Customer Email</th>
                            <th>Customer Number </th>

                            
                            <th>Order Create Date</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                  <tbody>
                     
                        @foreach($orders as $order)
                        
                        @php
									  
									    $orderDatetime = $order->order_datetime;

                                        $date_time = $order->date_time;
                                        
									  @endphp
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>
                               {{$order->partner_name}}
                            </td>
                            <td>{{ $order->email }}</td>

                            <td> {{$order->phone_number}}</td>
                            
                           
                           <td>{{formatDateTime($date_time)}}</td>																				
                          <td>{{formatDateTime($orderDatetime)}}</td>	
                            <td>
                                        <span class="badge 
                                            @if($order->status == 'completed')
                                                bg-success
                                            @elseif($order->status == 'pending')
                                                bg-warning
                                            @elseif($order->status == 'canceled')
                                                bg-danger
                                            @else
                                                bg-secondary
                                            @endif
                                        ">
                                            
                                            {{$order->status}}
                                        </span>
                                    </td>
                           
                            <!--<td>-->
                            <!--   {{"Delete"}}-->
                            <!--</td>-->
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
</section>
<!-- /.content -->

<!-- /.content-wrapper -->


@endsection