@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-6">

                    <!-- Simple card -->
                    <div class="card">
                        <center>
                            <img class="rounded-circle avatar-xl mt-4" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url(upload/no_image.jpg) }}"
                                alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                            <h4 class="card-title">Username: {{ $adminData->username }}</h4> 
                            <h4 class="card-title">Email: {{ $adminData->email }}</h4>                           
                           <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit profile</a>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
@endsection
