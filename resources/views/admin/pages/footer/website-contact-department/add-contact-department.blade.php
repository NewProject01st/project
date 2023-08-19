@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Website Department Contact
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-contact-department') }}">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Website Department Contact </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-contact-department') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_english_name">Department Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="department_english_name"  class="form-control mb-2" id="department_english_name" placeholder="Please enter Title"
                                            value="{{ old('department_english_name') }}">
                                            @if ($errors->has('department_english_name'))
                                                <span class="red-text"><?php echo $errors->first('department_english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_marathi_name">विभागाचे नाव</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="department_marathi_name"  class="form-control mb-2" id="department_marathi_name" placeholder="शीर्षक प्रविष्ट करा"
                                            value="{{ old('department_marathi_name') }}">
                                            @if ($errors->has('department_marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('department_marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                       <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_english_address">Department Address</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control mb-2" name="department_english_address" id="department_english_address" placeholder="Enter the Address">{{old('department_english_address')}}</textarea>
                                            @if ($errors->has('department_english_address'))
                                                <span class="red-text"><?php echo $errors->first('department_english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_marathi_address">विभाग पत्ता</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control mb-2" name="department_marathi_address" id="department_marathi_address" placeholder="पत्ता प्रविष्ट करा">{{ old('department_marathi_address') }}</textarea>
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
                                                value="{{ old('department_english_contact_number') }}"
                                                placeholder="Please enter Mobile Number">
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
                                                value="{{ old('department_marathi_contact_number') }}"
                                                placeholder="कृपया मोबाईल नंबर टाका">
                                            @if ($errors->has('department_marathi_contact_number'))
                                                <span class="red-text"><?php echo $errors->first('department_marathi_contact_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="department_email">Department Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="email" name="department_email" id="department_email" class="form-control mb-2"
                                                id="department_email" placeholder="Please enter Email Id"
                                                value="{{ old('department_email') }}">
                                            @if ($errors->has('department_email'))
                                                <span class="red-text"><?php echo $errors->first('department_email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success"  id="submitButton" disabled>Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-contact-department') }}"
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
            $(document).ready(function() {
     // Function to check if all input fields are filled with valid data
     function checkFormValidity() {
         const department_english_name = $('#department_english_name').val();
         const department_marathi_name = $('#department_marathi_name').val();
         const department_english_address = $('#department_english_address').val();
         const department_marathi_address = $('#department_marathi_address').val();
         const department_english_contact_number = $('#department_english_contact_number').val();
         const department_marathi_contact_number = $('#department_marathi_contact_number').val();
         const department_email = $('#department_email').val();
 
         // Enable the submit button if all fields are valid
         if (department_english_name && department_marathi_name && department_english_contact_number && department_marathi_contact_number && department_email) {
             $('#submitButton').prop('disabled', false);
         } else {
             $('#submitButton').prop('disabled', true);
         }
     }
 
     // Call the checkFormValidity function on input change
     $('input,textarea').on('input change',
         checkFormValidity);

         $.validator.addMethod("department_english_contact_number", function(value, element) {
                    value = value.replace(/\s/g, '');
                    return this.optional(element) || /^[0-9]{10}$/.test(value);
                }, "Please enter a valid 10-digit number.");

                $.validator.addMethod("department_marathi_contact_number", function(value, element) {
                    value = value.replace(/\s/g, '');
                    return this.optional(element) || /^[०१२३४५६७८९]{10}$/.test(value);
                }, "कृपया वैध 10-अंकी क्रमांक प्रविष्ट करा.");
 
     // Initialize the form validation
     $("#regForm").validate({
         rules: {
             department_english_name: {
                 required: true,
             },
             department_marathi_name: {
                 required: true,
             },
             department_english_address: {
                 required: true,
             },
             department_marathi_address: {
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
             department_email: {
                 required: true,
             },
         },
         messages: {
             department_english_name: {
                 required: "Please Enter the Name",
             },
             department_marathi_name: {
                 required: "कृपया नाव प्रविष्ट करा",
             },
             department_english_address: {
                 required: "Please Enter the Description",
             },
             department_marathi_address: {
                 required: "कृपया वर्णन प्रविष्ट करा",
             },
             department_english_contact_number: {
                required: "Please Enter the Mobile Number",
             },
             department_marathi_contact_number: {
                 required: "कृपया मोबाईल नंबर टाका",
             },
             department_email: {
                 required: "Please Enter the Department Email",
             },
         },
         
     });
 });
         </script>
    @endsection
