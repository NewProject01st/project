@extends('website.layout.master')
@section('content')
    <style>
        .main-footer {
            margin-top: 0%;
        }

        /* Add these styles to your stylesheet */
        .sliderman .carousel-item {
            position: relative;
        }

        .sliderman .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black background with 0.5 opacity */
        }

        .sliderman .carousel-caption {
            position: absolute;
            /* top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); */
            color: white;
            /* White text color */
        }

        .sliderman .carousel-caption h1,
        .carousel-caption h6,
        .slide-content-box a {
            color: white;
            /* Set the text color inside the caption */
        }
    </style>
    <script>
        $('li.dropdown.mega-dropdown a').on('click', function(event) {
            $(this).parent().toggleClass('open');
        });
    </script>

    <div class="main-content">
        {{-- Start Marquee --}}
        <section class="marquee-main" id="zoomtext">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-1 marquee-left-colour d-flex justify-content-center align-items-center">
                    <p class="px-2 ">
                        @if (session('language') == 'mar')
                        {{ Config::get('marathi.HOME_PAGE.SLOGAN') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.SLOGAN') }}
                        @endif</p>
                </div>
                  <div class="col-md-11 marquee-right-colour">
                    <div class=" list-group">
                        <marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                            <div class="d-flex  g-2 ">
                                @foreach ($data_output_marquee as $item)
                                    @if (session('language') == 'mar')
                                        <p class="marquee_para px-2"><a href="{{ $item['url'] }}" target="_blank"
                                                class="marquee-scroll"><?php echo $item['marathi_title']; ?></a></p>
                                    @else
                                        <p class="marquee_para px-2"><a href="{{ $item['url'] }}" target="_blank"
                                                class="marquee-scroll"><?php echo $item['english_title']; ?></a></p>
                                    @endif
                                @endforeach
                            </div>
                        </marquee>
    
                    </div>
                  </div>
              </div>
            </div>
        </section>
        {{-- End Marquee --}}
        {{-- Start Slider --}}
        <section>
            <div id="carouselExampleDark" class="sliderman carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($data_output_slider as $slider)
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($data_output_slider as $slider)
                        @if (session('language') == 'mar')
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="5000">
                                <img src="{{ Config::get('DocumentConstant.SLIDER_VIEW') }}{{ $slider['marathi_image'] }}"
                                    class="d-block w-100" alt="{{ strip_tags($slider['marathi_title']) }} Image">
                                <div class="carousel-caption">
                                    <h1 data-aos="fade-right" data-aos-anchor="#example-anchor" data-aos-offset="500"
                                        data-aos-duration="2000"><?php echo $slider['marathi_title']; ?></h1>
                                    <h6 data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                                        data-aos-duration="2000"><?php echo $slider['marathi_description']; ?> </h6>
                                    <div class="slide-content-box pt-3" data-aos="fade-right"
                                        data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="2000"> <a
                                            href="{{ $slider['url'] }}" class="con" target="_blank">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                            @else
                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                            @endif
                                        </a> </div>
                                </div>
                            </div>
                        @elseif (array_key_exists('english_title', $slider))
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="5000">
                                <img src="{{ Config::get('DocumentConstant.SLIDER_VIEW') }}{{ $slider['english_image'] }}"
                                    class="d-block w-100" alt="{{ strip_tags($slider['english_title']) }} Image">
                                <div class="carousel-caption">
                                    <h1 data-aos="fade-right" data-aos-anchor="#example-anchor" data-aos-offset="500"
                                        data-aos-duration="2000"><?php echo $slider['english_title']; ?></h1>
                                    <h6 data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                                        data-aos-duration="2000"><?php echo $slider['english_description']; ?> </h6>
                                    <div class="slide-content-box pt-3" data-aos="fade-right"
                                        data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="2000"> <a
                                            href="{{ $slider['url'] }}" class="con" target="_blank">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                            @else
                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                            @endif
                                        </a> </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        {{-- End Slider --}}
        {{-- Start Disaster Management --}}
        <section class="Mayor-video-msg">
            <div class="container">
                @foreach ($data_output_disastermangwebportal as $item)
                    @if (session('language') == 'mar')
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="city-tour gallery">
                                    <img src="{{ Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_VIEW') }}{{ $item['marathi_image'] }}"
                                        alt="{{ strip_tags($item['marathi_title']) }} छायाचित्र" class="d-block w-100">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-7">
                                <div class="Mayor-welcome">
                                    <h5><?php echo $item['marathi_title']; ?></h5>
                                    <p><?php echo $item['marathi_description']; ?></p>
                                    <h6><?php echo $item['marathi_name']; ?></h6>
                                    <strong><?php echo $item['marathi_designation']; ?></strong>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="city-tour gallery">
                                    <img src="{{ Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_VIEW') }}{{ $item['english_image'] }}"
                                        alt="{{ strip_tags($item['english_title']) }} Image" class="d-block w-100">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-7">
                                <div class="Mayor-welcome">
                                    <h5><?php echo $item['english_title']; ?></h5>
                                    <p><?php echo $item['english_description']; ?></p>
                                    <h6><?php echo $item['english_name']; ?></h6>
                                    <strong><?php echo $item['english_designation']; ?></strong>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        {{-- End Disaster Management --}}
        <!--Start News Start-->
        <section class="wf100 city-news p60">
            <div class="container ">
                <div class="title-style-3">
                    <h3>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.DISASTER_MANAGEMENT_NEWS') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.DISASTER_MANAGEMENT_NEWS') }}
                        @endif
                    </h3>
                </div>
                <div class="row d-flex flex-wrap">
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="row d-flex flex-wrap">
                            @foreach ($data_output_disastermanagementnews as $item)
                                @if (session('language') == 'mar')
                                    <div class="col-md-4 col-sm-4 mt-4 card-new-size">
                                        <div class="news-box">
                                            <div class="new-thumb">
                                                {{-- <span class="cat c1">Fire</span> --}}
                                                <img src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $item['marathi_image'] }}"
                                                    alt="{{ strip_tags($item['marathi_title']) }} छायाचित्र"
                                                    class="d-block w-100">
                                            </div>
                                            <div class="new-txt">
                                                <ul class="news-meta">
                                                    <li>
                                                        {{-- 05 MAY, 2023  --}}
                                                        <?php echo $item['disaster_date']; ?></li>
                                                    {{-- <li>176 Comments</li> --}}
                                                </ul>
                                                <h6 class="card_title"><a href="#"><?php echo mb_substr($item['marathi_title'], 0, 31); ?></a></h6>
                                                <p class="card_title"> <?php echo mb_substr($item['marathi_description'], 0, 74); ?></p>
                                            </div>
                                            <div class="text-center readmorebtn">
                                                <a data-id="{{ $item['id'] }}" class="show-btn cursor-pointer">
                                                    <div class="cursor-pointer">

                                                        <span class="pl-3">

                                                            @if (session('language') == 'mar')
                                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                                            @else
                                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                                            @endif

                                                        </span>

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4 col-sm-4 mt-4 card-new-size">
                                        <div class="news-box">
                                            <div class="new-thumb">
                                                {{-- <span class="cat c1">Fire</span> --}}
                                                <img src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $item['english_image'] }}"
                                                    alt="{{ strip_tags($item['english_title']) }} Image"
                                                    class="d-block w-100">
                                            </div>
                                            <div class="new-txt">
                                                <ul class="news-meta">
                                                    <li>
                                                        {{-- 05 MAY, 2023  --}}
                                                        <?php echo $item['disaster_date']; ?></li>
                                                    {{-- <li>176 Comments</li> --}}
                                                </ul>
                                                <h6 class="card_title"><a href="#"><?php echo mb_substr($item['english_title'], 0, 31); ?></a></h6>
                                                <p class="card_title"> <?php echo mb_substr($item['english_description'], 0, 74); ?></p>
                                            </div>
                                            <div class="text-center readmorebtn">
                                                <a data-id="{{ $item['id'] }}" class="show-btn cursor-pointer">
                                                    <div class="cursor-pointer">

                                                        <span class="pl-3">

                                                            @if (session('language') == 'mar')
                                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                                            @else
                                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                                            @endif

                                                        </span>

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <?php $forecast_data_api = unserialize(getTempratureData()->forecast); ?>
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($forecast_data_api as $key => $forecast_data)
                                    <div
                                        class="carousel-item @if ($key == 0) {{ 'active' }} @endif">
                                        <!-- Item -->
                                        <div class="WeatherBlock mt-4">
                                            <div class="card weather_card">
                                                <div class="card-body">
                                                    <h6 class="text-center">Nashik</h6>
                                                    <p class="text-center weather_day">
                                                        {{ date('d/m/Y', strtotime($forecast_data['datetime'])) }} |
                                                        {{ date('l', strtotime($forecast_data['datetime'])) }}</p>

                                                    <div class="d-flex justify-content-center bd-highlight mb-1 today_tem">
                                                        <div class="p-2 bd-highlight">
                                                            <h5> {{ $forecast_data['min_temp'] }}° C </h5>
                                                            <h6 class="d-flex justify-content-center">MIN<h6>
                                                        </div>
                                                        <div class="p-2 bd-highlight">
                                                            <h5> {{ $forecast_data['max_temp'] }}° C </h5>
                                                            <h6 class="d-flex justify-content-center">MAX<h6>
                                                        </div>
                                                    </div>


                                                    <hr class="divide_line">
                                                    <div class="row">
                                                        @foreach ($forecast_data['hour_wise'] as $key => $forecast_data_hourwise)
                                                            @if ($key % 2 == 0)
                                                                <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                                                                    <div class="p-2 bd-highlight timewise_temp">
                                                                        <p class="time">
                                                                            {{ substr_replace($forecast_data_hourwise['datetime'], '', -3) }}
                                                                        </p>
                                                                        <p class="d-flex justify-content-center temp">
                                                                            {{ $forecast_data_hourwise['temp'] }}° C
                                                                        <p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item -->
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>

                </div>
            </div>

            <!--News Box End-->


    </div>
    </div>
    <form method="POST" action="{{ url('/disaster-management-news') }}" id="showform">
        @csrf
        <input type="hidden" name="show_id" id="show_id" value="">
    </form>
    </section>
    <!--End News End-->


    <!--Departments & Information Desk Start-->
    <section class="wf100 p75-50  depart-info">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-style-3">
                        <h3>
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.DEPARTMENT_INFORMATION_DESK') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.DEPARTMENT_INFORMATION_DESK') }}
                            @endif
                        </h3>
                    </div>
                    <div class="row">
                        @foreach ($data_output_departmentinformation as $item)
                            @if (session('language') == 'mar')
                                <!--Icon Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $item['marathi_image'] }}"
                                            alt="{{ strip_tags($item['marathi_title']) }} छायाचित्र">
                                        <h6> <a><?php echo $item['marathi_title']; ?></a> </h6>
                                        <a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                            @else
                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"> <img id="imageElement"
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $item['english_image'] }}"
                                            alt="{{ strip_tags($item['english_title']) }} Image">
                                        <h6> <a><?php echo $item['english_title']; ?></a> </h6>
                                        <a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                            @else
                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <!--Icon Box End-->
                            @endif
                        @endforeach
                        <form method="POST" action="{{ url('/department') }}" id="departmentshowform">
                            @csrf
                            <input type="hidden" name="department_show_id" id="department_show_id" value="">
                        </form>
                    </div>

                    {{-- <span class="read_more_btn_span"><a class="read_more_btn" href="{{route('list-all-department')}}" >Read More</a></span> --}}

                    <span class="read_more_btn_span">
                        @if ($total_records > 6)
                            <a class="read_more_btn" href="{{ route('list-all-department') }}" id="readMoreBtn1">Read
                                More</a>
                        @endif
                    </span>


                    {{-- <span class="read_more_btn_span">
                        <a class="read_more_btn" href="{{ route('list-all-department') }}" id="readMoreBtn">Read More</a>
                    </span> --}}




                </div>

                {{-- ============================== --}}


                {{-- ===================================== --}}

                <div class="col-md-3">
                    <div class="emergency-info mt-2">
                        <h5>
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.HELP_AND_EMERENCY_SERVICE') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.HELP_AND_EMERENCY_SERVICE') }}
                            @endif
                        </h5>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($data_output_emergencycontact as $index => $item)
                                @if (session('language') == 'mar')
                                    <div class="accordion-item custom-accordion-item">
                                        <h2 class="accordion-header accordion-header-custom"
                                            id="flush-heading{{ $index }}">
                                            <button
                                                class="accordion-button accordion-button-custom collapsed bg-secondary-custom"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false"
                                                aria-controls="flush-collapse{{ $index }}">
                                                {{ strip_tags($item['marathi_title']) }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $index }}"
                                            class="accordion-collapse collapse bg-secondary-custom"
                                            aria-labelledby="flush-heading{{ $index }}"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><i class="fa fa-user-tie"></i> <?php echo $item['marathi_name']; ?></li>
                                                    <li><i class="fa fa-building"></i> <?php echo $item['marathi_address']; ?></li>
                                                    <li><i class="fa fa-phone"></i> <?php echo $item['marathi_number']; ?></li>
                                                    <li><i class="fa fa-fax"></i> <?php echo $item['marathi_landline_no']; ?></li>
                                                    <li><i class="fa fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="accordion-item custom-accordion-item">
                                        <h2 class="accordion-header accordion-header-custom"
                                            id="flush-heading{{ $index }}">
                                            <button
                                                class="accordion-button accordion-button-custom collapsed bg-secondary-custom"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false"
                                                aria-controls="flush-collapse{{ $index }}">
                                                {{ strip_tags($item['english_title']) }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $index }}"
                                            class="accordion-collapse collapse bg-secondary-custom"
                                            aria-labelledby="flush-heading{{ $index }}"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><i class="fa fa-user-tie"></i> <?php echo $item['english_name']; ?></li>
                                                    <li><i class="fa fa-building"></i>
                                                        {{ strip_tags($item['english_address']) }}</li>
                                                    <li><i class="fa fa-phone"></i> <?php echo $item['english_number']; ?></li>
                                                    <li><i class="fa fa-fax"></i> <?php echo $item['english_landline_no']; ?></li>
                                                    <li><i class="fa fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="emergency-info mt-2">
                        <h5>
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.FORCAST_LIVE_DATA') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.FORCAST_LIVE_DATA') }}
                            @endif
                        </h5>

                        <div class="accordion accordion-flush" id="accordionFlushExample1">
                            @foreach ($data_output_disasterforcast as $index => $item)
                                @if (session('language') == 'mar')
                                    <div class="accordion-item custom-accordion-item">
                                        <h2 class="accordion-header accordion-header-custom"
                                            id="flush-heading1{{ $index }}">
                                            <button
                                                class="accordion-button accordion-button-custom collapsed bg-secondary-custom"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse1{{ $index }}"
                                                aria-expanded="false" aria-controls="flush-collapse1{{ $index }}">
                                                {{-- {{ strip_tags($item['marathi_title']) }} --}}
                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.HOME_PAGE.DISASTER_FORCAST') }}
                                                @else
                                                    {{ Config::get('english.HOME_PAGE.DISASTER_FORCAST') }}
                                                @endif
                                            </button>
                                        </h2>
                                        <div id="flush-collapse1{{ $index }}"
                                            class="accordion-collapse collapse bg-secondary-custom"
                                            aria-labelledby="flush-heading1{{ $index }}"
                                            data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><span><b
                                                                class="content-justify"><?php echo $item['marathi_title']; ?></b></span><span
                                                            class="content-justify"><?php echo $item['marathi_description']; ?></span>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="accordion-item custom-accordion-item">
                                        <h2 class="accordion-header accordion-header-custom"
                                            id="flush-heading1{{ $index }}">
                                            <button
                                                class="accordion-button accordion-button-custom collapsed bg-secondary-custom"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse1{{ $index }}"
                                                aria-expanded="false" aria-controls="flush-collapse1{{ $index }}">
                                                {{-- {{ strip_tags($item['english_title']) }} --}}

                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.HOME_PAGE.DISASTER_FORCAST') }}
                                                @else
                                                    {{ Config::get('english.HOME_PAGE.DISASTER_FORCAST') }}
                                                @endif
                                            </button>
                                        </h2>
                                        <div id="flush-collapse1{{ $index }}"
                                            class="accordion-collapse collapse bg-secondary-custom"
                                            aria-labelledby="flush-heading1{{ $index }}"
                                            data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><span><b
                                                                class="content-justify"><?php echo $item['english_title']; ?></b></span><span
                                                            class="content-justify"><?php echo $item['english_description']; ?></span>
                                                        <a href="{{ route('disaster-forecast-web') }}">
                                                            @if (session('language') == 'mar')
                                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                                            @else
                                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                                            @endif
                                                        </a>
                                            </div>
                                            </li>
                                            </ul>

                                        </div>
                                    </div>
                        </div>
                        @endif
                        @endforeach


                    </div>
                </div>

            </div>

        </div>
        </div>
        </div>
    </section>
    <!--Departments & Information Desk End-->
    </div>
    <script>
        function initializeAOS() {
            AOS.init({
                duration: 1000,
                once: true
            });
        }

        // Call initializeAOS initially when the page loads
        initializeAOS();

        // Function to manually refresh AOS after dynamically adding content
        function refreshAOS() {
            AOS.refresh();
        }
    </script>
@endsection
