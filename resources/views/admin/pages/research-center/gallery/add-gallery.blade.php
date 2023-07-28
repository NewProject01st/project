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
                                            <select class="form-control" id="category_id" name="category_id">
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
                                                value="{{ old('english_title') }}">
                                            @if ($errors->has('english_image'))
                                                <div class="red-text"><?php echo $errors->first('english_image', ':message'); ?></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image">प्रतिमा</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*">
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

                // Call the checkFormValidity function on input change
                $('select, #english_image, #marathi_image').on('input change',
                    checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        category_id: {
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
                       
                    },
                    messages: {
                        category_id: {
                            required: "Please Enter the Title",
                        },
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
