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

                <li> <a href="{{ route('report-incident-crowdsourcing-web') }}">
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
        <div class="map-form p80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 contact-form m80">
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


                        <form class="forms-sample" method="post" action="{{ url('report-modal') }}"
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
                                            value="{{ old('location') }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">

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
                                            id="mobile_number" pattern="[789]{1}[0-9]{9}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                            maxlength="10" minlength="10" value="{{ old('mobile_number') }}">
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
                                    </div>

                                    <div class="col-md-4 captcha_set" style="text-align: -webkit-right;">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}

                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <span class="red-text">{{ $errors->first('g-recaptcha-response') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer mt-4" style="float: right;width:300px">
                                <button type="submit" class="btn btn-primary new_modal_page_btn">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.CITIZEN_ACTION.FORM_SEND') }}
                                    @else
                                        {{ Config::get('english.CITIZEN_ACTION.FORM_SEND') }}
                                    @endif
                                </button>
                            </div>
                        </form>




                    </div>
                </div>
                {{-- <div class="row">
                     <div class="col-md-12">
                        <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3867187.666169696!2d76.76983739999999!3d18.81817715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1683036229388!5m2!1sen!2sin"></iframe>
                        </div>
                     </div>
                  </div> --}}
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
@endsection
{{-- @extends('website.layout.navbar')
@extends('website.layout.header') --}}
