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

                <li> <a href="{{ route('report-incident-crowdsourcing') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK1') }}
                    @else
                        {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK1') }}
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!--Sub Header End-->
    <!--Main Content Start-->
    <div class="main-content">
        <!-- Google Map with Contact Form -->
        <div class="map-form p60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 contact-form m80 deprt-txt">
                        <h3 class="stitle text-center">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK4') }}
                            @else
                                {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK4') }}
                            @endif
                        </h3>
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                {{ Session::get('success_message') }}
                            </div>
                        @endif

                        <form id="regForm" class="forms-sample" method="post" action="{{ url('report-modal') }}"
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
                                        <label class="col-form-label modal_label">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_INCIDENT_LOCATION') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_INCIDENT_LOCATION') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <input type="text" class="form-control set_m_form" name="location" id="location"
                                            value="{{ old('location') }}"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">

                                        @if ($errors->has('location'))
                                            <span class="red-text">{{ $errors->first('location') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label class="col-form-label modal_label">
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
                                            <span class="red-text">{{ $errors->first('datetime') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label class="col-form-label modal_label">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_MOBILE_NUMBER') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_MOBILE_NUMBER') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <input type="text" class="form-control set_m_form" name="mobile_number"
                                            id="mobile_number" pattern="[789]{1}[0-9]{9}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                            maxlength="10" minlength="10" value="{{ old('mobile_number') }}">
                                        @if ($errors->has('mobile_number'))
                                            <span class="red-text">{{ $errors->first('mobile_number') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label class="col-form-label modal_label">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_DESCRIPTION') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_DESCRIPTION') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label>
                                        <textarea class="form-control set_m_form" name="description" id="description">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="red-text">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        <label class="col-form-label modal_lable">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.CITIZEN_ACTION.FORM_MEDIA_UPLOAD') }}
                                            @else
                                                {{ Config::get('english.CITIZEN_ACTION.FORM_MEDIA_UPLOAD') }}
                                            @endif
                                            <span class="red-text">*</span>
                                        </label><br>
                                        <input type="file" name="media_upload" id="media_upload"
                                            onchange="encodeImgtoBase64(this)">
                                        {{-- <input type="text" name="document_file" id="document_file"><br> --}}
                                        <span id="error_msg_alert_doc"style="color: red;"></span>
                                        <br>


                                        @if ($errors->has('media_upload'))
                                            <span class="red-text"><?php echo $errors->first('media_upload', ':message'); ?></span>
                                        @endif
                                        <img id="media_imgPreview" src="#" alt="Image"
                                            class="img-fluid img-thumbnail mt-3" width="150" style="display:none">
                                    </div>
                                    <div class="col-md-4 captcha_set" id="g_recaptcha_response"
                                        style="text-align: -webkit-right;">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}

                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <span class="red-text">{{ $errors->first('g-recaptcha-response') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer mt-4" style="float: right;width:300px">
                                    <button type="submit" class="btn btn-primary new_modal_page_btn" id="submitButton">
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
        function encodeImgtoBase64(element) {
            $('#error_msg_alert_doc').text('');
            var fileCheck = '';
            $("#document_file").val('');
            var fileInput = document.getElementById('media_upload');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                fileCheck = fileInput.files[0];
                if (fileCheck) {
                    $("#document_file").val('');
                    $("#media_imgPreview").attr('src', '#');
                    $('#error_msg_alert_doc').text('');
                    $('#error_msg_alert_doc').text('Please upload file having extensions jpg, jpeg, png format only.');
                    fileInput.value = '';
                    return false;
                }
            } else {
                var file = fileInput.files[0];
                console.log(file);
                if (file.size > 1000005) {
                    $("#document_file").val('');
                    $("#media_imgPreview").attr('src', '#');
                    $('#error_msg_alert_doc').text('');
                    $('#error_msg_alert_doc').text('Please upload files size less than 1 mb.');
                    fileInput.value = '';
                    $('#imagePreview').empty();
                    return false;
                } else {

                    var img = element.files[0];
                    var reader = new FileReader();
                    reader.onloadend = function() {
                        $("#document_file").val(reader.result);
                    }
                    reader.readAsDataURL(img);

                }

            }


        }

        $(document).ready(function() {

            $("#regForm").validate({
                errorClass: "error",
                rules: {
                    incident: {
                        required: true,
                    },
                    location: {
                        required: true,
                        spcenotallow: true,
                    },
                    datetime: {
                        required: true,
                    },
                    mobile_number: {
                        required: true,
                        spcenotallow: true,

                    },
                    description: {
                        required: true,
                        spcenotallow: true,
                    },
                    media_upload: {
                        required: true,
                        spcenotallow: true,
                    },
                   
                },
                messages: {
                    incident: {
                        required: "Select Incident",
                    },
                    location: {
                        required: "Enter Incident Location",
                        spcenotallow: "Enter Some Text",
                    },
                    datetime: {
                        required: "Enter Date and Time",
                    },
                    mobile_number: {
                        required: "Enter Mobile Number",
                        pattern: "Invalid Mobile Number",
                        remote: "This mobile number already exists.",
                        spcenotallow: "Enter Some Text",
                    },
                    description: {
                        required: "Enter Description",
                        spcenotallow: "Enter Some Text",
                    },
                    media_upload: {
                        required: "Upload Media File",
                    }
                   
                },
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                submitHandler: function(form) {
                    // Check if reCAPTCHA challenge is completed
                    if (grecaptcha.getResponse() === "") {
                        alert("Please complete the reCAPTCHA challenge.");
                    } else {
                        // Proceed with form submission
                        form.submit();
                    }
                }
            });


            if ((grecaptcha.getResponse().length === 0) && $("#regForm").valid()) {
                $('#submitButton').prop('disabled', true);
            } else {
                $('#submitButton').prop('disabled', false);
            }

            $("input#document_file").hide();
           
        });

        $.extend($.validator.methods, {
            spcenotallow: function(b, c, d) {
                if (!this.depend(d, c)) return "dependency-mismatch";
                if ("select" === c.nodeName.toLowerCase()) {
                    var e = a(c).val();
                    return e && e.length > 0
                }
                return this.checkable(c) ? this.getLength(b, c) > 0 : b.trim().length > 0
            }
        });
    </script>
@endsection
{{-- @extends('website.layout.navbar')
@extends('website.layout.header') --}}
