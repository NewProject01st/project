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
                        <li class="breadcrumb-item"><a href="{{ url('list-social-icon') }}">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Social Icon </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-social-icon') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="icon">Social Icon</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="icon" id="icon" value="{{ old('icon') }}"
                                                accept="image/*" class="form-control mb-2">
                                            @if ($errors->has('icon'))
                                                <div class="red-text"><?php echo $errors->first('icon', ':message'); ?></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="url" id="url" class="form-control mb-2"
                                                id="url" placeholder="" value="{{ old('url') }}">
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
                                        <span><a href="{{ route('list-social-icon') }}"
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
                    const icon = $('#icon').val();
            
                    // Enable the submit button if all fields are valid
                    if (icon && url) {
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
                }, "Only JPG, JPEG, PNG images are allowed.");
            
                // Custom validation method to check file size
                $.validator.addMethod("fileSize", function(value, element, param) {
                    // Convert bytes to KB
                    const fileSizeKB = element.files[0].size / 1024;
                    return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                }, "File size must be between {0} KB and {1} KB.");
            
                // Update the accept attribute to validate based on file extension
                $('#icon').attr('accept', 'image/jpeg, image/png');
            
                // Call the checkFormValidity function on input change
                $('input, #icon').on('input change', checkFormValidity);
            
                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        icon: {
                            required: true,
                            fileExtension: ["jpg", "jpeg", "png"],
                            fileSize: [10, 1024], // Min 10KB and Max 2MB (2 * 1024 KB)
                        },
                        url: {
                            required: true,
                        },
                    },
                    messages: {
                        marathi_image: {
                            required: "कृपया छायाचित्र अपलोड करा (JPG, JPEG, PNG).",
                            fileExtension: "फक्त JPG, JPEG, आणि PNG छायाचित्रंना परवानगी आहे.",
                            fileSize: "फाइल साईज 10 KB आणि 1 MB दरम्यान असणे आवश्यक आहे.",
                        },
                        url: {
                            required: "Please Enter the URL",
                        },
                    },
                });
            });
            </script>    
    @endsection
