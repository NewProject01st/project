@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Emergency Contact
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Emergency Contact
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-emergency-contact') }}" method="post"
                            id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_name">English Name</label>
                                        <textarea class="form-control english_title" name="english_name"
                                            id="english_name"
                                            placeholder="Enter the Name">{{$emergency_contact->english_name }}</textarea>
                                        @if ($errors->has('english_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_name">Marathi Name</label>
                                        <textarea class="form-control marathi_title" name="marathi_name"
                                            id="marathi_name"
                                            placeholder="Enter the Name">{{$emergency_contact->marathi_name }}</textarea>
                                        @if ($errors->has('marathi_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_address">English Address</label>
                                        <textarea class="form-control english_description" name="english_address"
                                            id="english_address"
                                            placeholder="Enter the Address">{{$emergency_contact->english_address }}</textarea>
                                        @if ($errors->has('english_address'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_address">Marathi Address</label>
                                        <textarea class="form-control marathi_description" name="marathi_address"
                                            id="marathi_address"
                                            placeholder="Enter the Address">{{$emergency_contact->marathi_address }}</textarea>
                                        @if ($errors->has('marathi_address'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_number">English No</label>
                                        <input type="text" name="english_number" id="english_number"
                                            class="form-control" value="{{ $emergency_contact->english_number }}"
                                            placeholder="">
                                        @if ($errors->has('english_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_number">Marathi No</label>
                                        <input type="text" name="marathi_number" id="marathi_number"
                                            class="form-control" value="{{ $emergency_contact->marathi_number }}"
                                            placeholder="">
                                        @if ($errors->has('marathi_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_landline_no">English Landline No</label>
                                        <input type="text" name="english_landline_no" id="english_landline_no"
                                            class="form-control" value="{{ $emergency_contact->english_landline_no }}"
                                            placeholder="">
                                        @if ($errors->has('english_landline_no'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_landline_no', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_landline_no">Marathi Landline No</label>
                                        <input type="text" name="marathi_landline_no" id="marathi_landline_no"
                                            class="form-control" value="{{ $emergency_contact->marathi_landline_no }}"
                                            placeholder="">
                                        @if ($errors->has('marathi_landline_no'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_landline_no', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $emergency_contact->email }}" placeholder="">
                                        @if ($errors->has('email'))
                                        <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control"
                                value="{{ $emergency_contact->id }}" placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection