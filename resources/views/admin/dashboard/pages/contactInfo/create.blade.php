@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Contact Information </h1>
            </div>
            <div class="col-sm-6 text-right">
                {{--<a href="{{ route('contactInfo.store')}}" class="btn btn-primary">Back</a>--}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form id="category" action="{{ !empty($editdata) ? route('contactInfo.update', $editdata->id) : route('contactInfo.store') }}" method="POST" >
            @csrf
            @if(!empty($editdata))
            @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Contact Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name " value="{{ $editdata->name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Contact Emial</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your  Email " value="{{ $editdata->email ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Contact  Mobile</label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile no " value="{{ $editdata->mobile_no ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Contact  Address</label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address " value="{{ $editdata->address ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"> {{$editdata->description ?? ''}}</textarea>
                    </div>
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