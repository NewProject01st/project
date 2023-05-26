@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Disaster Management News
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Disaster Management News
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-disaster-management-news') }}" method="post"
                            id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English</label>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title"
                                            placeholder="Enter the Title">{{$disaster_news->english_title }}</textarea>
                                        @if ($errors->has('english_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_title">Title Marathi</label>
                                        <textarea class="form-control marathi_title" name="marathi_title"
                                            id="marathi_title"
                                            placeholder="Enter the Title">{{$disaster_news->marathi_title }}</textarea>
                                        @if ($errors->has('marathi_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_description">Description English</label>
                                        <textarea class="form-control english_description" name="english_description"
                                            id="english_description"
                                            placeholder="Enter the Description">{{ $disaster_news->english_description }}</textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Description Marathi</label>
                                        <textarea class="form-control marathi_description" name="marathi_description"
                                            id="marathi_description"
                                            placeholder="Enter the Description">{{ $disaster_news->marathi_description }}</textarea>
                                        @if ($errors->has('marathi_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_image">English Image</label>
                                        <input type="file" name="english_image" class="form-control" id="english_image"
                                            accept="image/*" placeholder="image">
                                        @if ($errors->has('english_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                        @endif
                                    </div>

                                    <img id="english"
                                        src="{{ asset('storage/images/disaster-news/' . $disaster_news->english_image) }}"
                                        class="img-fluid img-thumbnail" width="150">
                                    <img id="english_imgPreview" src="#" alt="pic" class="img-fluid img-thumbnail"
                                        width="150" style="display:none">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_image">Marathi Image</label>
                                        <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                            class="form-control">
                                        @if ($errors->has('marathi_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <img id="marathi"
                                        src="{{ asset('storage/images/disaster-news/' . $disaster_news->marathi_image) }}"
                                        class="img-fluid img-thumbnail" width="150">
                                    <img id="marathi_imgPreview" src="#" alt="pic" class="img-fluid img-thumbnail"
                                        width="150" style="display:none">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">English URL</label>
                                        <input type="text" name="english_url" id="english_url" class="form-control"
                                            value="{{ $disaster_news->english_url }}" placeholder="">
                                        @if ($errors->has('english_url'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_url', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Disaster Date</label>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                            name="disaster_date" id="disaster_date"
                                            value="{{ $disaster_news->disaster_date }}" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $disaster_news->id }}"
                                placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection