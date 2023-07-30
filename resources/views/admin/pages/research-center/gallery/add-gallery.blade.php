@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Gallery
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-gallery') }}">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Gallery</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-gallery') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="category_id">Gallery Category</label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control mb-2" id="category_id" name="category_id">
                                                <option value="">Select</option>
                                                @foreach ($category_gallery as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['english_name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                            <div class="red-text"><?php echo $errors->first('category_id', ':message'); ?></div>
                                        @endif
                                        </div>
                                      
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Image</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="english_image" id="english_image" accept="image/*"
                                            class="form-control mb-2">
                                            @if ($errors->has('english_image'))
                                                <div class="red-text"><?php echo $errors->first('english_image', ':message'); ?></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image">प्रतिमा</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*" class="form-control mb-2">
                                            @if ($errors->has('marathi_image'))
                                                <div class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center mt-3">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-gallery') }}"
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
                    const category_id = $('#category_id').val();
                    const english_image = $('#english_image').val();
                    const marathi_image = $('#marathi_image').val();
            
                    // Enable the submit button if all fields are valid
                    if (category_id && english_image && marathi_image) {
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
                $('input,#english_image, #marathi_image').on('input change', checkFormValidity);
            
                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        category_id: {
                            required: true,
                        },
                        english_image: {
                            required: true,
                            fileExtension: ["jpg", "jpeg", "png"],
                            fileSize: [180, 2048], // Min 10KB and Max 2MB (2 * 1024 KB)
                        },
                        marathi_image: {
                            required: true,
                            fileExtension: ["jpg", "jpeg", "png"],
                            fileSize: [180, 2048], // Min 10KB and Max 2MB (2 * 1024 KB)
                        },
                    },
                    messages: {
                        category_id: {
                            required: "Please Select the Category.",
                        },
                        english_image: {
                            required: "Please upload an Image (JPG, JPEG, PNG).",
                            fileExtension: "Only JPG, JPEG, and PNG images are allowed.",
                            fileSize: "File size must be between 180 KB and 2 MB.",
                        },
                        marathi_image: {
                            required: "कृपया प्रतिमा अपलोड करा (JPG, JPEG, PNG).",
                            fileExtension: "फक्त JPG, JPEG, आणि PNG प्रतिमांना परवानगी आहे.",
                            fileSize: "फाइल साईज 180 KB आणि 2 MB दरम्यान असणे आवश्यक आहे.",
                        },
                    },
                });
            });
            </script>          
    @endsection
