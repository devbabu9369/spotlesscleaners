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
                <h1>Be Comes partner </h1>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">

        <div class="card">

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Work Type</th>
                            <th>Address</th>
                            <th>Message</th>
                            <th>Date Time</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partners as $index => $partner)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->phone_number }}</td>
                            <td>{{ $partner->work_name }}</td>
                            <td>{{ $partner->address }}</td>
                            <td>
                                <div class="descriptions">
                                    {{ $partner->message }}
                                </div>
                            </td>
                             <td>
                                {{ $partner->created_at }}
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No record found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <!--    </div>-->
            <!--</div>-->
            <!-- /.card -->
</section>

@endsection