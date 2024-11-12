@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('update.password') }}" >
                                @csrf
                                
                                <h4 class="card-title">Change password page</h4>
                                @if (count($errors))
                                    @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                                    @endforeach                                    
                                @endif
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Old password</label>
                                    <div class="col-sm-10">
                                        <input name="oldpassword" class="form-control" type="password"
                                             id="oldpassword">
                                    </div>
                                </div>   
                                
                                <div class="row mb-3">
                                    <label for="newpassword" class="col-sm-2 col-form-label">New password</label>
                                    <div class="col-sm-10">
                                        <input name="newpassword" class="form-control" type="password"
                                             id="newpassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirm password</label>
                                    <div class="col-sm-10">
                                        <input name="confirm_password" class="form-control" type="password"
                                             id="confirm_password">
                                    </div>
                                </div>
                                                           
                                <input type="submit" class="btn btn-info" value="Change password">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
   
@endsection
