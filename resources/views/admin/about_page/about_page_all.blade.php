@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $aboutpage->id }}">
                                <h4 class="card-title">About page</h4>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text"
                                            value="{{ $aboutpage->title }}" id="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2 col-form-label">Short title</label>
                                    <div class="col-sm-10">
                                        <input name="short_title" class="form-control" type="text"
                                            value="{{ $aboutpage->short_title }}" id="short_title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_description" class="col-sm-2 col-form-label">Short description</label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control">
                                            {{ $aboutpage->short_title }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="elm1" class="col-sm-2 col-form-label">Long description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="long_description">
                                            {{ $aboutpage->long_description }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="about_image" class="col-sm-2 col-form-label">About image</label>
                                    <div class="col-sm-10">
                                        <input name="about_image" class="form-control" type="file"
                                            value="{{ $aboutpage->about_image }}" id="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ (!empty($aboutpage->about_image))? url($aboutpage->about_image):url('upload/no_image.jpg') }}" >
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info" value="Update About">
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
