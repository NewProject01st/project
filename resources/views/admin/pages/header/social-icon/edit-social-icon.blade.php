@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Social Icon
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Social Icon
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-social-icon') }}" method="post" id="regForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon">Social Icon</label><br>
                                        <input type="file" name="icon" class="form-control" placeholder="image">
                                        @if ($errors->has('icon'))
                                        <span class="red-text"><?php echo $errors->first('icon', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <img src="{{ asset('storage/images/header/social-icon/' . $social_icon->english_image) }}"
                                        class="img-fluid img-thumbnail" width="150">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">English URL</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" name="url" id="url" class="form-control"
                                            value="{{ $social_icon->url }}" placeholder="">
                                        @if ($errors->has('url'))
                                        <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <span><a href="{{ route('list-social-icon') }}"
                                        class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $social_icon->id }}"
                                placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection