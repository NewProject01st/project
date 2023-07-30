@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Gallery Category</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-gallery-category') }}">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Gallery Category
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-gallery-category') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name">Category Name</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input class="form-control mb-2 english_name" name="english_name" id="english_name"
                                                value="{{ $success_stories->english_name }}" placeholder="Enter the Name">
                                            {{-- <textarea class="form-control english_name" name="english_name" id="english_name" placeholder="Enter the Title">{{ $success_stories->english_name }}</textarea> --}}
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name">श्रेणीचे नाव</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input class="form-control mb-2 marathi_name" name="marathi_name" id="marathi_name"
                                                value="{{ $success_stories->marathi_name }}" placeholder="नाव प्रविष्ट करा">
                                            {{-- <textarea class="form-control marathi_name" name="marathi_name" id="marathi_name" placeholder="Enter the Title">{{ $success_stories->marathi_name }}</textarea> --}}
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-gallery-category') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $success_stories->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                function checkFormValidity() {
                    const english_name = $('#english_name').val();
                    const marathi_name = $('#marathi_name').val();
                }
                // Call the checkFormValidity function on file input change
                $('input').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });
                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        english_name: {
                            required: true,
                        },
                        marathi_name: {
                            required: true,
                        },
                    },
                    messages: {
                        english_name: {
                            required: "Please Enter the Name",
                        },
                        marathi_name: {
                            required: "कृपया नाव प्रविष्ट करा",
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
            });
        </script>    
    @endsection
