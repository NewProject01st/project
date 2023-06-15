@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Emergency Contact
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title">
@if (old('english_title'))
{{ old('english_title') }}@else{{ $emergency_contact->english_title }}
@endif
</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title">
@if (old('marathi_title'))
{{ old('marathi_title') }}@else{{ $emergency_contact->marathi_title }}
@endif
</textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name">Name English</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="text" name="english_name" id="english_name" class="form-control"
                                                value="@if (old('english_name')) {{ old('english_name') }}@else{{ $emergency_contact->english_name }} @endif">
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name">Name Marathi</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="text" name="marathi_name" id="marathi_name" class="form-control"
                                                value="@if (old('marathi_name')) {{ old('marathi_name') }}@else{{ $emergency_contact->marathi_name }} @endif">
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_address">English Address</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_address" id="english_address"
                                                placeholder="Enter the Address">
@if (old('english_address'))
{{ old('english_address') }}@else{{ $emergency_contact->english_address }}
@endif
</textarea>
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="marathi_address">Marathi Address</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_address" id="marathi_address"
                                                placeholder="Enter the Address">
@if (old('marathi_address'))
{{ old('marathi_address') }}@else{{ $emergency_contact->marathi_address }}
@endif
</textarea>
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number">English No</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_number" id="english_number"
                                                class="form-control"
                                                value="@if (old('english_number')) {{ old('english_number') }}@else{{ $emergency_contact->english_number }} @endif"
                                                placeholder="">
                                            @if ($errors->has('english_number'))
                                                <span class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_number">Marathi No</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_number" id="marathi_number"
                                                class="form-control"
                                                value="@if (old('marathi_number')) {{ old('marathi_number') }}@else{{ $emergency_contact->marathi_number }} @endif"
                                                placeholder="">
                                            @if ($errors->has('marathi_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_landline_no">English Landline No</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_landline_no" id="english_landline_no"
                                                class="form-control"
                                                value="@if (old('english_landline_no')) {{ old('english_landline_no') }}@else{{ $emergency_contact->english_landline_no }} @endif"
                                                placeholder="">
                                            @if ($errors->has('english_landline_no'))
                                                <span class="red-text"><?php echo $errors->first('english_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_landline_no">Marathi Landline No</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_landline_no" id="marathi_landline_no"
                                                class="form-control"
                                                value="@if (old('marathi_landline_no')) {{ old('marathi_landline_no') }}@else{{ $emergency_contact->marathi_landline_no }} @endif"
                                                placeholder="">
                                            @if ($errors->has('marathi_landline_no'))
                                                <span class="red-text"><?php echo $errors->first('marathi_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="@if (old('email')) {{ old('email') }}@else{{ $emergency_contact->email }} @endif"
                                                placeholder="">
                                            @if ($errors->has('email'))
                                                <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-emergency-contact') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
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
