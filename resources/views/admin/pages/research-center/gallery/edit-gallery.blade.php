@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Gallery</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-gallery') }}">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Gallery
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-gallery') }}" method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image"> Image</label>
                                            <input type="file" name="english_image" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image"
                                                value="{{ old('english_title') }}">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>

                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.Gallery_VIEW') }}{{ $gallery->english_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image">Marathi Image</label>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                                class="form-control">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ Config::get('DocumentConstant.Gallery_VIEW') }}{{ $gallery->marathi_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center mt-3">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-gallery') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $gallery->id }}" placeholder="">
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
                    // const category_id = $('#category_id').val();
                    const english_image = $('#english_image').val();
                    const marathi_image = $('#marathi_image').val();
                
                    // Enable the submit button if all fields are valid
                    if (english_image && marathi_image) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('#english_image, #marathi_image').on('input change',
                    checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        // category_id: {
                        //     required: true,
                        // },
                        english_image: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                        },
                        marathi_image: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                        },
                       
                    },
                    messages: {
                        // category_id: {
                        //     required: "Please Enter the Title",
                        // },
                        english_image: {
                            required: "Upload Media File",
                            accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                        },
                        marathi_image: {
                            required: "मीडिया फाइल अपलोड करा",
                            accept: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Update the error message for the accept rule
                        },
                    },
                });
            });
        </script>
    @endsection
