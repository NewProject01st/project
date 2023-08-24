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
                                            <input type="text" class="form-control mb-2" name="english_address" id="english_address" placeholder="Enter the Address" value="@if(old('english_address')){{ old('english_address') }}@else{{ $website_contact->english_address }}@endif">
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_address">पत्ता</label>&nbsp<span class="red-text">*</span>
                                            <input  type="text" class="form-control mb-2" name="marathi_address" id="marathi_address" placeholder="पत्ता प्रविष्ट करा" value="@if(old('marathi_address')){{ old('marathi_address') }}@else{{ $website_contact->marathi_address }}@endif">
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number">Landline Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_number" id="english_number" oninput="this.value = this.value.replace(/[^0-9+\/\-\.\,]/g, '').replace(/(\..*)\./g, '$1');"
                                                class="form-control mb-2" onkeyup="addvalidateMobileNumber(this.value)"
                                                value="@if (old('english_number')) {{ old('english_number') }}@else{{ $website_contact->english_number }} @endif"
                                                placeholder="Enter the Landline Number">
                                            @if ($errors->has('english_number'))
                                                <span class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_number">दूरध्वनी क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_number" id="marathi_number" oninput="this.value = this.value.replace(/[^0-9+\/\-\.\,]/g, '').replace(/(\..*)\./g, '$1');"
                                                onkeyup="addvalidateMobileNumber1(this.value)" class="form-control mb-2"
                                                value="@if (old('marathi_number')) {{ old('marathi_number') }}@else{{ $website_contact->marathi_number }} @endif"
                                                placeholder="लँडलाइन क्रमांक प्रविष्ट करा">
                                            @if ($errors->has('marathi_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="email" name="email" id="email" class="form-control mb-2"
                                                 placeholder="Enter the Email"
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
                var landlineNumberPattern = /^\d+$/;
                var validationMessage = document.getElementById("english_number");

                if (landlineNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Invalid landline number. Only numbers are allowed.";
                }
            }
        </script> --}}
        {{-- <script>
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
        </script> --}}

<script>
    $(document).ready(function() {
        // Function to check if all input fields are filled with valid data
        // var validInput = inputValue.replace(/[^a-zA-Z0-9!@#$%^&*()_+{}\[\]:;<>,.?~\/\\|\-=]/g, "");
    
        /[^A-Za-z]/g

        function checkFormValidity() {
            const english_address = $('#english_address').val();
            const marathi_address = $('#marathi_address').val();
            const english_number = $('#english_number').val();
            const marathi_number = $('#marathi_number').val();
            const email = $('#email').val();

            // Validate the contact number
            const isValidContactNumber1 = english_number.length >= 3 &&
                english_number.length <= 25;
            const isMarathiContactNumberValid1 = marathi_number.length >= 3 &&
                marathi_number.length <= 25;


            // Validate landline numbers using regex
            const isValidEnglishLandlineNumber = regex.test(english_number);
            const isValidMarathiLandlineNumber = regex.test(marathi_number);

            // Check if the form should be disabled
            const shouldDisableSubmit = !(
                isMarathiContactNumberValid1 &&
                isValidEnglishLandlineNumber &&
                isValidMarathiLandlineNumber
            );
            // Do not disable the submit button
            $('#submitButton').prop('disabled', false);


        }

        // Call the checkFormValidity function on input change
        $('input').on('input change', checkFormValidity);

        // Initialize the form validation
        $("#regForm").validate({
            rules: {              
                english_address: {
                    required: true,
                },
                marathi_address: {
                    required: true,
                },
                english_number: {
                    required: true,
                    minlength: 3,
                    maxlength: 25,
                },
                marathi_number: {
                    required: true,
                    minlength: 3,
                    maxlength: 25,
                },
                email: {
                    required: true,
                },
            },
            messages: {
                english_address: {
                    required: "Please Enter the Address",
                },
                marathi_address: {
                    required: "कृपया पत्ता प्रविष्ट करा",
                },
                english_number: {
                    required: "Please Enter the Number",
                    minlength: "The number must be at least 3 digits long",
                    maxlength: "The number must be no more than 25 digits long",
                },
                marathi_number: {
                    required: "Please Enter the Number",
                    minlength: "The number must be at least 3 digits long",
                    maxlength: "The number must be no more than 25 digits long",
                },
                email: {
                    required: "Please Enter the Email",
                },
            },
        });
    });
</script>














        {{-- <script>
            $(document).ready(function() {
                // Custom validation method to check if the mobile number is valid based on the regex pattern                
                // $.validator.addMethod("valid_mobile_number", function(value, element) {
                //     var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                //     return this.optional(element) || mobileNumberPattern.test(value);
                // }, "Invalid landline number. Please enter a valid landline number.");

                $.extend($.validator.methods, {
                    spcenotallow: function(b, c, d) {
                        if (!this.depend(d, c)) return "dependency-mismatch";
                        if ("select" === c.nodeName.toLowerCase()) {
                            var e = a(c).val();
                            return e && e.length > 0
                        }
                        return this.checkable(c) ? this.getLength(b, c) > 0 : b.trim().length > 0
                    }
                });


                // $.validator.addMethod("valid_marathi_number", function(value, element) {
                //     value = value.replace(/\s/g, '');
                //     var marathiNumberPattern = /^[०१२३४५६७८९()-\/\s]{7,25}$/;
                //     return this.optional(element) || marathiNumberPattern.test(value);
                // }, "अवैध नंबर. कृपया वैध नंबर प्रविष्ट करा.");

                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        english_address: {
                            required: true,
                            spcenotallow: true,
                        },
                        marathi_address: {
                            required: true,
                            spcenotallow: true,
                        },
                        english_number: {
                            required: true,
                            spcenotallow: true,
                        },
                        marathi_number: {
                            required: true,
                            spcenotallow: true,
                        },
                        email: {
                            required: true,
                            spcenotallow: true,
                        },
                    },
                    messages: {
                        english_address: {
                            required: "Please Enter the Address.",
                            spcenotallow: "Enter Some Text",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा.",
                            spcenotallow: "काही मजकूर प्रविष्ट करा",
                        },
                        email: {
                            required: "Please Enter the Email",
                            spcenotallow: "Enter Some Text",
                        },
                        english_number: {
                            required: "Please Enter the Landline Number.",
                            spcenotallow: "Enter Some Text",
                        },
                        marathi_number: {
                            required: "कृपया मोबाइल क्रमांक प्रविष्ट करा",
                            spcenotallow: "काही मजकूर प्रविष्ट करा",
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

        {{-- <script>
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
                    },
                    messages: {
                        english_address: {
                            required: "Please Enter the Address.",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा.",
                        },
                        email: {
                            required: "Please Enter the Email",
                        },                        
                        english_number: {
                            required: "Please Enter the Landline Number.",
                        },
                        marathi_number: {
                            required: "कृपया मोबाइल क्रमांक प्रविष्ट करा",
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
    @endsection
