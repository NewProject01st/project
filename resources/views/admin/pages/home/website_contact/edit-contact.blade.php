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
                        <li class="breadcrumb-item"><a href="{{ url('list-website-contact') }}">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Website Contact
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-website-contact') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_address"> Address</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control mb-2" name="english_address" id="english_address" placeholder="Enter the Name">
@if (old('english_address'))
{{ old('english_address') }}@else{{ $website_contact->english_address }}
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
                                            <textarea class="form-control mb-2" name="marathi_address" id="marathi_address" placeholder="Enter the Name">
@if (old('marathi_address'))
{{ old('marathi_address') }}@else{{ $website_contact->marathi_address }}
@endif
</textarea>
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number">Landline Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_number" id="english_number"
                                                class="form-control mb-2" 
                                                onkeyup="addvalidateMobileNumber(this.value)"
                                                value="@if (old('english_number')) {{ old('english_number') }}@else{{ $website_contact->english_number }} @endif"
                                                placeholder="">
                                            @if ($errors->has('english_number'))
                                                <span class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_number">दूरध्वनी क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_number" id="marathi_number"
                                            onkeyup="addvalidateMobileNumber1(this.value)" class="form-control mb-2"
                                                value="@if (old('marathi_number')) {{ old('marathi_number') }}@else{{ $website_contact->marathi_number }} @endif"
                                                placeholder="">
                                            @if ($errors->has('marathi_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="email" id="email" class="form-control mb-2"
                                                id="email" placeholder=""
                                                value="@if (old('email')) {{ old('email') }}@else{{ $website_contact->email }} @endif">
                                            @if ($errors->has('email'))
                                                <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-website-contact') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $website_contact->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>
            function addvalidateMobileNumber(number) {
    var landlineNumberPattern = /^[0-9 ()-]+$/;
    var validationMessage = document.getElementById("english_number");

    if (landlineNumberPattern.test(number)) {
        validationMessage.textContent = "";
    } else {
        validationMessage.textContent = "Invalid landline number. Only digits, parentheses, hyphens, and spaces are allowed.";
    }
}

        </script>
        <script>
            $(document).ready(function() {
                function checkFormValidity() {
                    const english_address = $('#english_address').val();
                    const marathi_address = $('#marathi_address').val();
                    const english_number = $('#english_number').val();
                    const marathi_number = $('#marathi_number').val();
                    const email = $('#email').val();
                }
                // Call the checkFormValidity function on file input change
                $('input').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });
                // $.validator.addMethod("english_number", function(value, element) {
                //     return this.optional(element) || !isNaN(parseFloat(value)) && isFinite(value);
                // }, "Please enter a valid numeric value.");

                // $.validator.addMethod("email", function(value, element) {
                //     // Regular expression for email validation
                //     const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                //     return this.optional(element) || emailRegex.test(value);
                // }, "Please enter a valid email address.");

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
                            // english_number:true,
                        },
                        marathi_number: {
                            required: true,
                        },
                        email: {
                            required: true,
                            // email: true, // Use the custom email validation rule
                        },
                    },
                    messages: {
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
                            required: "कृपया लँडलाइन क्रमांक प्रविष्ट करा",
                        },
                        email: {
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
        </script> --}}

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

            $.validator.addMethod("valid_marathi_number", function(value, element) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                return this.optional(element) || mobileNumberPattern.test(value);
            }, "अवैध लँडलाइन नंबर. कृपया वैध लँडलाइन नंबर प्रविष्ट करा.");
    
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
                        valid_marathi_number:true,
                    },
                    email: {
                        required: true,
                       
                        // email: true, // Use the built-in email validation rule
                    },
                },
                messages: {
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
                    email: {
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
