@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Disaster Management News
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-disaster-management-news') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Disaster Management News
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-disaster-management-news') }}"
                                method="post" id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_title" id="english_title"
                                                class="form-control" id="english_title" placeholder="Enter the Title"
                                                value="@if (old('english_title')) {{ old('english_title') }}@else{{ $disaster_news->english_title }} @endif">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>

                                            <input type="text" name="marathi_title" id="marathi_title"
                                                class="form-control" id="marathi_title" placeholder="Enter the Title"
                                                value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $disaster_news->marathi_title }} @endif">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description">
@if (old('english_description'))
{{ old('english_description') }}@else{{ $disaster_news->english_description }}
@endif
</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> वर्णन </label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">
                                                @if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $disaster_news->marathi_description }}
@endif
                                            </textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image"> Image</label>
                                            <input type="file" name="english_image" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>

                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $disaster_news->english_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image"> प्रतिमा</label>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                                class="form-control">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $disaster_news->marathi_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="english_url">URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_url" id="english_url"
                                                class="form-control"
                                                value="@if (old('english_url')) {{ old('english_url') }}@else{{ $disaster_news->english_url }} @endif"
                                                placeholder="">
                                            @if ($errors->has('english_url'))
                                                <span class="red-text"><?php echo $errors->first('english_url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Disaster Date</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="disaster_date" id="disaster_date"
                                                value="{{ old('disaster_date') ?: $disaster_news->disaster_date }}">
                                            @if ($errors->has('disaster_date'))
                                                <span class="red-text"><?php echo $errors->first('disaster_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Disaster Date</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="disaster_date" id="disaster_date"
                                                value="@if (old('disaster_date')) {{ old('disaster_date') }}@else{{ $disaster_news->disaster_date }} @endif"
                                                >
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-disaster-management-news') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $disaster_news->id }}" placeholder="">
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
                    const english_description = $('#english_title').val();
                    const marathi_description = $('#marathi_description').val();
                    const english_image = $('#english_image').val();
                    const marathi_image = $('#marathi_image').val();
                    const english_url = $('#english_url').val();
                    const disaster_date = $('#disaster_date').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_image && marathi_image && english_url &&
                        disaster_date) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input, #english_image, #marathi_image').on('input change',
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
                        english_url: {
                            required: true,
                        },
                        disaster_date: {
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
                            accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                        },
                        marathi_image: {
                            required: "मीडिया फाइल अपलोड करा",
                            accept: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Update the error message for the accept rule
                        },
                        english_url: {
                            required: "Please Enter the URL",
                        },
                        disaster_date: {
                            required: "Please Select Disater Date",
                        },
                    },
                });
            });
        </script>
    @endsection
