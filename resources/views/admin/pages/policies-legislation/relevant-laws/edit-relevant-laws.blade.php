@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Relevant Laws And Regulation
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-relevant-laws-and-regulations') }}">Policies and Legislation</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Relevant Laws And Regulation
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-relevant-laws-and-regulations') }}"
                                method="post" id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_title"
                                                id="english_title" placeholder="Enter the Title"
                                                value="@if (old('english_title')) {{ old('english_title') }}@else{{ $relevant_laws->english_title }} @endif">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_title"
                                                id="marathi_title" placeholder="शीर्षक प्रविष्ट करा"
                                                value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $relevant_laws->marathi_title }} @endif">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="url" id="url" class="form-control"
                                                value="@if (old('url')) {{ old('url') }}@else{{ $relevant_laws->url }} @endif"
                                                placeholder="">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="policies_year">Year</label>&nbsp;<span class="red-text">*</span>
                                            <select class="form-control" id="dYear" name="policies_year">
                                                <option value="">Select Year</option>
                                                @for ($year = date('Y'); $year >= 1950; $year--)
                                                    <option value="{{ $year }}"
                                                        @if (old('policies_year', $relevant_laws->policies_year) == $year) selected @endif>
                                                        {{ $year }}</option>
                                                @endfor
                                            </select>
                                            @if ($errors->has('policies_year'))
                                                <span class="red-text">{{ $errors->first('policies_year') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF</label><br>
                                            <input type="file" name="english_pdf" id="english_pdf" accept=".pdf"><br>
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                            <a
                                                href="{{ Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_VIEW') }}{{ $relevant_laws->english_pdf }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ</label><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"
                                                class=""><br>
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <a
                                            href="{{ Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_VIEW') }}{{ $relevant_laws->marathi_pdf }}"></a>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-relevant-laws-and-regulations') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $relevant_laws->id }}" placeholder="">
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
                    const url = $('#url').val();
                    const dYear = $('#dYear').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_pdf && marathi_pdf && url && dYear) {
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
                            fileSize: [10, 7168], // Min 10KB and Max 7MB (7 * 1024 KB)
                        },
                        marathi_pdf: {
                            required: true,
                            fileSize: [10, 7168], // Min 10KB and Max 7MB (7 * 1024 KB)
                        },
                        url: {
                            required: true,
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
                        },
                        marathi_pdf: {
                            required: "कृपया पीडीएफ अपलोड करा",
                        },
                        url: {
                            required: "Please Enter the URL",
                        },
                        dYear: {
                            required: "Please Select Year",
                        },
                    },
                });
            });
        </script>
    @endsection
