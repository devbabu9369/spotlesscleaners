@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Cars </h1>
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
        <form id="category" action="{{ !empty($editdata) ? route('cars.update', $editdata->id) : route('cars.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="title">Car Name</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Service name " value="{{ $editdata->name ?? '' }}">
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

