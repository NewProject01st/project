@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Sub Header Info
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Sub Header Info
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-sub-header-info') }}" method="post"
                            id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_tollfree_title">English Toll Free Title</label>
                                        <input type="text" name="english_tollfree_title" id="english_tollfree_title"
                                            value="{{ $subheader_info->english_tollfree_title }}" class="form-control"
                                            placeholder="">
                                        @if ($errors->has('english_tollfree_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_tollfree_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_tollfree_title">Marathi Toll Free Title</label>
                                        <input type="text" name="marathi_tollfree_title" id="marathi_tollfree_title"
                                            value="{{ $subheader_info->marathi_tollfree_title }}" class="form-control"
                                            placeholder="">
                                        @if ($errors->has('marathi_tollfree_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_tollfree_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_tollfree_no">English Toll Free No</label>
                                        <input type="text" name="english_tollfree_no" id="english_tollfree_no"
                                            value="{{ $subheader_info->english_tollfree_no }}" class="form-control"
                                            placeholder="">
                                        @if ($errors->has('english_tollfree_no'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_tollfree_no', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_tollfree_no">Marathi Toll Free No</label>
                                        <input type="text" name="marathi_tollfree_no" id="marathi_tollfree_no"
                                            value="{{ $subheader_info->marathi_tollfree_no }}" class="form-control"
                                            placeholder="">
                                        @if ($errors->has('marathi_tollfree_no'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_tollfree_no', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_city_title">English City Title</label>
                                        <input type="text" name="english_city_title" id="english_city_title"
                                            value="{{ $subheader_info->english_city_title }}" class="form-control"
                                            placeholder="">
                                        @if ($errors->has('english_city_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_city_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_city_title">Marathi City Title</label>
                                        <input type="text" name="marathi_city_title" id="marathi_city_title"
                                            value="{{ $subheader_info->marathi_city_title }}" class="form-control"
                                            placeholder="">
                                        @if ($errors->has('marathi_city_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_city_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_city">English City Name</label>
                                        <input type="text" name="english_city" id="english_city" class="form-control"
                                            value="{{ $subheader_info->english_city }}" placeholder="">
                                        @if ($errors->has('english_city'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_city', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_city">Marathi City Name</label>
                                        <input type="text" name="marathi_city" id="marathi_city" class="form-control"
                                            value="{{ $subheader_info->marathi_city }}" placeholder="">
                                        @if ($errors->has('marathi_city'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_city', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_logo">Logo English</label><br>
                                        <input type="file" name="english_logo" id="english_logo" accept="image/*">
                                        @if ($errors->has('english_logo'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_logo', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_logo">Image Marathi</label><br>
                                        <input type="file" name="marathi_logo" id="marathi_logo" accept="image/*">
                                        @if ($errors->has('marathi_logo'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_logo', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control"
                                value="{{ $subheader_info->id }}" placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection