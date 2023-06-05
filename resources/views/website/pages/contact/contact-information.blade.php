@extends('website.layout.master')
@section('content')
    <!--Sub Header Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Contact Us </h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>
                <li> Contact Information </li>
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
                    <div class="col-md-12">
                        <div class="row graybg">
                            <div class="col-md-5 br contact-new-design-b">
                                <div class="contact-new-design-top">
                                    <div class="add-box-2 contact-new-design">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <h5>Our Location</h5>
                                        <p class="set_text">Street # 75, Borne Block, <br>
                                            5th Avenue, West Road, NY.
                                        </p>
                                    </div>

                                    <div class="add-box-2 contact-new-design">
                                        <i class="fas fa-phone"></i>
                                        <h5>Call us</h5>
                                        <p class="set_text">Phone: 080 4576 392</p>
                                        <p class="set_text">Mobile: 0800 4567 890</p>
                                    </div>

                                    <div class="add-box-2 contact-new-design">
                                        <i class="fas fa-envelope"></i>
                                        <h5>Mail us</h5>
                                        <p class="set_text"><a href="mailto:contact@alex.com">contact@balad.com</a></p>
                                        <p class="set_text"><a href="mailto:info@alex.com">info@balad.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">

                                <div class="map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3867187.666169696!2d76.76983739999999!3d18.81817715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1683036229388!5m2!1sen!2sin"></iframe>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Google Map with Contact Form End -->
    </div>
    <!--Main Content End-->
@endsection
{{-- @extends('website.layout.navbar')
@extends('website.layout.header') --}}
