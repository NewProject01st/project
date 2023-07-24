@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Privacy Policy
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-privacy-policy') }}">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                                action="{{ route('add-privacy-policy') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_title" id="english_title"
                                                class="form-control" id="english_title" placeholder="Please enter Title"
                                                value="{{ old('english_title') }}">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="marathi_title" id="marathi_title"
                                                class="form-control" id="marathi_title" placeholder="शीर्षक प्रविष्ट करा"
                                                value="{{ old('marathi_title') }}">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="description">{{ old('english_description') }}</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="marathi_description">वर्णन </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-privacy-policy') }}"
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
