@extends('admin.dashboard.layouts.default')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Partner</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('partner.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
     <form id="category" action="{{ !empty($editdata) ? route('partner.update', $editdata->id) : route('partner.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your first name" value="{{ old('first_name', $editdata->first_name ?? '') }}">
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
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name" value="{{ old('last_name', $editdata->last_name ?? '') }}">
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
                                <label for="email">Contact Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email', $editdata->email ?? '') }}">
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
                                <label for="phone_number">Mobile Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter your mobile number" value="{{ old('phone_number', $editdata->phone_number ?? '') }}">
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
                            <div class="mb-3 eyeIcon" >
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                                <i class="fa fa-eye " id="eyeIcon"></i>
                                @if (!empty($editdata))
                                    <small>Leave blank to keep current password</small>
                                @endif
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
                                <label for="usertype">Select User Type</label>
                                <select class="form-control" name="usertype">
                                    <option value="admin" {{ old('usertype', $editdata->usertype ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('usertype', $editdata->usertype ?? '') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="partner" {{ old('usertype', $editdata->usertype ?? '') == 'partner' ? 'selected' : '' }}>Partner</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Media</h2>

                            <div class="file-upload">


                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" id="image" name="profile_picture" type='file' onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content" {{ !empty($editdata->profile_image)  ?'style=display:block':''}}>
                                @if(!empty($editdata->profile_image))
                                    <img class="file-upload-image" src="{{ asset('userProfile/' . $editdata->profile_image) }}" alt="your image" style="display:block" />
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

    <div class="pb-5 pt-3">
        <button type="submit" class="btn btn-primary">{{ !empty($editdata) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('partner.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
    </div>
</form>

    <!-- /.card -->
</section>

 <script>
     
      $(document).on('click', '#eyeIcon', function () {
                
               var $passwordField = $('#password');
        
        // Check the current type of the password field and toggle it
        if ($passwordField.attr('type') === 'password') {
            $passwordField.attr('type', 'text');
            // Optional: Change the icon or add a class to indicate visibility
            $(this).addClass('show-password'); // Example class
        } else {
            $passwordField.attr('type', 'password');
            // Optional: Change the icon or remove the class to indicate hidden
            $(this).removeClass('show-password'); // Example class
        }
                
            })
 </script>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection