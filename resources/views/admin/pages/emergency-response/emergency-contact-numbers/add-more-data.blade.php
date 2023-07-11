@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Emergency Contact Numbers
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Emergency Response</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Emergency Contact Numbers</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('add-more-emergency-contact-data') }}'
                                method="POST" enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_emergency_contact_title"> Emergency
                                                Contact Name</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="english_emergency_contact_title"
                                                id="english_emergency_contact_title"
                                                placeholder="Enter the Emergency Contact Name"
                                                value="{{ old('english_emergency_contact_title') }}">
                                            @if ($errors->has('english_emergency_contact_title'))
                                                <span class="red-text"><?php echo $errors->first('english_emergency_contact_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_emergency_contact_title">आपत्कालीन संपर्क नाव</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="marathi_emergency_contact_title"
                                                id="marathi_emergency_contact_title"
                                                placeholder="आपत्कालीन संपर्क नाव प्रविष्ट करा"
                                                value="{{ old('marathi_emergency_contact_title') }}">
                                            @if ($errors->has('marathi_emergency_contact_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_emergency_contact_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_emergency_contact_number"> Emergency Contact
                                                Number</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="english_emergency_contact_number"
                                                id="english_emergency_contact_number"
                                                placeholder="Enter the Emergency Contact Number"
                                                value="{{ old('english_emergency_contact_number') }}" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  maxlength="10" minlength="10">
                                            {{-- placeholder="Enter the Description" name="description">{{ old('english_emergency_contact_number') }}</textarea> --}}
                                            @if ($errors->has('english_emergency_contact_number'))
                                                <span class="red-text"><?php echo $errors->first('english_emergency_contact_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="marathi_emergency_contact_number">आपत्कालीन संपर्क
                                                क्रमांक</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="marathi_emergency_contact_number"
                                                id="marathi_emergency_contact_number"
                                                placeholder="आपत्कालीन संपर्क क्रमांक प्रविष्ट करा"
                                                value="{{ old('marathi_emergency_contact_number') }}" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  maxlength="10" minlength="10">
                                            {{-- placeholder="Enter the Description">{{ old('marathi_emergency_contact_number') }}</textarea> --}}
                                            @if ($errors->has('marathi_emergency_contact_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_emergency_contact_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-12 text-center mt-3">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                    <span><a href="{{ route('edit-emergency-contact-numbers') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                    {{-- <input class="form-control" type="text" name="no_of_text_boxes"
                                        id="no_of_text_boxes" value="1"> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
