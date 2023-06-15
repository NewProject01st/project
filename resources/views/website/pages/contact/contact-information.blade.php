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
                    <h3 class="stitle text-center d-flex justify-content-start">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.CONTACT_INFORMATION_FOR_SDMA') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.CONTACT_INFORMATION_FOR_SDMA') }}
                        @endif
                    </h3>
                    <div class="col-md-12">
                        <div class="row graybg">
                            <div class="col-md-5 br contact-new-design-b">
                                <?php $data_output_contact = App\Http\Controllers\Website\IndexController::getWebsiteContact();
                                
                                //   dd($data_output_contact);
                                
                                ?>
                                @foreach ($data_output_contact as $item)
                                    @if (session('language') == 'mar')
                                        <div class="contact-new-design-top">
                                            <div class="add-box-2 contact-new-design">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <h5>Our Location</h5>
                                                <p class="set_text">
                                                    <?php echo $item['english_address']; ?>
                                                    {{-- DMS Office, Maharshtra, INDIA --}}
                                                </p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fas fa-phone"></i>
                                                <h5>Call us</h5>
                                                {{-- <p class="set_text">Phone: 080 4576 392</p> --}}
                                                <p class="set_text">Mobile:<?php echo $item['marathi_address']; ?></p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fas fa-envelope"></i>
                                                <h5>Mail us</h5>
                                                <p class="set_text"><a
                                                        href="mailto:contact@alex.com"><?php echo $item['email']; ?></a></p>
                                                {{-- <p class="set_text"><a href="mailto:info@alex.com">info@balad.com</a></p> --}}
                                            </div>
                                        </div>
                                    @else
                                        <div class="contact-new-design-top">
                                            <div class="add-box-2 contact-new-design">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <h5>Our Location</h5>
                                                <p class="set_text">
                                                    <?php echo $item['english_address']; ?>
                                                    {{-- DMS Office, Maharshtra, INDIA --}}
                                                </p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fas fa-phone"></i>
                                                <h5>Call us</h5>
                                                {{-- <p class="set_text">Phone: 080 4576 392</p> --}}
                                                <p class="set_text">Mobile:<?php echo $item['english_address']; ?></p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fas fa-envelope"></i>
                                                <h5>Mail us</h5>
                                                <p class="set_text"><a
                                                        href="mailto:contact@alex.com"><?php echo $item['email']; ?></a></p>
                                                {{-- <p class="set_text"><a href="mailto:info@alex.com">info@balad.com</a></p> --}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
