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
                                            <input class="form-control" name="english_title" id="english_title"
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
                                            <input class=" form-control" name="marathi_title" id="myInput"
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
                                            <input type="text" name="english_name" id="english_name" class="form-control"
                                                placeholder="Enter the Name" value="{{ old('english_name') }}">
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name">नाव</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="text" name="marathi_name" id="marathi_name" class="form-control"
                                                placeholder="नाव प्रविष्ट करा" value="{{ old('marathi_name') }}">
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_address">Address</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control " name="english_address" id="english_address" placeholder="Enter the Address">{{ old('english_address') }}</textarea>
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_address">पत्ता</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control" name="marathi_address" id="marathi_address" placeholder="पत्ता प्रविष्ट करा">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number">Mobile Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_number" id="english_number"
                                                class="form-control" id="english_number"
                                                placeholder="Enter the Mobile Number" {{-- pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  maxlength="10" minlength="10" --}}
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
                                            <input type="text" name="marathi_number" id="marathi_number"
                                                class="form-control" id="marathi_number" placeholder="मोबाईल नंबर टाका"
                                                {{-- pattern="[789]{1}[0-9]{9}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                maxlength="10" minlength="10"  --}} value="{{ old('marathi_number') }}">
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
                                                class="form-control" id="english_landline_no"
                                                placeholder="Enter the Landline Number"
                                                value="{{ old('english_landline_no') }}">
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
                                                class="form-control" id="marathi_landline_no"
                                                placeholder="लँडलाइन क्रमांक प्रविष्ट करा"
                                                value="{{ old('marathi_landline_no') }}">
                                            @if ($errors->has('marathi_landline_no'))
                                                <span class="red-text"><?php echo $errors->first('marathi_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="email" id="email" class="form-control"
                                                id="email" placeholder="Enter the Email"
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
                        },
                        marathi_number: {
                            required: true,
                        },
                        email: {
                            required: true,
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
                        email: {
                            required: "Please Enter the Email",
                        },
                    },

                });
            });
        </script>
    @endsection
