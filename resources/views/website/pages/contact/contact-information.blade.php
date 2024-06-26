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
                <li> <a href="{{ route('contact-information') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.CONTACT_US.CONTACT_US_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.CONTACT_US.CONTACT_US_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.CONTACT_US.CONTACT_US_SUB_LINK1') }}
                    @else
                        {{ Config::get('english.CONTACT_US.CONTACT_US_SUB_LINK1') }}
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
                <div class="row deprt-txt">
                    <h3 class="stitle text-center d-flex justify-content-start">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.CONTACT_INFORMATION_FOR_SDMA') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.CONTACT_INFORMATION_FOR_SDMA') }}
                        @endif
                    </h3>
                    <div class="col-md-12">
                        <div class="row graybg">
                            <div class="col-md-12 br contact-new-design-b">
                                @inject('common_data_contact_obj','App\Http\Controllers\Website\IndexController')
                                <?php $common_data_contact = $common_data_contact_obj->getCommonWebData();
                                ?>
                                {{ info($common_data_contact)}}
                                @foreach ($common_data_contact['website_contact_details'] as $item)
                                    @if (session('language') == 'mar')
                                        <div class="contact-new-design-top">
                                            <div class="add-box-2 contact-new-design">
                                                <i class="fa fa-map-marker"></i>
                                                <h5>
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.OUR_LOCATION') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.OUR_LOCATION') }}
                                                    @endif
                                                </h5>
                                                <p class="set_text">
                                                    <?php echo $item['english_address']; ?>
                                                    {{-- DMS Office, Maharshtra, INDIA --}}
                                                </p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fa fa-phone"></i>
                                                <h5>
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.CALL_US') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.CALL_US') }}
                                                    @endif
                                                </h5>
                                                {{-- <p class="set_text">Phone: 080 4576 392</p> --}}
                                                <p class="set_text">
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.MOBILE') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.MOBILE') }}
                                                    @endif<?php echo $item['marathi_number']; ?>
                                                </p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fa fa-envelope"></i>
                                                <h5>
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.MAIL_US') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.MAIL_US') }}
                                                    @endif
                                                </h5>
                                                <p class="set_text"><a
                                                        href="mailto:<?php echo $item['email']; ?>"><?php echo $item['email']; ?></a></p>
                                                {{-- <p class="set_text"><a href="mailto:info@alex.com">info@balad.com</a></p> --}}
                                            </div>
                                        </div>
                                    @else
                                        <div class="contact-new-design-top">
                                            <div class="add-box-2 contact-new-design">
                                                <i class="fa fa-map-marker"></i>
                                                <h5>
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.OUR_LOCATION') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.OUR_LOCATION') }}
                                                    @endif
                                                </h5>
                                                <p class="set_text">
                                                    <?php echo $item['english_address']; ?>
                                                    {{-- DMS Office, Maharshtra, INDIA --}}
                                                </p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fa fa-phone"></i>
                                                <h5>
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.CALL_US') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.CALL_US') }}
                                                    @endif
                                                </h5>
                                                {{-- <p class="set_text">Phone: 080 4576 392</p> --}}
                                                <p class="set_text">
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.MOBILE') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.MOBILE') }}
                                                    @endif<?php echo $item['english_number']; ?>
                                                </p>
                                            </div>

                                            <div class="add-box-2 contact-new-design">
                                                <i class="fa fa-envelope"></i>
                                                <h5>
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.CONTACT_US.MAIL_US') }}
                                                    @else
                                                        {{ Config::get('english.CONTACT_US.MAIL_US') }}
                                                    @endif
                                                </h5>
                                                <p class="set_text"><a
                                                        href="mailto:contact@alex.com"><?php echo $item['email']; ?></a></p>
                                                {{-- <p class="set_text"><a href="mailto:info@alex.com">info@balad.com</a></p> --}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            {{-- <div class="col-md-7">
                                <div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59989.55128656551!2d73.76101004048985!3d19.99394785048312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1690435895770!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div> --}}
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
