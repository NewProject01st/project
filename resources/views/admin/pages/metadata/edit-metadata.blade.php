@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Metadata
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-metadata') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Metadata</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('update-metadata') }}' method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name"> Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control mb-2" placeholder="Please Enter the Name"
                                                value="{{ $metadata->english_name }}" name="english_name" id="english_name">
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="keywords">Keywords<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control mb-2" placeholder="Please Enter the Keywords"
                                                value="{{ $metadata->keywords }}" name="keywords" id="keywords">
                                            @if ($errors->has('keywords'))
                                                <span class="red-text"><?php echo $errors->first('keywords', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">Save &amp;
                                            Update</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger"><a href="{{ route('list-metadata') }}" class="text-light">Cancel</a></button> --}}
                                        <span><a href="{{ route('list-metadata') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $metadata->id }}" placeholder="">
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
                    const keywords = $('#keywords').val();
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
                        keywords: {
                            required: true,
                        },
                    },
                    messages: {
                        english_name: {
                            required: "Please Enter the Name",
                        },
                        keywords: {
                            required: "Please Enter the Keywords",
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
