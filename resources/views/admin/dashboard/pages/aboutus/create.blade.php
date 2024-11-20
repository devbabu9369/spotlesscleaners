@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Page </h1>
            </div>
            <div class="col-sm-6 text-right">
               -<a href="{{ route('pages.index')}}" class="btn btn-primary">Back</a> 
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form id="category" action="{{ !empty($editdata) ? route('pages.update', $editdata->id) : route('pages.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="title">Page Name</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Page Title " value="{{ $editdata->title ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
           

                 <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                            <h2 class="h4 mb-3">Bannr Image</h2>

                            <div class="file-upload">


                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" id="image" name="banner_image" type='file' onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>

                                <div class="file-upload-content" {{ !empty($editdata->banner_image)  ?'style=display:block':''}}>
                                    @if(!empty($editdata->banner_image))
                                    <img class="file-upload-image" src="{{ asset('aboutImage/' . $editdata->banner_image) }}" alt="your image" style="display:block" />
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
                    </div>
                    
                     <div class="card mb-3">
                        <div class="card-body">
                     <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{{ $editdata->content ?? '' }}</textarea>
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
                <a href="{{ (route('pages.index'))}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
    </div>
    </form>
    <!-- /.card -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection

