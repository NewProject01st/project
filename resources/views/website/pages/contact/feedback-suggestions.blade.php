@extends('website.layout.master')
@section('content')
    <!--Sub Header Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.CONTACT_US.CONTACT_US_HEADING') }}
                @else
                    {{ Config::get('english.CONTACT_US.CONTACT_US_HEADING') }}
                @endif
            </h2>
            <ul>

                <li> 
                    {{-- <a href="{{ route('feedback-suggestions') }}"> --}}
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.CONTACT_US.CONTACT_US_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.CONTACT_US.CONTACT_US_MAIN_LINK') }}
                        @endif
                    {{-- </a>  --}}
                </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.CONTACT_US.CONTACT_US_SUB_LINK2') }}
                    @else
                        {{ Config::get('english.CONTACT_US.CONTACT_US_SUB_LINK2') }}
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
                                {{ Config::get('marathi.HOME_PAGE.FEEDBACK_ADN_SUGGESTION') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.FEEDBACK_ADN_SUGGESTION') }}
                            @endif
                        </h3>
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                {{ Session::get('success_message') }}
                            </div>
                        @endif
                        <form class="forms-sample" 
                        {{-- action="{{ url('feedback-suggestions') }}" --}}
                         id="regForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label modal_lable">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.CONTACT_US.FORM_FULL_NAME') }}
                                        @else
                                            {{ Config::get('english.CONTACT_US.FORM_FULL_NAME') }}
                                        @endif
                                    </label><span class="red-text">*</span>
                                    <input class="gap-text" type="text" name="full_name" id="full_name"
                                        value="{{ old('full_name') }}" value="{{ old('full_name') }}"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                    @if ($errors->has('full_name'))
                                        <span class="red-text"><?php echo $errors->first('full_name', ':message'); ?></span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label modal_lable">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.CONTACT_US.FORM_EMAIL') }}
                                        @else
                                            {{ Config::get('english.CONTACT_US.FORM_EMAIL') }}
                                        @endif
                                    </label><span class="red-text">*</span>
                                    <input class="gap-text form_text_set" type="email" id="email" name="email"
                                        value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label modal_lable">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.CONTACT_US.FORM_MOBILE_NUMBER') }}
                                        @else
                                            {{ Config::get('english.CONTACT_US.FORM_MOBILE_NUMBER') }}
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

                                <div class="col-md-6">
                                    <label class="col-form-label modal_lable">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.CONTACT_US.FORM_FEEDBACK_TYPE') }}
                                        @else
                                            {{ Config::get('english.CONTACT_US.FORM_FEEDBACK_TYPE') }}
                                        @endif
                                    </label><span class="red-text">*</span>
                                    <select class="form_text_set select_box_set" name="contact_type" id="contact_type">
                                        <option value="">Select</option>
                                        <option value="Feedback" {{ old('contact_type') == 'Feedback' ? 'selected' : '' }}>
                                            Feedback</option>
                                        <option value="Suggestion"
                                            {{ old('contact_type') == 'Suggestion' ? 'selected' : '' }}>Suggestion</option>
                                        <option value="Complaint"
                                            {{ old('contact_type') == 'Complaint' ? 'selected' : '' }}>
                                            Complaint</option>
                                    </select>
                                    @if ($errors->has('contact_type'))
                                        <span class="red-text"><?php echo $errors->first('contact_type', ':message'); ?></span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label modal_lable">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.CONTACT_US.FORM_SUBJECT') }}
                                        @else
                                            {{ Config::get('english.CONTACT_US.FORM_SUBJECT') }}
                                        @endif
                                    </label><span class="red-text">*</span>
                                    <input class="gap-text" type="text" name="subject" id="subject"
                                        value="{{ old('subject') }}" value="{{ old('ngo_contact_number') }}"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                    @if ($errors->has('subject'))
                                        <span class="red-text"><?php echo $errors->first('subject', ':message'); ?></span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label modal_lable">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.CONTACT_US.FORM_WRITE_FEEDBACK_SUGGESTION') }}
                                        @else
                                            {{ Config::get('english.CONTACT_US.FORM_WRITE_FEEDBACK_SUGGESTION') }}
                                        @endif
                                    </label><span class="red-text">*</span>
                                    <textarea class="gap-text" name="suggestion" id="suggestion">{{ old('suggestion') }}</textarea>
                                    @if ($errors->has('suggestion'))
                                        <span class="red-text"><?php echo $errors->first('suggestion', ':message'); ?></span>
                                    @endif
                                </div>

                                <div class="col-md-8">

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

                                <div class="col-md-8">

                                </div>

                                <div class=" col-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary new_modal_page_btn" id="submitButton"
                                        style="float: right;width:300px">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.CONTACT_US.FORM_SEND') }}
                                        @else
                                            {{ Config::get('english.CONTACT_US.FORM_SEND') }}
                                        @endif
                                    </button>


                                </div>

                                
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
        $(document).ready(function() {

            $("#regForm").validate({
                errorClass: "error",
                rules: {
                    full_name: {
                        required: true,
                        spcenotallow: true,
                    },
                    email: {
                        required: true,
                        spcenotallow: true,
                    },
                    mobile_number: {
                        required: true,
                        spcenotallow: true,

                    },
                    contact_type: {
                        required: true,
                    },
                    subject: {
                        required: true,
                        spcenotallow: true,
                    },
                    suggestion: {
                        required: true,
                        spcenotallow: true,
                    },
                },
                messages: {
                    full_name: {
                        required: "Please Enter Full Name",
                        spcenotallow: "Enter Some Text",
                    },
                    email: {
                        required: "Enter the Email Id",
                        spcenotallow: "Enter Some Text",
                    },
                    mobile_number: {
                        required: "Enter Mobile Number",
                        pattern: "Invalid Mobile Number",
                        remote: "This mobile number already exists.",
                        spcenotallow: "Enter Some Text",
                    },
                    contact_type: {
                        required: "Select the Contact Type",
                    },
                    subject: {
                        required: "Enter the Subject",
                        spcenotallow: "Enter Some Text",
                    },
                    suggestion: {
                        required: "Enter the Suggestion",
                        spcenotallow: "Enter Some Text",
                    },
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
