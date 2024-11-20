
@extends('admin.dashboard.layouts.default')

@section('content')
<!-- Content Header (Page header) -->



				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Customer Reviews</h1>
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
            <div class="card-body">
                <!-- Nav tabs -->
             <!-- Reviews Tab -->
                  
                    <!-- Ratings Tab -->
                     
                        <div class=" table table-responsive p-0">
                            <!-- Replace this section with your ratings table -->
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User Name</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample data, replace with actual ratings data -->
                                    @foreach ($ratings as $rating)
                                    
                                    <tr>
                                        <td>{{ $rating->order_id }}</td>
                                        <td>{{ $rating->full_name }} </td>
                                        <td>{{ $rating->rating_value }}</td>
                                        <td>  <div class="descriptions">{{ $rating->review }}</div></td>
                                        
                                        <td>{{ \Carbon\Carbon::parse($rating->created_at)->format('d-M-Y H:i') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
</section>

			

@endsection