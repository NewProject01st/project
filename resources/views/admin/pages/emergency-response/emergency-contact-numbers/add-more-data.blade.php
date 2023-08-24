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
                        <li class="breadcrumb-item"><a href="{{ route('edit-emergency-contact-numbers') }}">Emergency
                                Response</a></li>
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
                                            <input class="form-control mb-2" name="english_emergency_contact_title"
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
                                            <label for="marathi_emergency_contact_title">आपत्कालीन संपर्क
                                                नाव</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="marathi_emergency_contact_title"
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
                                            <input class="form-control mb-2" name="english_emergency_contact_number"
                                                id="english_emergency_contact_number"
                                                placeholder="Enter the Emergency Contact Number"
                                                value="{{ old('english_emergency_contact_number') }}">
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
                                            <input class="form-control mb-2" name="marathi_emergency_contact_number"
                                                id="marathi_emergency_contact_number"
                                                placeholder="आपत्कालीन संपर्क क्रमांक प्रविष्ट करा"
                                                value="{{ old('marathi_emergency_contact_number') }}">
                                            {{-- placeholder="Enter the Description">{{ old('marathi_emergency_contact_number') }}</textarea> --}}
                                            @if ($errors->has('marathi_emergency_contact_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_emergency_contact_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-12 text-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-success" id="submitButton">Save &amp;
                                        Submit</button>
                                    {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
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
        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_emergency_contact_title = $('#english_emergency_contact_title').val();
                    const marathi_emergency_contact_title = $('#marathi_emergency_contact_title').val();
                    const english_emergency_contact_number = $('#english_emergency_contact_number').val();
                    const marathi_emergency_contact_number = $('#marathi_emergency_contact_number').val();

                    // Validate the contact number
                    const isValidContactNumber = english_emergency_contact_number.length >= 3 &&
                        english_emergency_contact_number.length <= 11;
                    const isMarathiContactNumberValid = marathi_emergency_contact_number.length >= 3 &&
                        marathi_emergency_contact_number.length <= 11;

                    // Do not disable the submit button
                    $('#submitButton').prop('disabled', false);
                }

                // Call the checkFormValidity function on input change
                $('input').on('input change', checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        english_emergency_contact_title: {
                            required: true,
                        },
                        marathi_emergency_contact_title: {
                            required: true,
                        },
                        english_emergency_contact_number: {
                            required: true,
                            number: true,
                            minlength: 3,
                            maxlength: 11,
                        },
                        marathi_emergency_contact_number: {
                            required: true,
                            number: true,
                            minlength: 3,
                            maxlength: 11,
                        },
                    },
                    messages: {
                        english_emergency_contact_title: {
                            required: "Please Enter the Title",
                        },
                        marathi_emergency_contact_title: {
                            required: "कृपया शीर्षक प्रविष्ट करा",
                        },
                        english_emergency_contact_number: {
                            required: "Please Enter the Number",
                            number: "Please Enter a valid number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 11 digits long",
                        },
                        marathi_emergency_contact_number: {
                            required: "Please Enter the Number",
                            number: "Please Enter a valid number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 11 digits long",
                        },
                    },
                });
            });
        </script>
    @endsection
