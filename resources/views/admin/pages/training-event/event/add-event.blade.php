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
                                            <label for="english_title">Title </label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title">{{ old('english_title') }}</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="शीर्षक प्रविष्ट करा ">{{ old('marathi_title') }}</textarea>
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
                                            <label>वर्णन </label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा ">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control datePicker" name="start_date"
                                                id="start_date" placeholder="Selecte Start Date"
                                                value="{{ old('start_date') }}">
                                            @if ($errors->has('start_date'))
                                                <span class="red-text"><?php echo $errors->first('start_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control datePicker" name="end_date"
                                                id="end_date" placeholder="Selecte End Date" value="{{ old('end_date') }}">
                                            @if ($errors->has('end_date'))
                                                <span class="red-text"><?php echo $errors->first('end_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Image</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="english_image" id="english_image" accept="image/*"
                                                value="{{ old('english_image') }}"><br>
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
            $(function() {
                $("#end_date").datepicker({
                    format: 'dd-mm-yyyy',
                    startDate: new Date(),
                    autoclose: true,
                    closeOnDateSelect: true
                }).on('change', function() {
                    $(this).valid();
                });
            });

            $(function() {
                $("#start_date").datepicker({
                    format: 'dd-mm-yyyy',
                    startDate: new Date(),
                    autoclose: true,
                    closeOnDateSelect: true
                }).on('change', function() {
                    $(this).valid();
                });
            });
        </script>
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
                    // const end_date = $('#end_date').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_description && marathi_description && english_image && marathi_image) {
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
                        marathi_image: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                        },
                        // start_date: {
                        //     required: true,
                        // },
                        // end_date: {
                        //     required: true,
                        // },
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
                        marathi_image: {
                            required: "मीडिया फाइल अपलोड करा",
                            accept: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Update the error message for the accept rule
                        },
                        // start_date: {
                        //     required: 'Please Select Start Date',
                        // },
                        // end_date: {
                        //     required: 'Please Select End Date',
                        // },
                       
                    },
                });
            });
        </script>
    @endsection
