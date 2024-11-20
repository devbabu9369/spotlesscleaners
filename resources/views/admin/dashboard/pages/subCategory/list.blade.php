<style>
    .descriptions {
        text-wrap: wrap;
        overflow-y: hidden;

    }
</style>
@extends('admin.dashboard.layouts.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub subCategories</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('subCategory.create') }}" class="btn btn-primary">New Sub Category</a>
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
                   <form action="{{ route('subCategory.index') }}" method="GET">
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
                        @foreach ($subCategories as $sub)
                            <option value="{{ $sub->id }}"
                                {{ request('subcate_id') == $sub->id ? 'selected' : '' }}>
                                {{ $sub->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group-append">
                   <div class="form-check mr-2">
                      <input class="form-check-input" type="checkbox" name="activeSubCate" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Active 
                      </label>
                    </div>
                    <div class="form-group mr-2">
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                    <div class="form-group mr-2">
                        <a href="{{ route('subCategory.index') }}" class="btn btn-outline-dark">Clear</a>
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
                <th>Image</th>
                <th>Category Name</th>
                <th>Subcategory Name</th>
                <th>Descriptions</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subCategories as $index => $data)
                <tr>
                    <td>{{ $subCategories->firstItem() + $index }}</td> <!-- Correctly show the item number -->
                    <td>
                        @if ($data->image)
                            <img src="{{ asset('images/' . $data->image) }}" class="img-thumbnail" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $data->catName }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <div class="descriptions">
                            {!! html_entity_decode($data->description) !!}
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox"
                                onchange="changeStatus('{{ $data->id }}', '{{ $data->status }}','{{ route('checkbox') }}', 'SubCategory')"
                                class="custom-control-input" {{ $data->status ? 'checked' : '' }}
                                id="customSwitch{{ $data->id }}">
                            <label class="custom-control-label" for="customSwitch{{ $data->id }}"></label>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('subCategory.edit', $data->id) }}">
                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                        </a>
                        <form id="deleteForm{{ $data->id }}"
                            action="{{ route('subCategory.destroy', $data->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger p-0">
                                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No record found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="card-footer clearfix">
    {{ $subCategories->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
        <!--    </div>-->
        <!--</div>-->
        <!-- /.card -->
    </section>
   
@endsection
