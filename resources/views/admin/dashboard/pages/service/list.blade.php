 @extends('admin.dashboard.layouts.default')

 @section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid my-2">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Services</h1>
                 </div>
                 <div class="col-sm-6 text-right">
                     <a href="{{ route('service.create') }}" class="btn btn-primary">Add Service</a>
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

                 
                 <form action="{{ route('service.index') }}" method="GET">
                     <div class="card-tools">
                         <div class="row">
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <select name="cate_id" id="mySelect" class="form-control selectsubCategory">
                                         <option value="">Search by category</option>
                                         @foreach ($categories as $rows)
                                             <option value="{{ $rows->id }}"
                                                 {{ request('cate_id') == $rows->id ? 'selected' : '' }}>
                                                 {{ $rows->name }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <select name="subcate_id" id="sub_category" class="form-control">
                                         <option value="">Search by subcategory</option>

                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                    
                                         <input type="text" name="service_name" class="form-control float-right"
                                             placeholder="Search by service name"   value="{{ request()->input('service_name') }}" >
 
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="input-group-append">
                                     <div class="form-group mr-2">
                                         <button type="submit" class="btn btn-outline-primary">Search</button>
                                     </div>
                                     <div class="form-group">
                                         <a href="{{ route('service.index') }}" class="btn btn-outline-dark">Clear</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
                </div>
                 <div class="card-body table-responsive p-0">


                     <table class="table table-hover text-nowrap">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>image</th>
                                 <th>Category Name</th>
                                 <th>sub Category name </th>
                                 <th>service name </th>
                                 <th class="descriptions">Descriptions </th>

                                 <th>price</th>
                                 <th>total_time</th>
                                 <th>slug</th>
                                 <th>status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>

                                                  @php
    // Calculate the starting serial number based on the current page
    $perPage = $listData->perPage(); // Get the number of items per page
    $currentPage = $listData->currentPage(); // Get the current page
    $i = ($currentPage - 1) * $perPage + 1; // Calculate the starting number for the current page
@endphp
                             @foreach ($listData as $rowsData)
                                 <tr>


                                     <td>{{ $i++ }}</td>
                                     <td>
                                         @if ($rowsData->image)
                                             <img src="{{ asset('serviceImages/' . $rowsData->image) }}"
                                                 class="img-thumbnail" width="50">
                                         @else
                                             No Image
                                         @endif
                                     </td>
                                     <td>{{ $rowsData->category_name }}</td>
                                     <td>{{ $rowsData->sub_category_name }}</td>
                                     <td>{{ $rowsData->service_name }}</td>
                                     <td>
                                         <div class="descriptions">
                                             {!! html_entity_decode($rowsData->dec) !!}
                                         </div>
                                     </td>
                                     <td>{{ $rowsData->price }}</td>
                                     <td>{{ $rowsData->total_time }}</td>
                                     <td>{{ $rowsData->slug }}</td>



                                     <td>
                                         <div class="custom-control custom-switch">
                                             <input type="checkbox"
                                                 onchange="changeStatus('{{ $rowsData->id }}', '{{ $rowsData->status }}','<?= route('checkbox') ?>', 'Service')"
                                                 class="custom-control-input" {{ $rowsData->status ? 'checked' : '' }}
                                                 id="customSwitch{{ $rowsData->id }}">
                                             <label class="custom-control-label"
                                                 for="customSwitch{{ $rowsData->id }}"></label>
                                         </div>
                                     </td>
                                     <td>
                                         <a href="{{ route('service.edit', $rowsData->id) }}">
                                             <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                 <path
                                                     d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                 </path>
                                             </svg>
                                         </a>
                                         <form id="deleteForm{{ $rowsData->id }}"
                                             action="{{ route('service.destroy', $rowsData->id) }}" method="POST"
                                             style="display: inline;">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-link text-danger p-0">
                                                 <svg class="filament-link-icon w-4 h-4 mr-1"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor" aria-hidden="true">
                                                     <path fill-rule="evenodd"
                                                         d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                         clip-rule="evenodd"></path>
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
        @if ($listData->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $listData->previousPageUrl() }}">«</a></li>
        @endif

        <!-- Pagination Links -->
        @for ($i = 1; $i <= $listData->lastPage(); $i++)
            @if ($i == $listData->currentPage())
                <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $listData->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        <!-- Next Page Link -->
        @if ($listData->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $listData->nextPageUrl() }}">»</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">»</a></li>
        @endif

        <!-- "All" Option -->
        <!--<li class="page-item">-->
        <!--    <a class="page-link" href="{{ request()->fullUrlWithQuery(['all' => 'true']) }}">All</a>-->
        <!--</li>-->
    </ul>
</div>

             </div>
         </div>
         <!-- /.card -->
     </section>
       <script>
        $(document).on('change', '.selectsubCategory', function() {
            var baseUrl = '/';

            var catId = $(this).val();
            var subcatId = $(this).attr('data-value');
            var url = baseUrl + 'admin/getsubcategory/' + catId;
            changeCategory(url, subcatId);

        });


        function changeCategory(url, subcatId) {
            $.ajax({
                url: url,
                type: 'GET', // Ensure the method is correctly set
                dataType: 'json', // Ensure the response is parsed as JSON
                success: function(response) {
                    // Handle the response here
                    if (response.status == false) {
                        $('#sub_category').empty();
                        $('#sub_category').append('<option value="">Select Subcategory</option>');
                    } else {
                        $.each(response.data, function(key, value) {
                            var selcted = value.id == subcatId ? 'selected' : '';
                            $('#sub_category').append(
                                `<option ${selcted} value="${value.id}"> ${value.name}</option>`);

                        });
                    }


                },
                error: function(xhr, status, error) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        toastr.error(response["message"]);
                    } catch (e) {
                        toastr.error('An error occurred');
                    }
                }
            });
        }
    </script>
     <!-- /.content -->

     <!-- /.content-wrapper -->
 @endsection
