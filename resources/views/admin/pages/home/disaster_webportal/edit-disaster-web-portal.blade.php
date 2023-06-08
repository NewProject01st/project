@extends('admin.layout.master')

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
                        <form class="forms-sample" action="{{ route('update-disaster-management-web-portal') }}"
                            method="post" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_name">Name English</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="text" name="english_name" id="english_name" class="form-control"
                                            value="{{ $disaster_web_portal->english_name }}">
                                        @if ($errors->has('english_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_name">Name Marathi</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="text" name="marathi_name" id="marathi_name" class="form-control"
                                            value="{{ $disaster_web_portal->marathi_name }}">
                                        @if ($errors->has('marathi_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title"
                                            placeholder="Enter the Title">{{ $disaster_web_portal->english_title }}</textarea>
                                        @if ($errors->has('english_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_title">Title Marathi</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control marathi_title" name="marathi_title"
                                            id="marathi_title"
                                            placeholder="Enter the Title">{{ $disaster_web_portal->marathi_title }}</textarea>
                                        @if ($errors->has('marathi_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_description">Description English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_description" name="english_description"
                                            id="english_description"
                                            placeholder="Enter the Description">{{ $disaster_web_portal->english_description }}</textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Description Marathi</label>&nbsp<span class="red-text">*</span>
                                        <textarea class="form-control marathi_description" name="marathi_description"
                                            id="marathi_description"
                                            placeholder="Enter the Description">{{ $disaster_web_portal->marathi_description }}</textarea>
                                        @if ($errors->has('marathi_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_designation">Designation English</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="text" name="english_designation" id="english_designation"
                                            class="form-control"
                                            value="{{ $disaster_web_portal->english_designation }}">
                                        @if ($errors->has('english_designation'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_designation', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_designation">Designation Marathi</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="text" name="marathi_designation" id="marathi_designation"
                                            class="form-control"
                                            value="{{ $disaster_web_portal->marathi_designation }}">
                                        @if ($errors->has('marathi_designation'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_designation', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_image">English Image</label>
                                        <input type="file" name="english_image" class="form-control"
                                            placeholder="image">
                                        @if ($errors->has('english_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <img src="{{ asset('storage/images/disaster-webportal/' . $disaster_web_portal->english_image) }}"
                                        class="img-fluid img-thumbnail" width="150">
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
                                    <img src="{{ asset('storage/images/disaster-webportal/' . $disaster_web_portal->marathi_image) }}"
                                        class="img-fluid img-thumbnail" width="150">
                                </div>

                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                    <span><a href="{{ route('list-disaster-management-web-portal') }}"
                                        class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control"
                                value="{{ $disaster_web_portal->id }}" placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection