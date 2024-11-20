@extends('admin.dashboard.layouts.default')

@section('content')






<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Service </h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('service.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{ !empty($editdata) ? route('service.update', $editdata->id) :
             route('service.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="title">Service Name</label>
                                        <input type="text" name="service_name" id="service_name" class="form-control" placeholder="Service name" value="{{$editdata->service_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"> {{$editdata->dec ?? ''}}</textarea>
                                    </div>
                                </div>
                            </div>
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
                                    <img class="file-upload-image" src="{{ asset('serviceImages/' . $editdata->image) }}" alt="your image" style="display:block" />
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
                <div class="col-md-4">

                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4  mb-3">Service category</h2>
                            <div class="mb-3">
                                <label for="category">Category</label>


                                {{ $data= !empty($editdata) ? $editdata->subcate_id: ''}}

                                <select name="cate_id" id="mySelect" data-value="{{$data}}" class="form-control selectsubCategory">
                                    <option value="">-- Select Category ---</option>
                                    @foreach($categories as $category)


                                    <option value="{{$category->id}} " @if(!empty($editdata->cate_id))
                                        {{$editdata->cate_id == $category->id ? 'selected':''}}
                                        @endif

                                        >{{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category">Sub category</label>
                                <select name="subcate_id" id="sub_category" class="form-control">
                                    <option value="">-----Select subcategory----</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Price"  value="{{$editdata->price ?? ''}}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Take Time</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Time In(min)</label>
                                        <input type="number" name="take_time" id="take_time" class="form-control" placeholder="Take time " value="{{$editdata->total_time ?? ''}}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Create</button>
                <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
@if(!empty($editdata->cate_id))
<script>
    $(document).ready(function() {
        $('#mySelect').trigger('change');
    });
</script>
@endif
@endsection