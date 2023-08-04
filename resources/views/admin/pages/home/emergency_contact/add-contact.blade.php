@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Emergency Contact
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-emergency-contact') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Emergency Contact </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-emergency-contact') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="english_title" id="english_title"
                                                placeholder="Enter the Title" value="{{ old('english_title') }}">
                                            {{-- <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title">{{ old('english_title') }}</textarea> --}}
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="myInput" class="form-control-label">शीर्षक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input class=" form-control mb-2" name="marathi_title" id="myInput"
                                                placeholder="शीर्षक प्रविष्ट करा" value="{{ old('marathi_title') }}">
                                            {{-- <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title">{{ old('marathi_title') }}</textarea> --}}
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name">Name</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="text" name="english_name" id="english_name"
                                                class="form-control mb-2" placeholder="Enter the Name"
                                                value="{{ old('english_name') }}">
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name">नाव</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="text" name="marathi_name" id="marathi_name"
                                                class="form-control mb-2" placeholder="नाव प्रविष्ट करा"
                                                value="{{ old('marathi_name') }}">
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_address">Address</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control mb-2" name="english_address" id="english_address" placeholder="Enter the Address">{{ old('english_address') }}</textarea>
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_address">पत्ता</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control mb-2" name="marathi_address" id="marathi_address" placeholder="पत्ता प्रविष्ट करा">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number">Mobile Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="number" name="english_number" id="english_number"
                                                class="form-control mb-2" id="english_number"
                                                placeholder="Enter the Mobile Number" 
                                                value="{{ old('english_number') }}">
                                            @if ($errors->has('english_number'))
                                                <span class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_number">मोबाईल नंबर</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="number" name="marathi_number" id="marathi_number"
                                                class="form-control mb-2" id="marathi_number"
                                                placeholder="मोबाईल नंबर टाका"
                                                value="{{ old('marathi_number') }}">
                                            @if ($errors->has('marathi_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number">Mobile Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_number" id="english_number"
                                                class="form-control mb-2"
                                                value="{{old('english_number')}}"
                                                placeholder="">
                                            @if ($errors->has('english_number'))
                                                <span class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_number">मोबाईल नंबर</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_number" id="marathi_number"
                                                class="form-control mb-2"
                                                value="{{old('marathi_number')}}"
                                                placeholder="मोबाईल नंबर टाका">
                                            @if ($errors->has('marathi_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_landline_no">Landline Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_landline_no" id="english_landline_no"
                                                class="form-control mb-2" 
                                                onkeyup="addvalidateMobileNumber(this.value)"
                                                value="{{old('english_landline_no')}}"
                                                placeholder="">
                                            @if ($errors->has('english_landline_no'))
                                                <span class="red-text"><?php echo $errors->first('english_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_landline_no">दूरध्वनी क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_landline_no" id="marathi_landline_no"
                                            onkeyup="addvalidateMobileNumber1(this.value)" class="form-control mb-2"
                                            value="{{old('marathi_landline_no')}}"
                                                placeholder="">
                                            @if ($errors->has('marathi_landline_no'))
                                                <span class="red-text"><?php echo $errors->first('marathi_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_landline_no">Landline Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="number" name="english_landline_no" id="english_landline_no"
                                                class="form-control mb-2" id="english_landline_no"
                                                placeholder="Enter the Landline Number"
                                                value="{{ old('english_landline_no') }}">
                                            @if ($errors->has('english_landline_no'))
                                                <span class="red-text"><?php //echo $errors->first('english_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_landline_no">दूरध्वनी क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="number" name="marathi_landline_no" id="marathi_landline_no"
                                                class="form-control mb-2" id="marathi_landline_no"
                                                placeholder="लँडलाइन क्रमांक प्रविष्ट करा"
                                                value="{{ old('marathi_landline_no') }}">
                                            @if ($errors->has('marathi_landline_no'))
                                                <span class="red-text"><?php //echo $errors->first('marathi_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="email" id="email"
                                                class="form-control mb-2" id="email" placeholder="Enter the Email"
                                                value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-emergency-contact') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function addvalidateMobileNumber(number) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                var validationMessage = document.getElementById("english_landline_no");
        
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
                var validationMessage = document.getElementById("marathi_landline_no");
        
                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "अवैध लँडलाइन नंबर. कृपया वैध लँडलाइन नंबर प्रविष्ट करा..";
                }
            }
        </script>
        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_name = $('#english_name').val();
                    const marathi_name = $('#marathi_name').val();
                    const english_address = $('#english_address').val();
                    const marathi_address = $('#marathi_address').val();
                    const english_number = $('#english_number').val();
                    const marathi_number = $('#marathi_number').val();
                    const english_landline_no = $('#english_landline_no').val();
                    const marathi_landline_no = $('#marathi_landline_no').val();
                    const email = $('#email').val();

                    // Enable the submit button if all fields are valid
                    if (english_address && marathi_address && email) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input,textarea').on('input change',
                    checkFormValidity);

                // Add custom validation rules for English and Marathi numbers
                $.validator.addMethod("english_number", function(value, element) {
                    return this.optional(element) || /^[0-9]{10}$/.test(value);
                }, "Please enter a valid 10-digit number.");

                $.validator.addMethod("marathi_number", function(value, element) {
                    return this.optional(element) || /^[0-9]{10}$/.test(value);
                }, "कृपया वैध 10-अंकी क्रमांक प्रविष्ट करा.");


                $.validator.addMethod("valid_mobile_number", function(value, element) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                return this.optional(element) || mobileNumberPattern.test(value);
            }, "Invalid landline number. Please enter a valid landline number.");

            $.validator.addMethod("valid_marathi_number", function(value, element) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                return this.optional(element) || mobileNumberPattern.test(value);
            }, "अवैध लँडलाइन नंबर. कृपया वैध लँडलाइन नंबर प्रविष्ट करा.");

                $.validator.addMethod("email", function(value, element) {
                    // Regular expression for email validation
                    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    return this.optional(element) || emailRegex.test(value);
                }, "Please enter a valid email address.");

                // $.validator.addMethod("english_landline_no", function(value, element) {
                //     return this.optional(element) || /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/.test(value);
                // }, "Please enter a valid landline number (e.g., 123-456-7890).");

                // $.validator.addMethod("marathi_landline_no", function(value, element) {
                //     return this.optional(element) || /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/.test(value);
                // }, "कृपया एक वैध दूरध्वनी नंबर प्रविष्ट करा (उदा. १२३-४५६-७८९०).");

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        english_title: {
                            required: true,
                        },
                        marathi_title: {
                            required: true,
                        },
                        english_name: {
                            required: true,
                        },
                        marathi_name: {
                            required: true,
                        },
                        english_address: {
                            required: true,
                        },
                        marathi_address: {
                            required: true,
                        },
                        english_number: {
                            required: true,
                            english_number: true, // Use the custom validation rule
                        },
                        marathi_number: {
                            required: true,
                            marathi_number: true, // Use the custom validation rule
                        },
                        english_landline_no: {
                            required: true,
                            valid_mobile_number: true,
                            // english_landline_no: true, // Use the custom validation rule
                        },
                        marathi_landline_no: {
                            required: true,
                            valid_marathi_number:true,
                            // marathi_landline_no: true, // Use the custom validation rule
                        },
                        email: {
                            required: true,
                            email: true, // Use the custom email validation rule

                        },
                    },
                    messages: {
                        english_title: {
                            required: "Please Enter the Title",
                        },
                        marathi_title: {
                            required: "कृपया शीर्षक प्रविष्ट करा",
                        },
                        english_name: {
                            required: "Please Enter the Name",
                        },
                        marathi_name: {
                            required: "कृपया नाव प्रविष्ट करा",
                        },
                        english_address: {
                            required: "Please Enter the Address",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा",
                        },
                        english_number: {
                            required: "Please Enter the Number",
                        },
                        marathi_number: {
                            required: "कृपया क्रमांक प्रविष्ट करा",
                        },
                        english_landline_no: {
                            required: "Please Enter the Landline Number",
                        },
                        marathi_landline_no: {
                            required: "कृपया लँडलाइन क्रमांक प्रविष्ट करा",
                        },
                        email: {
                            required: "Please Enter the Email",
                        },
                    },

                });
            });
        </script>
    @endsection
