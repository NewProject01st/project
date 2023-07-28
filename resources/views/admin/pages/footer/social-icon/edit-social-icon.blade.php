@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Social Icon
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-social-icon') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Social Icon
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-social-icon') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="icon"> Social Icon</label>
                                            <input type="file" name="icon" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('icon'))
                                                <div class="red-text"><?php echo $errors->first('icon', ':message'); ?>
                                                </div>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.SOCIAL_ICON_VIEW') }}{{ $social_icon->icon }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>




                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url">URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="url" id="url" class="form-control"
                                                value="{{ $social_icon->url }}"
                                                value="@if (old('url')) {{ old('url') }}@else{{ $social_icon->url }} @endif"
                                                placeholder="">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-social-icon') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $social_icon->id }}" placeholder="">
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
         const url = $('#url').val();
         // Enable the submit button if all fields are valid
         if (english_image && url) {
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
             url: {
                 required: true,
             },
         },
         messages: {
            english_image: {
                 required: "Upload Media File",
                 accept: "Only png, jpeg, and jpg image files are allowed.",
             },
             url: {
                required: "Please Enter the URL",
            },
           
         },
         
     });
 });
         </script>
    @endsection
