@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Government Hospitals
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-govt-hospitals') }}">Preparedness</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Government Hospitals
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-govt-hospitals') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="hospital_english_type">Type</label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="hospital_english_type"
                                                name="hospital_english_type">
                                                <option value="" selected>Select</option>
                                                <option value="1"
                                                    {{ old('hospital_english_type', $govt_hospitals->hospital_english_type) == '1' ? 'selected' : '' }}>
                                                    Govt Hospitals in Nashik
                                                </option>
                                                <option value="2"
                                                    {{ old('hospital_english_type', $govt_hospitals->hospital_english_type) == '2' ? 'selected' : '' }}>
                                                    Primary Health Centre Information
                                                </option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name">Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_name" id="english_name"
                                                placeholder=""
                                                value="@if (old('english_name')) {{ old('english_name') }}@else{{ $govt_hospitals->english_name }} @endif">
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name">नाव</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_name" id="marathi_name"
                                                placeholder=""
                                                value="@if (old('marathi_name')) {{ old('marathi_name') }}@else{{ $govt_hospitals->marathi_name }} @endif">
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_area">Area</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_area" id="english_area"
                                                placeholder=""
                                                value="@if (old('english_area')) {{ old('english_area') }}@else{{ $govt_hospitals->english_area }} @endif">
                                            @if ($errors->has('english_area'))
                                                <span class="red-text"><?php echo $errors->first('english_area', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_area">क्षेत्रफळ</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_area" id="marathi_area"
                                                placeholder=""
                                                value="@if (old('marathi_area')) {{ old('marathi_area') }}@else{{ $govt_hospitals->marathi_area }} @endif">
                                            @if ($errors->has('marathi_area'))
                                                <span class="red-text"><?php echo $errors->first('marathi_area', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_address">Address</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_address" id="english_description"
                                                placeholder="Enter the Title"> @if (old('english_address'))
{{ old('english_address') }}@else{{ $govt_hospitals->english_address }}
@endif
</textarea>
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_address">पत्ता</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_address" id="marathi_description"
                                                placeholder="शीर्षक प्रविष्ट करा">
@if (old('marathi_address'))
{{ old('marathi_address') }}@else{{ $govt_hospitals->marathi_address }}
@endif
</textarea>
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="hospital_type">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="english_phone">Phone</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control" name="english_phone"
                                                        id="english_phone" placeholder=""
                                                        value="@if (old('english_phone')) {{ old('english_phone') }}@else{{ $govt_hospitals->english_phone }} @endif">
                                                    @if ($errors->has('english_phone'))
                                                        <span class="red-text"><?php echo $errors->first('english_phone', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="marathi_phone">फोन</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control" name="marathi_phone"
                                                        id="marathi_phone" placeholder=""
                                                        value="@if (old('marathi_phone')) {{ old('marathi_phone') }}@else{{ $govt_hospitals->marathi_phone }} @endif">
                                                    @if ($errors->has('marathi_phone'))
                                                        <span class="red-text"><?php echo $errors->first('marathi_phone', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="hospital_Primary">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="english_pincode">Pincode</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control" name="english_pincode"
                                                        id="english_pincode" placeholder=""
                                                        value="@if (old('english_pincode')) {{ old('english_pincode') }}@else{{ $govt_hospitals->english_pincode }} @endif">
                                                    @if ($errors->has('english_pincode'))
                                                        <span class="red-text"><?php echo $errors->first('english_pincode', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="marathi_pincode">पिन कोड</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control" name="marathi_pincode"
                                                        id="marathi_pincode" placeholder=""
                                                        value="@if (old('marathi_pincode')) {{ old('marathi_pincode') }}@else{{ $govt_hospitals->marathi_pincode }} @endif">
                                                    @if ($errors->has('marathi_pincode'))
                                                        <span class="red-text"><?php echo $errors->first('marathi_pincode', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control" name="email"
                                                        id="email" placeholder=""
                                                        value="@if (old('email')) {{ old('email') }}@else{{ $govt_hospitals->email }} @endif">
                                                    @if ($errors->has('email'))
                                                        <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center mt-3">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-govt-hospitals') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $govt_hospitals->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showHideFields(selectedValue) {
                if (selectedValue == '1') {
                    $("#hospital_type").show();
                    $("#hospital_Primary").hide();
                } else if (selectedValue == '2') {
                    $("#hospital_type").hide();
                    $("#hospital_Primary").show();
                } else {
                    $("#hospital_type").hide();
                    $("#hospital_Primary").hide();
                }
            }

            $(document).ready(function() {
                // Get the initial selected value
                var initialSelectedValue = $('#hospital_english_type').val();

                // Call the function to show/hide fields based on the initial value
                showHideFields(initialSelectedValue);

                // Add change event listener
                $('#hospital_english_type').on('change', function() {
                    // Get the selected value on change
                    var selectedValue = $(this).val();

                    // Call the function to show/hide fields based on the selected value
                    showHideFields(selectedValue);
                });

                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    // const email = $('#email').val();
                    const hospital_english_type = $('#hospital_english_type').val();
                    const english_name = $('#english_name').val();
                    const marathi_name = $('#marathi_name').val();
                    const english_area = $('#english_area').val();
                    const marathi_area = $('#marathi_area').val();
                    // const marathi_phone = $('#marathi_phone').val();
                    // const english_phone = $('#english_phone').val();
                    const english_address = $('#english_address').val();
                    const marathi_address = $('#marathi_address').val();
                    // const english_pincode = $('#english_pincode').val();
                    // const marathi_pincode = $('#marathi_pincode').val();
                    // Enable the submit button if all fields are valid
                    // if (hospital_english_type && english_name && marathi_name && english_area && marathi_area &&
                    //      english_address && marathi_address) {
                    //     $('#submitButton').prop('disabled', false);
                    // } else {
                    //     $('#submitButton').prop('disabled', true);
                    // }
                }

                // Call the checkFormValidity function on input change
                $('input,textarea, select, #user_profile').on('input change',
                    checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        // email: {
                        //     required: true,
                        //     email:true,
                        // },
                        hospital_english_type: {
                            required: true,
                        },
                        english_name: {
                            required: true,
                        },
                        marathi_name: {
                            required: true,
                        },
                        english_area: {
                            required: true,
                        },
                        marathi_area: {
                            required: true,
                        },
                        // marathi_phone: {
                        //     required: true,
                        //     marathi_phone:true,
                        // },
                        // english_phone: {
                        //     required: true,
                        // },
                        english_address: {
                            required: true,
                        },
                        marathi_address: {
                            required: true,
                        },
                        // english_pincode: {
                        //     required: true,
                        // },
                        // marathi_pincode: {
                        //     required: true,
                        // },
                    },
                    messages: {
                        // email: {
                        //     required: "Please Enter the Eamil",
                        // },
                        hospital_english_type: {
                            required: "Please Select Hospital Type",
                        },
                        english_name: {
                            required: "Please Enter the Name",
                        },
                        marathi_name: {
                            required: "कृपया नाव प्रविष्ट करा",
                        },
                        english_area: {
                            required: "Please Enter the Area",
                        },
                        marathi_area: {
                            required: "कृपया क्षेत्र प्रविष्ट करा",
                        },
                        // english_phone: {
                        //     required: "Please Enter the Phone",
                        // },
                        // marathi_phone: {
                        //     required: "कृपया फोन प्रविष्ट करा",
                        // },
                        english_address: {
                            required: "Please Enter the Address",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा",
                        },
                        // english_pincode: {
                        //     required: "Please Enter the Pincode",
                        // },
                        // marathi_pincode: {
                        //     required: "कृपया पिनकोड प्रविष्ट करा",
                        // },
                    },

                });
            });
        </script>
    @endsection
