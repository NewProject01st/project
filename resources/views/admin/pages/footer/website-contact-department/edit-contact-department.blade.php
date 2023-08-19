@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Website Contact
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-contact-department') }}">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Website Department Contact
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-contact-department') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_english_name">Department Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="department_english_name"  class="form-control mb-2" id="department_english_name" placeholder="Please enter Title"
                                            value="@if (old('department_english_name')) {{ old('department_english_name') }}@else{{ $website_contact_department->department_english_name }} @endif">
                                            @if ($errors->has('department_english_name'))
                                                <span class="red-text"><?php echo $errors->first('department_english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_marathi_name">विभागाचे नाव</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="department_marathi_name"  class="form-control mb-2" id="department_marathi_name" placeholder="शीर्षक प्रविष्ट करा"
                                            value="@if (old('department_marathi_name')) {{ old('department_marathi_name') }}@else{{ $website_contact_department->department_marathi_name }} @endif">
                                            @if ($errors->has('department_marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('department_marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                             
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_email">Department Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="email" name="department_email" id="department_email" class="form-control mb-2"
                                                id="department_email" placeholder=""
                                                value="@if (old('department_email')) {{ old('department_email') }}@else{{ $website_contact_department->department_email }} @endif">
                                            @if ($errors->has('department_email'))
                                                <span class="red-text"><?php echo $errors->first('department_email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_english_address">Department Address</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control mb-2" name="department_english_address" id="department_english_address" placeholder="Enter the Name">
@if (old('department_english_address'))
{{ old('department_english_address') }}@else{{ $website_contact_department->department_english_address }}
@endif
</textarea>
                                            @if ($errors->has('department_english_address'))
                                                <span class="red-text"><?php echo $errors->first('department_english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_marathi_address">विभाग पत्ता</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control mb-2" name="department_marathi_address" id="department_marathi_address" placeholder="Enter the Name">
@if (old('department_marathi_address'))
{{ old('department_marathi_address') }}@else{{ $website_contact_department->department_marathi_address }}
@endif
</textarea>
                                            @if ($errors->has('department_marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('department_marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_english_contact_number">Department Contact Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="department_english_contact_number" id="department_english_contact_number"
                                                class="form-control mb-2"
                                                value="@if (old('department_english_contact_number')) {{ old('department_english_contact_number') }}@else{{ $website_contact_department->department_english_contact_number }} @endif"
                                                placeholder="">
                                            @if ($errors->has('department_english_contact_number'))
                                                <span class="red-text"><?php echo $errors->first('department_english_contact_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_marathi_contact_number">विभाग संपर्क क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="department_marathi_contact_number" id="department_marathi_contact_number"
                                                 class="form-control mb-2"
                                                value="@if (old('department_marathi_contact_number')) {{ old('department_marathi_contact_number') }}@else{{ $website_contact_department->department_marathi_contact_number }} @endif"
                                                placeholder="">
                                            @if ($errors->has('department_marathi_contact_number'))
                                                <span class="red-text"><?php echo $errors->first('department_marathi_contact_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-contact-department') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $website_contact_department->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function addvalidateMobileNumber(number) {
                var landlineNumberPattern = /^\d+$/;
                var validationMessage = document.getElementById("english_number");

                if (landlineNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Invalid landline number. Only numbers are allowed.";
                }
            }
        </script>
        <script>
            function addvalidateMobileNumber(number) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                var validationMessage = document.getElementById("english_number");

                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Invalid landline number. Please enter a valid landline number.";
                }
            }
        </script>
        <script>
            function addvalidateMobileNumber1(number) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                var validationMessage = document.getElementById("marathi_number");

                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "अवैध लँडलाइन नंबर. कृपया वैध लँडलाइन नंबर प्रविष्ट करा..";
                }
            }
        </script>
        <script>
            $(document).ready(function() {
                // Custom validation method to check if the mobile number is valid based on the regex pattern
                $.validator.addMethod("valid_mobile_number", function(value, element) {
                    var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                    return this.optional(element) || mobileNumberPattern.test(value);
                }, "Invalid landline number. Please enter a valid landline number.");

                // $.validator.addMethod("valid_marathi_number", function(value, element) {
                //     var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                //     return this.optional(element) || mobileNumberPattern.test(value);
                // }, "अवैध लँडलाइन नंबर. कृपया वैध लँडलाइन नंबर प्रविष्ट करा.");

                $.validator.addMethod("valid_marathi_number", function(value, element) {
                    value = value.replace(/\s/g, '');
                    var marathiNumberPattern = /^[०१२३४५६७८९()-\/\s]{7,25}$/;
                    return this.optional(element) || marathiNumberPattern.test(value);
                }, "अवैध नंबर. कृपया वैध नंबर प्रविष्ट करा.");

                

                $.validator.addMethod("department_english_contact_number", function(value, element) {
                    value = value.replace(/\s/g, '');
                    return this.optional(element) || /^[0-9]{10}$/.test(value);
                }, "Please enter a valid 10-digit number.");

                $.validator.addMethod("department_marathi_contact_number", function(value, element) {
                    value = value.replace(/\s/g, '');
                    return this.optional(element) || /^[०१२३४५६७८९]{10}$/.test(value);
                }, "कृपया वैध 10-अंकी क्रमांक प्रविष्ट करा.");

                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        english_address: {
                            required: true,
                        },
                        marathi_address: {
                            required: true,
                        },
                        english_number: {
                            required: true,
                            valid_mobile_number: true, // Use the custom mobile number validation rule
                        },
                        marathi_number: {
                            required: true,
                            valid_marathi_number: true,
                        },
                        email: {
                            required: true,
                        },

                        department_english_contact_number: {
                            required: true,
                            department_english_contact_number: true, // Use the custom mobile number validation rule
                        },
                        department_marathi_contact_number: {
                            required: true,
                            department_marathi_contact_number: true, // Use the custom mobile number validation rule
                        },
                        department_english_address: {
                            required: true,
                        },
                        department_marathi_address: {
                            required: true,
                        },
                        department_email: {
                            required: true,
                        },
                    },
                    messages: {
                        english_address: {
                            required: "Please Enter the Address.",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा.",
                        },
                        department_english_contact_number: {
                            required: "Please Enter the Mobile Number.",
                        },
                        department_marathi_contact_number: {
                            required: "कृपया मोबाईल नंबर टाका",
                        },
                        email: {
                            required: "Please Enter the Email",
                        },

                        english_address: {
                            required: "Please Enter the Address.",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा.",
                        },
                        english_number: {
                            required: "Please Enter the Landline Number.",
                        },
                        marathi_number: {
                            required: "कृपया मोबाइल क्रमांक प्रविष्ट करा",
                        },
                        department_email: {
                            required: "Please Enter the Email",
                        },
                    },
                });

                // Submit the form when the "Update" button is clicked
                $("#submitButton").click(function() {
                    // Validate the form
                    if (form.valid()) {
                        form.submit();
                    }
                });
            });
        </script>
    @endsection
