@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Social Icon
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-social-icon') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Social Icon
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-social-icon') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="icon"> Social Icon</label>
                                            <input type="file" name="icon" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('icon'))
                                                <div class="red-text"><?php echo $errors->first('icon', ':message'); ?>
                                                </div>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.SOCIAL_ICON_VIEW') }}{{ $social_icon->icon }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>




                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url">URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="url" id="url" class="form-control"
                                                value="{{ $social_icon->url }}"
                                                value="@if (old('url')) {{ old('url') }}@else{{ $social_icon->url }} @endif"
                                                placeholder="">
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
                                        <span><a href="{{ route('list-social-icon') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $social_icon->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Include jQuery and jQuery Validation plugin in your HTML file -->

<!-- Your script -->
<script>
    $(document).ready(function() {
        var currentEnglishImage = $("#currentEnglishImage").val();

        // Function to check if all input fields are filled with valid data
        function checkFormValidity() {
            const english_image = $('#english_image').val();

            // Update the old PDF values if there are any selected files
            if (english_image !== currentEnglishImage) {
                $("#currentEnglishImage").val(english_image);
            }
        }

        // Call the checkFormValidity function on file input change
        $('#english_image').on('change', function() {
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
                english_image: {
                    validImage: true,
                    fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                },
            },
            messages: {
                english_image: {
                    validImage: "Only JPG, JPEG, PNG images are allowed.",
                    fileSize: "File size must be between 180 KB and 2048 KB.",
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
        $("#english_image").change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Display the selected image for Marathi
                // You can remove this if you don't need to display the image on the page
                $("#currentEnglishImageDisplay").attr('src', e.target.result);
                validator.element("#english_image"); // Revalidate the file input
            };
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

        {{-- <script>
            $(document).ready(function() {
                var currentEnglishImage = $("#currentEnglishImage").val();
        
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_image = $('#english_image').val();
        
                    // Update the old PDF values if there are any selected files
                    if (english_image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(english_image);
                    }
                }
        
                // Call the checkFormValidity function on file input change
                $('#english_image').on('change', function() {
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
                        english_image: {
                            validImage: true,
                            fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                        },
                    },
                    messages: {
                english_image: {
                    validImage: "फक्त JPG, JPEG, PNG प्रतिमांना परवानगी आहे.",
                    fileSize: "फाईलचा आकार 180 KB and 2048 KB दरम्यान असणे आवश्यक आहे.",
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
                $("#english_image").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected image for Marathi
                        // You can remove this if you don't need to display the image on the page
                        $("#currentEnglishImageDisplay").attr('src', e.target.result);
                        validator.element("#english_image"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>   --}}












{{-- 
        <script>
            $(document).ready(function() {
     // Function to check if all input fields are filled with valid data
     function checkFormValidity() {
         const english_image = $('#english_image').val();
         const url = $('#url').val();
         // Enable the submit button if all fields are valid
         if (english_image && url) {
             $('#submitButton').prop('disabled', false);
         } else {
             $('#submitButton').prop('disabled', true);
         }
     }
 
     // Call the checkFormValidity function on input change
     $('input, #english_image').on('input change',
         checkFormValidity);
 
     // Initialize the form validation
     $("#regForm").validate({
         rules: {
             english_image: {
                 required: true,
                 accept: "image/png, image/jpeg, image/jpg",
             },
             url: {
                 required: true,
             },
         },
         messages: {
            english_image: {
                 required: "Upload Media File",
                 accept: "Only png, jpeg, and jpg image files are allowed.",
             },
             url: {
                required: "Please Enter the URL",
            },
           
         },
         
     });
 });
         </script> --}}
    @endsection
