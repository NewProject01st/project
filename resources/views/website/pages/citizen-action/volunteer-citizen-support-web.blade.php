@extends('website.layout.master')
@section('content')
    <style>
        .new_modal_page_btn {
            width: 100%;
            line-height: 25px;
            padding: 10px 30px 10px;
        }
    </style>

    <!--Sub Header Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_HEADING') }}
                @else
                    {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_HEADING') }}
                @endif
            </h2>
            <ul>

                <li> <a href="{{ route('add-volunteer-citizen-support-web') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK2') }}
                    @else
                        {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK2') }}
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!--Sub Header End-->
    <!--Main Content Start-->
    <div class="main-content">

        <!-- Google Map with Contact Form -->
        <div class="map-form p80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 contact-form m80 deprt-txt">
                        <h3 class="stitle text-center">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK2') }}
                            @else
                                {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK2') }}
                            @endif
                        </h3>
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                {{ Session::get('success_message') }}
                            </div>
                        @endif


                        <form class="forms-sample" method="post" action="{{ url('volunteer-modal') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="col-form-label modal_lable">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_INCIDENT_TYPE') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_INCIDENT_TYPE') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <select class="form-control set_m_form" id="incident" name="incident">
                                            <option value="">
                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.CITIZEN_ACTION.FORM_SELECT') }}
                                                @else
                                                    {{ Config::get('english.CITIZEN_ACTION.FORM_SELECT') }}
                                                @endif
                                            </option>
                                            @foreach ($data_output_incident as $incidenttype)
                                                @if (session('language') == 'mar')
                                                    <option value="{{ $incidenttype['id'] }}"
                                                        {{ old('incident') == $incidenttype['id'] ? 'selected' : '' }}>
                                                        {{ $incidenttype['marathi_title'] }}
                                                    </option>
                                                @else
                                                    <option value="{{ $incidenttype['id'] }}"
                                                        {{ old('incident') == $incidenttype['id'] ? 'selected' : '' }}>
                                                        {{ $incidenttype['english_title'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('incident'))
                                            <span class="red-text"><?php echo $errors->first('incident', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="col-form-label modal_lable">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_INCIDENT_LOCATION') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_INCIDENT_LOCATION') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <input type="input" class="form-control set_m_form" name="location" id="location"
                                            value="{{ old('location') }}"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">

                                        @if ($errors->has('location'))
                                            <span class="red-text"><?php echo $errors->first('location', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="col-form-label modal_lable">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_DATE_AND_TIME') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_DATE_AND_TIME') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <input type="datetime-local" class="form-control set_m_form" name="datetime"
                                            id="datetime" value="{{ old('datetime') }}">
                                        @if ($errors->has('datetime'))
                                            <span class="red-text"><?php echo $errors->first('datetime', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="col-form-label modal_lable">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_MOBILE_NUMBER') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_MOBILE_NUMBER') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <input type="input" class="form-control set_m_form" name="mobile_number"
                                            value="{{ old('mobile_number') }}" id="mobile_number"
                                            pattern="[789]{1}[0-9]{9}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                            maxlength="10" minlength="10">
                                        @if ($errors->has('mobile_number'))
                                            <span class="red-text"><?php echo $errors->first('mobile_number', ':message'); ?></span>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label class="col-form-label modal_lable">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_DESCRIPTION') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_DESCRIPTION') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <textarea class="form-control set_m_form" name="description" id="description">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="red-text"><?php echo $errors->first('description', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <label class="col-form-label modal_lable">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_MEDIA_UPLOAD') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_MEDIA_UPLOAD') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label><br>
                                        <input type="file" name="media_upload" id="media_upload"> <br>
                                        @if ($errors->has('media_upload'))
                                            <span class="red-text"><?php echo $errors->first('media_upload', ':message'); ?></span>
                                        @endif
                                        <img id="media_imgPreview" src="#" alt="Image"
                                        class="img-fluid img-thumbnail mt-3" width="150" style="display:none">
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group py-4">
                                            <input type="checkbox" id="is_ngo" name="is_ngo"
                                                {{ old('is_ngo') ? 'checked' : '' }}>
                                            <label for="is_ngo">
                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.CITIZEN_ACTION.ARE_YOU_NGO') }}
                                                @else
                                                    {{ Config::get('english.CITIZEN_ACTION.ARE_YOU_NGO') }}
                                                @endif
                                            </label>

                                            <div class="hiddenField row" style="display: none;">

                                                <div class="col-md-6 mb-2">
                                                    <label for="ngo_name" class="col-form-label modal_lable">
                                                        @if (session('language') == 'mar')
                                                            {{ Config::get('marathi.CITIZEN_ACTION.NGO_NAME') }}
                                                        @else
                                                            {{ Config::get('english.CITIZEN_ACTION.NGO_NAME') }}
                                                        @endif
                                                        <span class="red-text">*</span>
                                                    </label>
                                                    <input type="input" class="form-control set_m_form" name="ngo_name"
                                                        id="ngo_name" value="{{ old('ngo_name') }}">

                                                    @if ($errors->has('ngo_name'))
                                                        <span class="red-text"><?php echo $errors->first('ngo_name', ':message'); ?></span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label class="col-form-label ngo_email modal_lable">
                                                        @if (session('language') == 'mar')
                                                            {{ Config::get('marathi.CITIZEN_ACTION.NGO_EMAIL') }}
                                                        @else
                                                            {{ Config::get('english.CITIZEN_ACTION.NGO_EMAIL') }}
                                                        @endif
                                                        <span class="red-text">*</span>
                                                    </label>
                                                    <input type="input" class="form-control set_m_form" name="ngo_email"
                                                        id="ngo_email" value="{{ old('ngo_email') }}">

                                                    @if ($errors->has('ngo_email'))
                                                        <span class="red-text"><?php echo $errors->first('ngo_email', ':message'); ?></span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="ngo_contact_number" class="col-form-label  modal_lable">
                                                        @if (session('language') == 'mar')
                                                            {{ Config::get('marathi.CITIZEN_ACTION.NGO_MOBILE_NO') }}
                                                        @else
                                                            {{ Config::get('english.CITIZEN_ACTION.NGO_MOBILE_NO') }}
                                                        @endif
                                                    </label><span class="red-text">*</span>
                                                    <input type="input" class="form-control set_m_form"
                                                        name="ngo_contact_number" id="ngo_contact_number"
                                                        value="{{ old('ngo_contact_number') }}"
                                                        pattern="[789]{1}[0-9]{9}"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                        maxlength="10" minlength="10"
                                                        >

                                                    @if ($errors->has('ngo_contact_number'))
                                                        <span class="red-text"><?php echo $errors->first('ngo_contact_number', ':message'); ?></span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="ngo_photo" class="col-form-label modal_lable">
                                                        @if (session('language') == 'mar')
                                                            {{ Config::get('marathi.CITIZEN_ACTION.PHOTO') }}
                                                        @else
                                                            {{ Config::get('english.CITIZEN_ACTION.PHOTO') }}
                                                        @endif
                                                        <span class="red-text">*</span>
                                                    </label><br>
                                                    <input type="file" name="ngo_photo" id="ngo_photo"> <br>
                                                    @if ($errors->has('ngo_photo'))
                                                        <span class="red-text"><?php echo $errors->first('ngo_photo', ':message'); ?></span>
                                                    @endif
                                                    <img id="ngo_photoPreview" src="#" alt="Image" class="img-fluid img-thumbnail mt-3" width="150" style="display:none">
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <label class="col-form-label modal_lable">
                                                        @if (session('language') == 'mar')
                                                            {{ Config::get('marathi.CITIZEN_ACTION.ADDRESS') }}
                                                        @else
                                                            {{ Config::get('english.CITIZEN_ACTION.ADDRESS') }}
                                                        @endif
                                                    </label>
                                                    <textarea class="form-control set_m_form" name="ngo_address" id="ngo_address">{{ old('ngo_address') }}</textarea>
                                                    @if ($errors->has('ngo_address'))
                                                        <span class="red-text"><?php echo $errors->first('ngo_address', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <div class="captcha_set" style="text-align: -webkit-right;">
                                                    {!! NoCaptcha::renderJs() !!}
                                                    {!! NoCaptcha::display() !!}

                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span class="help-block">
                                                            <span
                                                                class="red-text">{{ $errors->first('g-recaptcha-response') }}</span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="modal-footer mt-4" style="float: right;width:300px">
                                            <button type="submit" class="btn btn-primary new_modal_page_btn" id="submitButton"
                                                disabled>
                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.CITIZEN_ACTION.FORM_SEND') }}
                                                @else
                                                    {{ Config::get('english.CITIZEN_ACTION.FORM_SEND') }}
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google Map with Contact Form End -->
    </div>
    <!--Main Content End-->
    <script>
        function addvalidateMobileNumber(number) {
            var mobileNumberPattern = /^\d*$/;
            var validationMessage = document.getElementById("number-validate");

            if (mobileNumberPattern.test(number)) {
                validationMessage.textContent = "";
            } else {
                validationMessage.textContent = "Only numbers are allowed.";
            }
        }
    </script>
    <script>
    $(document).ready(function() {
        $('#is_ngo').change(function() {
            if ($(this).is(':checked')) {
                $('.hiddenField').show();
                setNgoValidationRules(true);
            } else {
                $('.hiddenField').hide();
                setNgoValidationRules(false);
            }
            checkFormValidity(); // Call the function to update the submit button state
        });

        function setNgoValidationRules(applyValidation) {
            $("#regForm").validate().settings.rules.ngo_name.required = applyValidation;
            $("#regForm").validate().settings.rules.ngo_email.required = applyValidation;
            $("#regForm").validate().settings.rules.ngo_email.email = applyValidation;
            $("#regForm").validate().settings.rules.ngo_photo.required = applyValidation;
            $("#regForm").validate().settings.rules.ngo_address.required = applyValidation;
            $("#regForm").valid(); // Trigger validation to update error messages
        }

        // Function to check if all input fields are filled with valid data
        function checkFormValidity() {
            const incident = $('#incident').val();
            const location = $('#location').val();
            const datetime = $('#datetime').val();
            const mobile_number = $('#mobile_number').val();
            const description = $('#description').val();
            const media_upload = $('#media_upload').val();

            // Check if NGO-related fields are relevant based on 'is_ngo' checkbox
            const isNgoRelevant = $('#is_ngo').is(':checked');
            const ngo_name = isNgoRelevant ? $('#ngo_name').val() : '';
            const ngo_email = isNgoRelevant ? $('#ngo_email').val() : '';
            const ngo_photo = isNgoRelevant ? $('#ngo_photo').val() : '';
            const ngo_address = isNgoRelevant ? $('#ngo_address').val() : '';

            // Enable the submit button if all fields are valid
            if (
                incident && location && datetime && mobile_number && description && media_upload &&
                (!isNgoRelevant || (isNgoRelevant && ngo_name && ngo_email && ngo_photo && ngo_address))
            ) {
                $('#submitButton').prop('disabled', false);
            } else {
                $('#submitButton').prop('disabled', true);
            }
        }
        $.validator.addMethod("validImage", function(value, element) {
                // Check if a file is selected
                if (element.files && element.files.length > 0) {
                    var extension = element.files[0].name.split('.').pop().toLowerCase();
                    // Check the file extension
                    return (extension == "jpg" || extension == "jpeg" || extension == "png");
                }

        // Call the checkFormValidity function on input change
        $('input, textarea, select, #media_upload').on('input change', checkFormValidity);

        // Initialize the form validation
        $("#regForm").validate({
            rules: {
                incident: {
                    required: true,
                },
                location: {
                    required: true,
                },
                datetime: {
                    required: true,
                },
                mobile_number: {
                    required: true,
                    pattern: /[789][0-9]{9}/,
                    remote: {
                        url: '/web/check-mobile-number-exists',
                        type: 'post',
                        data: {
                            mobile_number: function() {
                                return $('#mobile_number').val();
                            }
                        }
                    }
                },
                description: {
                    required: true,
                },
                media_upload: {
                    required: true,
                    validImage: true,
                        accept: "png|jpeg|jpg",
                },
                // 'g-recaptcha-response': {
                //     required: true,
                // },
                ngo_name: {
                    required: true,
                },
                ngo_email: {
                    required: true,
                    email: true,
                },
                ngo_contact_number: {
                    required: true,
                    pattern: /[789][0-9]{9}/,
                },
                ngo_photo: {
                    required: true,
                    validImage: true,
                        accept: "png|jpeg|jpg",
                },
                ngo_address: {
                    required: true,
                },
            },
            messages: {
                incident: {
                    required: "Select Incident",
                },
                location: {
                    required: "Enter Incident Location",
                },
                datetime: {
                    required: "Enter Date and Time",
                },
                mobile_number: {
                    required: "Enter Mobile Number",
                    pattern: "Invalid Mobile Number",
                    remote: "This mobile number already exists."
                },
                description: {
                    required: "Enter Description",
                },
                media_upload: {
                    required: "Upload Media File",
                    validImage: true,
                        accept: "png|jpeg|jpg",
                },
                // 'g-recaptcha-response': {
                //     required: "Please complete the reCAPTCHA.",
                // },
                ngo_name: {
                    required: "Please enter your NGO name.",
                },
                ngo_email: {
                    required: "Please enter your NGO email address.",
                    email: "Please enter a valid email address.",
                },
                ngo_contact_number: {
                    required: "Please enter your NGO contact number.",
                    pattern: "Invalid Mobile Number",
                },
                ngo_photo: {
                    required: "Please upload your NGO photo.",
                },
                ngo_address: {
                    required: "Please enter your NGO address.",
                },
            },
        });

        // Trigger 'change' event on '#is_ngo' checkbox to handle initial state
        $('#is_ngo').trigger('change');
    });
});
</script>

  

    {{-- <script>
        $(document).ready(function() {
            $('#is_ngo').change(function() {
                if ($(this).is(':checked')) {
                    $('.hiddenField').show();
                } else {
                    $('.hiddenField').hide();
                }
            });
        });

        var is_ngo = '{{ old('is_ngo') }}';
        // alert(is_ngo);
        if (is_ngo == 'on') {
            $('.hiddenField').show();
        }
    </script> --}}
@endsection
{{-- @extends('website.layout.navbar')
@extends('website.layout.header') --}}
