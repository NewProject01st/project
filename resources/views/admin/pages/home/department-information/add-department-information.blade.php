@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Department Information
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Department Information</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-department-information') }}" method="POST"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title" placeholder="Enter the Title">{{ old('english_title') }}</textarea>
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
                                            id="marathi_title" placeholder="Enter the Title">{{ old('marathi_title') }}</textarea>
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
                                            id="english_description" placeholder="Enter the Description"
                                            name="english_description">{{ old('english_description') }}</textarea>
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
                                            id="marathi_description" placeholder="Enter the Description">{{ old('marathi_description') }}</textarea>
                                        @if ($errors->has('marathi_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_image">Icon English</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="english_image" id="english_image" accept="image/*" value="{{ old('english_image') }}"><br>
                                        @if ($errors->has('english_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_image">Icon Marathi</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="marathi_image" id="marathi_image" accept="image/*" value="{{ old('marathi_image') }}"><br>
                                        @if ($errors->has('marathi_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_image_new">Image English</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="english_image_new" id="english_image_new" accept="image/*" value="{{ old('english_image_new') }}"><br>
                                        @if ($errors->has('english_image_new'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_image_new', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_image_new">Image Marathi</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="marathi_image_new" id="marathi_image_new" accept="image/*" value="{{ old('marathi_image_new') }}"><br>
                                        @if ($errors->has('marathi_image_new'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_image_new', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" name="url" id="url" class="form-control" id="url"
                                            placeholder="" value="{{ old('url') }}">
                                        @if ($errors->has('url'))
                                        <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    {{-- <button type="submit" class="btn btn-danger">Cancel</button> --}}
                                    <span><a href="{{ route('list-department-information') }}"
                                        class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection