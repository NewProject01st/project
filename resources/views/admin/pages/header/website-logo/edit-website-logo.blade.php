@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Website Logo
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-website-logo') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Website Logo
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-website-logo') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="logo"> Logo</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="logo" class="" id="english_image"
                                                accept="image/*" placeholder="image">
                                            @if ($errors->has('logo'))
                                                <div class="red-text"><?php echo $errors->first('logo', ':message'); ?>
                                                </div>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.WEBSITE_LOGO_VIEW') }}{{ $website_logo->logo }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-website-logo') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $website_logo->id }}" placeholder="">
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
         const english_image = $('#english_image').val();
 
         // Enable the submit button if all fields are valid
         if (english_image) {
             $('#submitButton').prop('disabled', false);
         } else {
             $('#submitButton').prop('disabled', true);
         }
     }
 
     // Call the checkFormValidity function on input change
     $('input, #english_image').on('input change',
         checkFormValidity);
 
     // Initialize the form validation
     $("#regForm").validate({
         rules: {
             english_image: {
                 required: true,
                 accept: "image/png, image/jpeg, image/jpg",
             },
         },
         messages: {
             english_image: {
                 required: "Upload Media File",
                 accept: "Only png, jpeg, and jpg image files are allowed.",
             },
           
         },
         
     });
 });
         </script>
    @endsection
