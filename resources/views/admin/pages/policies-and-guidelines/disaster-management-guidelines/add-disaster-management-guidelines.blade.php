@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Disaster Management Guidelines
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-disaster-management-guidelines') }}">Policies and
                                Legislation</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Disaster Management Guidelines</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-disaster-management-guidelines') }}"
                                method="POST" enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_title" id="english_title"
                                                class="form-control mb-2" id="english_title"
                                                placeholder="Please enter Title" value="{{ old('english_title') }}">
                                            <label class="error py-2" for="english_title" id="english_title_error"></label>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="marathi_title" id="marathi_title"
                                                class="form-control mb-2" id="marathi_title"
                                                placeholder="शीर्षक प्रविष्ट करा" value="{{ old('marathi_title') }}">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="english_pdf" id="english_pdf" accept=".pdf"
                                                class="form-control mb-2">
                                            <label class="error py-2" for="english_pdf" id="english_pdf_error"></label>
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"
                                                class="form-control mb-2">
                                            <label class="error py-2" for="marathi_pdf" id="marathi_pdf_error"></label>
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url">Year</label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" id="dYear" name="policies_year">
                                                <option value="{{ old('policies_year') }}">Select Year</option>
                                            </select>
                                            @if ($errors->has('policies_year'))
                                                <span class="red-text"><?php echo $errors->first('policies_year', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-disaster-management-guidelines') }}"
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
                    const dYear = $('#dYear').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_pdf && marathi_pdf) {
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

                // Custom validation method to check for valid PDF files
                $.validator.addMethod("validPDF", function(value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension === "pdf");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only PDF files are allowed.");

                // Update the accept attribute to validate based on file extension
                $('#english_pdf').attr('accept', 'pdf');
                $('#marathi_pdf').attr('accept', 'pdf');

                // Call the checkFormValidity function on input change
                $('input, select, #english_pdf, #marathi_pdf').on('input change', checkFormValidity);

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
                            validPDF: true,
                            fileSize: [10, 7168000], // Min 10KB and Max 7MB (7 * 1024 KB * 1024 B)
                        },
                        marathi_pdf: {
                            required: true,
                            validPDF: true,
                            fileSize: [10, 7168000], // Min 10KB and Max 7MB (7 * 1024 KB * 1024 B)
                        },
                        dYear: {
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
                            validPDF: "Only PDF files are allowed.",
                        },
                        marathi_pdf: {
                            required: "कृपया पीडीएफ अपलोड करा",
                            validPDF: "केवळ पीडीएफ फाइल्स परवानगी आहेत.",
                        },
                        dYear: {
                            required: "Please Select Year",
                        },
                    },
                });
            });
        </script>
    @endsection
