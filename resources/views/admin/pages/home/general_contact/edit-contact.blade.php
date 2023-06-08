@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                General Contact
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update General Contact
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-general-contact') }}" method="post"
                            id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_name">English Name</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_title" name="english_name"
                                            id="english_name"
                                            placeholder="Enter the Name">{{$general_contact->english_name }}</textarea>
                                        @if ($errors->has('english_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_name">Marathi Name</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control marathi_title" name="marathi_name"
                                            id="marathi_name"
                                            placeholder="Enter the Name">{{$general_contact->marathi_name }}</textarea>
                                        @if ($errors->has('marathi_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_number">English No</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="english_number" id="english_number"
                                            class="form-control" value="{{ $general_contact->english_number }}"
                                            placeholder="">
                                        @if ($errors->has('english_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_number">Marathi No</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="marathi_number" id="marathi_number"
                                            class="form-control" value="{{ $general_contact->marathi_number }}"
                                            placeholder="">
                                        @if ($errors->has('marathi_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_icon">Icon English</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="english_icon" id="english_icon" accept="image/*">
                                        @if ($errors->has('english_icon'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_icon', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_icon">Icon Marathi</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="marathi_icon" id="marathi_icon" accept="image/*">
                                        @if ($errors->has('marathi_icon'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_icon', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <span><a href="{{ route('list-general-contact') }}"
                                        class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control"
                                value="{{ $general_contact->id }}" placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection