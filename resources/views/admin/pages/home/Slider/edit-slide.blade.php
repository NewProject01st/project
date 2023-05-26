@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Slides
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Slide</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-slide') }}" method="post" id="regForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English</label>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title"
                                            placeholder="Enter the Title">{{ $slider->english_title }}</textarea>
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
                                            placeholder="Enter the Title">{{ $slider->marathi_title }}</textarea>
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
                                            placeholder="Enter the Description">{{ $slider->english_description }}</textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_description"> Description Marathi</label>
                                        <textarea class="form-control marathi_description" name="marathi_description"
                                            id="marathi_description"
                                            placeholder="Enter the Description">{{ $slider->marathi_description }}</textarea>
                                        @if ($errors->has('marathi_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url"> URL</label>
                                        <input type="text" class="form-control" placeholder="Enter the URL"
                                            value="{{ $slider->url }}" name="url" id="url">
                                        @if ($errors->has('url'))
                                        <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
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
                                        src="{{ asset('storage/images/slides/' . $slider->english_image) }}"
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
                                        src="{{ asset('storage/images/slides/' . $slider->marathi_image) }}"
                                        class="img-fluid img-thumbnail" width="150">
                                    <img id="marathi_imgPreview" src="#" alt="pic" class="img-fluid img-thumbnail"
                                        width="150" style="display:none">
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                    <span><a href="{{ route('list-slide') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $slider->id }}"
                                placeholder="">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection