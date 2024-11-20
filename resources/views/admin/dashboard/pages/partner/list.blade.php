@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Users</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('partner.create')}}" class="btn btn-primary">New Users</a>
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
                    <form action="{{route('partner.index')}}"  method="GET">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="partnerName" class="form-control float-right" value="{{ request()->input('partnerName') }}" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
            <div class="card-body table-responsive p-0">
             


                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Profile</th>
                            <th>User Name</th>
                           
                            <th>User Email</th>
                            <th>User Mobile</th>
                             <th>User Type</th> 
                              {{--<th>Status</th>--}} 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($partners as $rows)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td> @if(!empty($rows->profile_image))
                                    <img class="img-fluid rounded-circle" src="{{ asset('userProfile/' . $rows->profile_image) }}" alt="your image" style="display:block" />
                                   @else
                                    <img class="img-fluid rounded-circle" src="{{ asset('/admin-assets/img/avatar5.png')}}" alt="your image" />
                                    @endif</td>
                            <td>{{ $rows->first_name . ' ' . $rows->last_name }}</td>

                              <td>{{ $rows->email }}</td>
                              <td>{{ $rows->phone_number }}</td>
                              <td>{{ $rows->usertype }}</td>
                            {{--<td>
                               

                                <div class="custom-control custom-switch">
                                    <input type="checkbox"  onchange="changeStatus('{{ $rows->id }}', '{{ $rows->status }}','<?=route('checkbox') ?>', 'user')"
                                     class="custom-control-input" {{ $rows->status ? 'checked' : '' }} id="customSwitch{{ $rows->id }}">
                                    <label class="custom-control-label" for="customSwitch{{ $rows->id }}"></label>
                                </div>
                            </td>--}}
                            <td>
                                <a href="{{ route('partner.edit', $rows->id) }}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <form id="deleteForm{{ $rows->id }}" action="{{ route('partner.destroy', $rows->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <div class="card-footer clearfix">
    <ul class="pagination pagination m-0 float-right">
        <!-- Previous Page Link -->
        @if ($partners->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $partners->previousPageUrl() }}">«</a></li>
        @endif

        <!-- Pagination Links -->
        @for ($i = 1; $i <= $partners->lastPage(); $i++)
            @if ($i == $partners->currentPage())
                <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $partners->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        <!-- Next Page Link -->
        @if ($partners->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $partners->nextPageUrl() }}">»</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">»</a></li>
        @endif
    </ul>
</div>


        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->


@endsection