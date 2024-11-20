@extends('admin.dashboard.layouts.default')

@section('content')

<style>
    .dropdown-menu.show{
        height: 300px;
        overflow-y:auto;
    }
    .multiselect-container > li > a > label {
  margin: 0;
  height: 12% !important;
  cursor: pointer;
  font-weight: 400;
  padding: 5px !important;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Sub Category </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('subCategory.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form id="category"  action="{{ !empty($editdata) ? route('subCategory.update', $editdata->id) : route('subCategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!empty($editdata))
        @method('PUT')
    @endif
            <div class="row">
                <div class="col-md-8  ">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Sub Category  Name</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Subcategory   name " value="{{ $editdata->name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="name">Category</label>

                            <select name="cat_id" id="category" class="form-control">
                                <option value=""> -- Select Category --</option>
                               
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"@if(!empty($editdata->cat_id)) {{$editdata->cat_id == $category->id ? 'selected':''}} @endif>{{$category->name}}</option>

                                @endforeach
                             
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{{ $editdata->description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Media</h2>

                            <div class="file-upload">


                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" id="image" name="image" type='file' onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content" {{ !empty($editdata->image)  ?'style=display:block':''}}>
                                @if(!empty($editdata->image))
                                    <img class="file-upload-image" src="{{ asset('images/' . $editdata->image) }}" alt="your image" style="display:block" />
                                   @else
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    @endif
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4  "> 
                
              @php
    // Convert the comma-separated string to an array
                     $selectedIds = isset($editdata) ? explode(',', $editdata->sub_category_name) : [];
                @endphp
                
                <select id="multiple-checkboxes" name="sub_category_name[]" multiple="multiple">
                    @foreach($carName as $list)
                        <option value="{{ $list->id }}" 
                            @if(in_array($list->id, $selectedIds)) selected @endif>
                            {{ $list->car_name }}
                        </option>
                    @endforeach
                </select>

                </div>
            </div>

            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
    </div>
    </form>
    <!-- /.card -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection


@section('scripts')
@if ($errors->any())

@endif
@endsection