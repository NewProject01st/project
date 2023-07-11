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
                        <li class="breadcrumb-item"><a href="#">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-privacy-policy') }}" method="post"
                                id="regForm" name="frm_register" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input class="form-control url" name="english_title" id="english_title"
                                                placeholder="Enter the Title" name="english_title"
                                                value="{{ $privacy_policy->english_title }}">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control url" name="marathi_title" id="marathi_title"
                                                placeholder="शीर्षक प्रविष्ट करा" name="marathi_title"
                                                value="{{ $privacy_policy->marathi_title }}">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description">
@if (old('english_description'))
{{ old('english_description') }}@else{{ $privacy_policy->english_description }}
@endif
</textarea>
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
                                                placeholder="Enter the Description">
@if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $privacy_policy->marathi_description }}
@endif
</textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-privacy-policy') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $privacy_policy->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
