@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Category </h1>
            </div>
            <div class="col-sm-6 text-right">
                {{--<a href="{{ route('logo')}}" class="btn btn-primary">Back</a>--}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form id="category" action="{{ !empty($editdata) ? route('category.update', $editdata->id) : route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!empty($editdata))
            @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Category Name</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Service name " value="{{ $editdata->name ?? '' }}">
                                    </div>
                                </div>
                            </div>
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
                     <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="active_page" id="featured" class="form-check-input" {{ !empty($editdata->active_page) ? 'checked' : '' }}>
                                <label for="featured" class="form-check-label">Active Page</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                </div>
                <div class="col-md-4">

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

