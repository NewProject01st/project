@extends('website.layout.master')
@section('content')
    <!--Sub Header Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Contact Us </h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>
                <li>Feedback And Suggestions </li>
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
                        <form class="forms-sample" action="{{ url('feedback-suggestions') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <input class="gap-text" type="text" name="full_name" placeholder="Enter Full Name"
                                        value="{{ old('full_name') }}">
                                    @if ($errors->has('full_name'))
                                        <span class="red-text"><?php echo $errors->first('full_name', ':message'); ?></span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input class="gap-text form_text_set" type="email" name="email"
                                        placeholder="Enter Email Id" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input class="gap-text" type="text" name="mobile_number"
                                        placeholder="Enter Mobile Number"
                                        value="{{ old('mobile_number') }}"onkeyup="addvalidateMobileNumber(this.value)">
                                    <span id="number-validate" class="red-text"></span>
                                    @if ($errors->has('mobile_number'))
                                        <span class="red-text"><?php echo $errors->first('mobile_number', ':message'); ?></span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <select class="form_text_set select_box_set" name="contact_type" id="contact_type">
                                        <option value="">Select</option>
                                        <option value="Feedback" {{ old('contact_type') == 'Feedback' ? 'selected' : '' }}>
                                            Feedback</option>
                                        <option value="Suggestion"
                                            {{ old('contact_type') == 'Suggestion' ? 'selected' : '' }}>Suggestion</option>
                                    </select>
                                    @if ($errors->has('contact_type'))
                                        <span class="red-text"><?php echo $errors->first('contact_type', ':message'); ?></span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <input class="gap-text" type="text" name="subject" placeholder="Enter Subject"
                                        value="{{ old('subject') }}">
                                    @if ($errors->has('subject'))
                                        <span class="red-text"><?php echo $errors->first('subject', ':message'); ?></span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <textarea class="gap-text" name="suggestion" placeholder="Write Any Feedback/Suggestion">{{ old('suggestion') }}</textarea>
                                    @if ($errors->has('suggestion'))
                                        <span class="red-text"><?php echo $errors->first('suggestion', ':message'); ?></span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <input class="gap-text" type="submit" value="Send Message">
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
