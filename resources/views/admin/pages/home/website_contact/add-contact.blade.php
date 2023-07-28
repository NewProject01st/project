@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Website Contact
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-website-contact') }}">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Website Contact </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-website-contact') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_address"> Address</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_title" name="english_address" id="english_address"
                                                placeholder="Enter the english address">{{ old('english_address') }}</textarea>
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_address">पत्ता </label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_title" name="marathi_address" id="marathi_address"
                                                placeholder="Enter the marathi address">{{ old('marathi_address') }}</textarea>
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number"> Number</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_number" id="english_number"
                                                class="form-control" id="english_number" placeholder=""
                                                {{-- pattern="[789]{1}[0-9]{9}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                maxlength="10" minlength="10"  --}} value="{{ old('english_number') }}">
                                            @if ($errors->has('english_number'))
                                                <span class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_number"> क्रमांक </label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_number" id="marathi_number"
                                                {{-- pattern="[789]{1}[0-9]{9}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                maxlength="10" minlength="10"  --}} class="form-control" id="marathi_number"
                                                placeholder="" value="{{ old('marathi_number') }}">
                                            @if ($errors->has('marathi_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="email" id="email" class="form-control"
                                                id="email" placeholder="" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-website-contact') }}"
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
         const english_description = $('#english_description').val();
         const marathi_description = $('#marathi_description').val();
         const english_image = $('#english_image').val();
         const marathi_image = $('#marathi_image').val();
         const url = $('#url').val();
 
         // Enable the submit button if all fields are valid
         if (english_title && marathi_title && english_image && marathi_image && url) {
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
                 accept: "image/png, image/jpeg, image/jpg",
                 // filesize: {
                 //     min: <?= config('all_file_validation.SLIDER_IMAGE_MAX_SIZE') ?>,
                 //     max: <?= config('all_file_validation.SLIDER_IMAGE_MAX_SIZE') ?>,
                 // },
             },
             marathi_image: {
                 required: true,
                 accept: "image/png, image/jpeg, image/jpg",
                 // filesize: {
                 //     min: <?= config('all_file_validation.SLIDER_IMAGE_MAX_SIZE') ?>,
                 //     max: <?= config('all_file_validation.SLIDER_IMAGE_MAX_SIZE') ?>,
                 // },
             },
             url: {
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
                 accept: "Only png, jpeg, and jpg image files are allowed.",
                 // filesize: {
                 //     tooLarge: "The file size is too large. The maximum file size allowed is {max} MB.",
                 // },
             },
             marathi_image: {
                 required: "मीडिया फाइल अपलोड करा",
                 accept: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.",
                 // filesize: {
                 //     tooLarge: "फाइल आकार खूप मोठा आहे. परवानगी दिलेल्या कमाल फाइल आकार {max} MB आहे.",
                 // },
             },
             url: {
                 required: "Please Enter the URL",
             },
         },
         
     });
 });
         </script>
    @endsection
