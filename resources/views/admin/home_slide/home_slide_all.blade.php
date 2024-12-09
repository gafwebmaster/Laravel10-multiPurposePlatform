@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $homeslide->id }}">
                                <h4 class="card-title">Home slide page</h4>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text"
                                            value="{{ $homeslide->title }}" id="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2 col-form-label">Short title</label>
                                    <div class="col-sm-10">
                                        <input name="short_title" class="form-control" type="text"
                                            value="{{ $homeslide->short_title }}" id="short_title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="video_url" class="col-sm-2 col-form-label">Video url</label>
                                    <div class="col-sm-10">
                                        <input name="video_url" class="form-control" type="text"
                                            value="{{ $homeslide->video_url }}" id="video_url">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="home_slide" class="col-sm-2 col-form-label">Home slide</label>
                                    <div class="col-sm-10">
                                        <input name="home_slide" class="form-control" type="file" id="home_slide">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ (!empty($homeslide->home_slide))? url($homeslide->home_slide):url('upload/no_image.jpg') }}" >
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info" value="Update Profile">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
