@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Landing Content
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-landing-content') }}">Landing</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Landing Content</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-landing-content') }}" method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="title" id="title"
                                                placeholder="Enter the Title"
                                                value=" @if (old('title')) {{ old('title') }}@else{{ $slider->title }} @endif">
                                            <label class="error py-2" for="title" id="title_error"></label>
                                            @if ($errors->has('title'))
                                                <span class="red-text"><?php echo $errors->first('title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="description" id="english_description"
                                                placeholder="Enter the Description">
                                                <label class="error py-2" for="description" id="description_error"></label>
                                            @if (old('description'))
{{ old('description') }}@else{{ $slider->description }}
@endif
                                            </textarea>
                                            @if ($errors->has('description'))
                                                <span class="red-text"><?php echo $errors->first('description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="image"> Logo</label>
                                            <input type="file" name="image" class="form-control"
                                                id="image" accept="image/*" placeholder="image">
                                            @if ($errors->has('image'))
                                                <div class="red-text"><?php echo $errors->first('image', ':message'); ?>
                                                </div>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.LANDING_CONTENT_VIEW') }}{{ $slider->image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" placeholder="Enter the URL"
                                                value="@if (old('url')) {{ old('url') }}@else{{ $slider->url }} @endif"
                                                name="url" id="url">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-landing-content') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $slider->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Make sure you have jQuery and jquery.validate.js included before this script -->
        <script>
            $(document).ready(function() {
                var currentEnglishImage = $("#currentEnglishImage").val();
        
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const title = $('#title').val();
                    const image = $('#image').val();
                  
                    // Update the old PDF values if there are any selected files
                    if (image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(image);
                    }
                }
        
                // Call the checkFormValidity function on file input change
                $('input, #image').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });
        
                $.validator.addMethod("validImage", function(value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension == "jpg" || extension == "jpeg" || extension == "png");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only JPG, JPEG, PNG images are allowed.");
        
                $.validator.addMethod("fileSize", function(value, element, param) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        // Convert bytes to KB
                        const fileSizeKB = element.files[0].size / 1024;
                        return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                    }
                    return true; // No file selected, so consider it valid
                }, "File size must be between {0} KB and {1} KB.");
        
                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        title: {
                            required: true,
                        },
                        image: {
                            validImage: true,
                            fileSize: [10, 1024], // Min 180KB and Max 2MB (2 * 1024 KB)
                        },
                    },
                    messages: {
                        title: {
                            required: "Please Enter the Title",
                        },
                        image: {
                    validImage: "Only JPG, JPEG, PNG images are allowed.",
                    fileSize: "The file size must be between 10 KB and 1024 KB.",
                },
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        
                // Submit the form when the "Update" button is clicked
                $("#submitButton").click(function() {
                    // Validate the form
                    if (form.valid()) {
                        form.submit();
                    }
                });
        
                // You can remove the following two blocks if you don't need to display selected images on the page
                $("#image").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected image for English
                        // You can remove this if you don't need to display the image on the page
                        $("#currentEnglishImageDisplay").attr('src', e.target.result);
                        validator.element("#image"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
                    });
        </script>        
    @endsection
