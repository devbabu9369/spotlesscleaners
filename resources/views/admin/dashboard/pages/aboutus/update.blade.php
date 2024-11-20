@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update About Us </h1>
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
        
            <form id="aboutus" action="{{ isset($editdata) ? route('aboutUs.update', $editdata->id) : '#' }}" method="POST" enctype="multipart/form-data">

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
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" value="{{ $editdata->title ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="card mb-3 p-3">
    <div class="form-group">
        <label> Upload Banner Image </label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="banner_image" name="banner_image" aria-describedby="banner_image">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>
    
    <div class="form-group">
        <label> Upload Image </label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>
</div>
         <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{{ $editdata->description ?? '' }}</textarea>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">

                </div>
            </div>

            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
    </div>
    </form>
    <!-- /.card -->
</section>
<script>
    // Function to update the label with the selected file name
    function updateFileName(inputElement) {
        var fileName = inputElement.files[0].name;
        var label = inputElement.nextElementSibling;
        label.innerText = fileName;
    }

    // Add event listeners for all file inputs
    document.querySelectorAll('.custom-file-input').forEach(function(inputElement) {
        inputElement.addEventListener('change', function(e) {
            updateFileName(e.target);
        });
    });
</script>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection

