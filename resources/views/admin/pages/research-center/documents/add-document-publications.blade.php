@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Documents And publications
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-document-publications') }}">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Documents And publications</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-document-publications') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_title"
                                                id="english_title" value="{{ old('english_title') }}"
                                                placeholder="Enter the Title">
                                                <label class="error py-2" for="english_title" id="english_title_error"></label>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_title"
                                                id="marathi_title" value="{{ old('marathi_title') }}"
                                                placeholder="शीर्षक प्रविष्ट करा">
                                                <label class="error py-2" for="marathi_title" id="marathi_title_error"></label>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input class="form-control " name="english_description" id="english_description"
                                                placeholder="Enter the Description" value="{{ old('english_description') }}" name="english_description">
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>वर्णन </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control " value="{{ old('marathi_description') }}" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">Pdf</label><br>
                                            <input type="file" name="english_pdf" id="english_pdf" accept=".pdf"
                                                value="{{ old('english_pdf') }}"><br>
                                            @if ($errors->has('english_pdf'))
                                                <div class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ</label><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"
                                                value="{{ old('marathi_pdf') }}"><br>
                                            @if ($errors->has('marathi_pdf'))
                                                <div class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-document-publications') }}"
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
                    const english_pdf = $('#english_pdf').val();
                    const marathi_pdf = $('#marathi_pdf').val();
                    const english_description = $('#english_description').val();
                    const marathi_description = $('#marathi_description').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_pdf && marathi_pdf && english_description &&
                        marathi_description) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }
                // Custom validation method to check file size
                $.validator.addMethod("fileSize", function(value, element, param) {
                    // Convert bytes to KB
                    const fileSizeKB = element.files[0].size / 1024;
                    return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                }, "File size must be between {0} KB and {1} KB.");

                // Call the checkFormValidity function on input change
                $('textarea, #english_pdf, #marathi_pdf').on('input change', checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        english_title: {
                            required: true,
                        },
                        marathi_title: {
                            required: true,
                        },
                        english_pdf: {
                            required: true,
                            fileSize: [10, 7168], // Min 10KB and Max 7MB (7 * 1024 KB)
                        },
                        marathi_pdf: {
                            required: true,
                             fileSize: [10, 7168], // Min 10KB and Max 7MB (7 * 1024 KB)
                        },
                        english_description: {
                            required: true,
                        },
                        marathi_description: {
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
                        english_pdf: {
                            required: "Please Upload PDF",
                        },
                        marathi_pdf: {
                            required: "कृपया पीडीएफ अपलोड करा",
                        },
                        english_description: {
                            required: "Please Enter the Description",
                        },
                        marathi_description: {
                            required: "कृपया वर्णन प्रविष्ट करा",
                        },
                    },
                });
            });
        </script>
    @endsection
