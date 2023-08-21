@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Success Stories
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-success-stories') }}">News & Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Success Stories</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-success-stories') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control mb-2" name="english_title"
                                                id="english_title" placeholder="Enter the Title"
                                                value="{{ old('english_title') }}">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control mb-2" name="marathi_title"
                                                id="marathi_title" placeholder="शीर्षक प्रविष्ट करा"
                                                value="{{ old('marathi_title') }}">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="english_description">{{ old('english_description') }}</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>वर्णन</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_designation">Designation</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_designation" id="english_designation"
                                                class="form-control mb-2" id="english_designation"
                                                placeholder="Enter the designation "
                                                value="{{ old('english_designation') }}">
                                            @if ($errors->has('english_designation'))
                                                <span class="red-text"><?php echo $errors->first('english_designation', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_designation">पदनाम </label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control mb-2" placeholder="पदनाम प्रविष्ट करा"
                                                name="marathi_designation" id="marathi_designation"
                                                value="{{ old('marathi_designation') }}">
                                            @if ($errors->has('marathi_designation'))
                                                <span class="red-text"><?php echo $errors->first('marathi_designation', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Profile</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="english_image" id="english_image" class="form-control mb-2"
                                                accept="image/*"><br>
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center mt-4">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-success-stories') }}"
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
                    // const english_description = $('#english_description').val();
                    // const marathi_description = $('#marathi_description').val();
                    const english_image = $('#english_image').val();
                    const english_designation = $('#english_designation').val();
                    const marathi_designation = $('#marathi_designation').val();

                    // const url = $('#url').val();
            
                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_designation && marathi_designation && english_image) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }
            
                // Custom validation method to check file extension
                $.validator.addMethod("fileExtension", function(value, element, param) {
                    // Get the file extension
                    const extension = value.split('.').pop().toLowerCase();
                    return $.inArray(extension, param) !== -1;
                }, "Invalid file extension.");
            
                // Custom validation method to check file size
                $.validator.addMethod("fileSize", function(value, element, param) {
                    // Convert bytes to KB
                    const fileSizeKB = element.files[0].size / 1024;
                    return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                }, "File size must be between {0} KB and {1} KB.");
            
                // Update the accept attribute to validate based on file extension
                $('#english_image').attr('accept', 'image/jpeg, image/png');
            
                // Call the checkFormValidity function on input change
                $('input, textarea, #english_image').on('input change', checkFormValidity);
            
                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        english_title: {
                            required: true,
                        },
                        marathi_title: {
                            required: true,
                        },
                        // english_description: {
                        //     required: true,
                        // },
                        // marathi_description: {
                        //     required: true,
                        // },
                        english_image: {
                            required: true,
                            fileExtension: ["jpg", "jpeg", "png"],
                            fileSize: [10, 400], // Min 10KB and Max 2MB (2 * 1024 KB)
                        },
                        english_designation: {
                            required: true,
                        },
                        marathi_designation: {
                            required: true,
                        },
                    },
                    messages: {
                        english_title: {
                            required: "Please enter the Title.",
                        },
                        marathi_title: {
                            required: "कृपया शीर्षक प्रविष्ट करा.",
                        },
                        // english_description: {
                        //     required: "Please enter the Description.",
                        // },
                        // marathi_description: {
                        //     required: "कृपया वर्णन प्रविष्ट करा.",
                        // },
                        english_image: {
                            required: "Please upload an Image (JPG, JPEG, PNG).",
                            fileExtension: "Only JPG, JPEG, and PNG images are allowed.",
                            fileSize: "File size must be between 10 KB and 400 KB.",
                        },
                        english_designation: {
                            required: "Please enter the Designation.",
                        },
                        marathi_designation: {
                            required: "कृपया पदनाम प्रविष्ट करा.",
                        },
                    },
                });
            });
            </script>   

            



        {{-- <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_description = $('#english_description').val();
                    const marathi_description = $('#marathi_description').val();
                    const english_image = $('#english_image').val();
                    const english_designation = $('#english_designation').val();
                    const marathi_designation = $('#marathi_designation').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_designation && marathi_designation && english_image) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input,textarea, #english_image, #marathi_image').on('input change',
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
                        english_description: {
                            required: true,
                        },
                        marathi_description: {
                            required: true,
                        },
                        english_image: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                        },
                        english_designation: {
                            required: true,
                        },
                        marathi_designation: {
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
                        english_description: {
                            required: "Please Enter the Description",
                        },
                        marathi_description: {
                            required: "कृपया वर्णन प्रविष्ट करा",
                        },
                        english_image: {
                            required: "Upload Media File",
                            accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                        },
                        english_designation: {
                            required: "Please Enter the Designation",
                        },
                        marathi_designation: {
                            required: "कृपया पदनाम प्रविष्ट करा",
                        },
                    },
                });
            });
        </script> --}}
    @endsection
