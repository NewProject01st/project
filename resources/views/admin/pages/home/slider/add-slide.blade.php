@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">Slide
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-slide') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Slide </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('add-slide') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="english_title" id="english_title"
                                                placeholder="Enter the Title" name="english_title"
                                                value="{{ old('english_title') }}">
                                            <label class="error py-2" for="english_title" id="english_title_error"></label>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="marathi_title" id="marathi_title"
                                                placeholder="शीर्षक प्रविष्ट करा " name="marathi_title"
                                                value="{{ old('marathi_title') }}">
                                            <label class="error py-2" for="marathi_title" id="marathi_title_error"></label>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_description">Description</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="description">{{ old('english_description') }}</textarea>
                                            <label class="error py-2" for="english_description"
                                                id="english_description_error"></label>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_description"> वर्णन </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">{{ old('marathi_description') }}</textarea>
                                            <label class="error py-2" for="marathi_description"
                                                id="marathi_description_error"></label>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Image </label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="english_image" id="english_image" accept="image/*"
                                                value="{{ old('english_image') }}"><br>
                                            <label class="error py-2" for="english_image" id="english_image_error"></label>
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
                                                value="{{ old('marathi_image') }}"><br>
                                            <label class="error py-2" for="marathi_image" id="marathi_image_error"></label>
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control url" name="url" id="url"
                                                value="{{ old('url') }}" placeholder="Enter the URL">
                                            <label class="error py-2" for="url" id="url_error"></label>
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-slide') }}"
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
                    const url = $('#url').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_description && marathi_description && english_image && marathi_image && url) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                $.validator.addMethod("validImage", function(value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension == "jpg" || extension == "jpeg" || extension == "png" || extension ==
                            "gif");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only JPG, JPEG, PNG, and GIF images are allowed.");

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
                            validImage: true,
                            accept: "png|jpeg|jpg",
                            filesize: {
                                min: {{ config('AllFileValidation.SLIDER_IMAGE_MIN_SIZE') }},
                                max: {{ config('AllFileValidation.SLIDER_IMAGE_MAX_SIZE') }},
                            },
                        },
                        marathi_image: {
                            required: true,
                            validImage: true,
                            accept: "png|jpeg|jpg",
                            filesize: {
                                min: {{ config('AllFileValidation.SLIDER_IMAGE_MIN_SIZE') }},
                                max: {{ config('AllFileValidation.SLIDER_IMAGE_MAX_SIZE') }},
                            },
                        },
                        url: {
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
                            validImage: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Upda
                            // filesize: "The file size must be between 100KB and 1024KB.",
                            filesize: {
                                tooLarge: "The file size is too large. The maximum file size allowed is {max} MB.",
                            },
                        },
                        marathi_image: {
                            required: "मीडिया फाइल अपलोड करा",
                            validImage: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Upda
                            // filesize: "The file size must be between 100KB and 1024KB.",
                            filesize: {
                                tooLarge: "फाइल आकार खूप मोठा आहे. परवानगी दिलेल्या कमाल फाइल आकार {max} MB आहे.",
                            },
                        },
                        url: {
                            required: "Please Enter the URL",
                        },
                    },

                });
            });
        </script>
    @endsection
