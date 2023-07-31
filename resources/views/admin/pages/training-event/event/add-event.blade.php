@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Training Workshops
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-event') }}">Training Workshops</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Training Workshops </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-event') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="english_title" id="english_title"
                                                placeholder="Enter the Title" name="english_title"
                                                value="{{ old('english_title') }}">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="marathi_title" id="marathi_title"
                                                placeholder="शीर्षक प्रविष्ट करा " name="marathi_title"
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
                                            <textarea class="form-control mb-2 english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="english_description">{{ old('english_description') }}</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>वर्णन </label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control mb-2 marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा ">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label><span class="red-text">*</span>
                                            <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD"
                                                name="start_date" id="start_date" value="{{ old('start_date') }}">
                                            @if ($errors->has('start_date'))
                                                <span class="red-text">{{ $errors->first('start_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label><span class="red-text">*</span>
                                            <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD"
                                                name="end_date" id="end_date" value="{{ old('end_date') }}">
                                            @if ($errors->has('end_date'))
                                                <span class="red-text">{{ $errors->first('end_date') }}</span>
                                            @endif
                                        </div>
                                    </div>                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Image</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="english_image" id="english_image" accept="image/*"
                                               class="form-control mb-2"><br>
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image">प्रतिमा</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                            class="form-control mb-2"><br>
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center mt-4">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-event') }}"
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
            const english_description = $('#english_description').val();
            const marathi_description = $('#marathi_description').val();
            const english_image = $('#english_image').val();
            const marathi_image = $('#marathi_image').val();
            // const start_date = $('#start_date').val();
            const end_date = $('#end_date').val();
    
            // Enable the submit button if all fields are valid
            if (english_title && marathi_title && english_image && marathi_image && end_date) {
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
        $('#marathi_image').attr('accept', 'image/jpeg, image/png');
    
        // Call the checkFormValidity function on input change
        $('input,textarea, #english_image, #marathi_image').on('input change', checkFormValidity);
    
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
                    fileExtension: ["jpg", "jpeg", "png"],
                    fileSize: [10, 2048], // Min 10KB and Max 2MB (2 * 1024 KB)
                },
                marathi_image: {
                    required: true,
                    fileExtension: ["jpg", "jpeg", "png"],
                    fileSize: [10, 2048], // Min 10KB and Max 2MB (2 * 1024 KB)
                },
                // start_date:{
                //     required: true,
                // },
                end_date:{
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
                english_description: {
                    required: "Please enter the Description.",
                },
                marathi_description: {
                    required: "कृपया वर्णन प्रविष्ट करा.",
                },
                english_image: {
                    required: "Please upload an Image (JPG, JPEG, PNG).",
                    fileExtension: "Only JPG, JPEG, and PNG images are allowed.",
                    fileSize: "File size must be between 10 KB and 2 MB.",
                },
                marathi_image: {
                    required: "कृपया प्रतिमा अपलोड करा (JPG, JPEG, PNG).",
                    fileExtension: "फक्त JPG, JPEG, आणि PNG प्रतिमांना परवानगी आहे.",
                    fileSize: "फाइल साईज 10 KB आणि 2 MB दरम्यान असणे आवश्यक आहे.",
                },
                // start_date:{
                //     required: "Please select the Start Date.",
                // },
                end_date:{
                    required: "Please select the End Date.",
                },
            },
        });
    });
    </script>    
    @endsection
