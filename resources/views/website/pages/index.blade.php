@extends('website.layout.master')
@section('content')
    <style>
        .main-footer {
            margin-top: 0%;
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
        </section>
        {{-- End Marquee --}}
        {{-- Start Slider --}}
        <section>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($data_output_slider as $slider)
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($data_output_slider as $slider)
                        @if (session('language') == 'mar')
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                                <img src="{{ Config::get('DocumentConstant.SLIDER_VIEW') }}{{ $slider['marathi_image'] }}"
                                    class="d-block w-100" alt="{{ strip_tags($slider['marathi_title']) }} Image">
                                <div class="carousel-caption">
                                    <h1><?php echo $slider['marathi_title']; ?></h1>
                                    <p><?php echo $slider['marathi_description']; ?> </p>
                                    <div class="slide-content-box pt-3"> <a href="{{ $slider['url'] }}" class="con"
                                            target="_blank">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                            @else
                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                            @endif
                                        </a> </div>
                                </div>
                            </div>
                        @elseif (array_key_exists('english_title', $slider))
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                                <img src="{{ Config::get('DocumentConstant.SLIDER_VIEW') }}{{ $slider['english_image'] }}"
                                    class="d-block w-100" alt="{{ strip_tags($slider['english_title']) }} Image">
                                <div class="carousel-caption">
                                    <h1><?php echo $slider['english_title']; ?></h1>
                                    <p><?php echo $slider['english_description']; ?> </p>
                                    <div class="slide-content-box pt-3"> <a href="{{ $slider['url'] }}" class="con"
                                            target="_blank">
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
                                <div class="city-tour gallery"> <strong>
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.HOME_PAGE.DISASTER_MANAGEMENT_HEAD') }}
                                        @else
                                            {{ Config::get('english.HOME_PAGE.DISASTER_MANAGEMENT_HEAD') }}
                                        @endif
                                    </strong>
                                    <img src="{{ Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_VIEW') }}{{ $item['marathi_image'] }}"
                                        alt="{{ strip_tags($item['marathi_title']) }} प्रतिमा" class="d-block w-100">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-7">
                                <div class="Mayor-welcome">
                                    <h5><?php echo $item['marathi_title']; ?></h5>
                                    <p><?php echo $item['marathi_description']; ?></p>
                                    <strong><?php echo $item['marathi_designation']; ?></strong>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="city-tour gallery"> <strong>
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.HOME_PAGE.DISASTER_MANAGEMENT_HEAD') }}
                                        @else
                                            {{ Config::get('english.HOME_PAGE.DISASTER_MANAGEMENT_HEAD') }}
                                        @endif
                                    </strong>
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
        <section class="wf100 city-news p75">
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
                                    <div class="col-md-4 col-sm-4 mt-4">
                                        <div class="news-box">
                                            <div class="new-thumb">
                                                {{-- <span class="cat c1">Fire</span> --}}
                                                <img src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $item['marathi_image'] }}"
                                                    alt="{{ strip_tags($item['marathi_title']) }} प्रतिमा"
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
                                            <div class="news-box-f cursor-pointer">
                                                <span class="pl-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                                    @else
                                                        {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                                    @endif
                                                </span> <a data-id="{{ $item['id'] }}" class="show-btn"><i
                                                        class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-4 col-sm-4 mt-4">
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
                                            <div class="news-box-f cursor-pointer">
                                                <span class="pl-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @if (session('language') == 'mar')
                                                        {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                                    @else
                                                        {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                                    @endif
                                                </span> <a data-id="{{ $item['id'] }}" class="show-btn"><i
                                                        class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <?php $forecast_data_api = unserialize(getTempratureData()->forecast); ?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($forecast_data_api as $key => $forecast_data)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                        class="@if ($key == 0) {{ 'active' }} @endif"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($forecast_data_api as $key => $forecast_data)
                                    <div
                                        class="carousel-item @if ($key == 0) {{ 'active' }} @endif">
                                        <!-- Item -->
                                        <div class="WeatherBlock">
                                            <div class="card weather_card">
                                                <div class="card-body">
                                                    <h3 class="text-center">Nashik</h3>
                                                    <p class="text-center">{{ $forecast_data['datetime'] }}</p>

                                                   {{-- <div class="d-flex justify-content-center bd-highlight mb-2">
                                                        <div class="p-2 bd-highlight">
                                                            <h5> 18° C </h5>
                                                            <h6 class="d-flex justify-content-center">MIN<h6>
                                                        </div>
                                                        <div class="p-2 bd-highlight">
                                                            <h5> 18° C </h5>
                                                            <h6 class="d-flex justify-content-center">MAX<h6>
                                                        </div>
                                                    </div>
                                                    --}}

                                                    <hr>
                                                    <div class="row">
                                                        @foreach ($forecast_data['hour_wise'] as $key => $forecast_data_hourwise)
                                                            @if ($key % 2 == 0)
                                                                <div class="col-md-4 mb-2">
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
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!--News Box End-->

    </div>
    </div>
    <form method="POST" action="{{ url('/new-paricular-data-web') }}" id="showform">
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
                                            alt="{{ strip_tags($item['marathi_title']) }} प्रतिमा">
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
                                    <div class="deprt-icon-box"> <img
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
                        <form method="POST" action="{{ url('/particular-department-information') }}"
                            id="departmentshowform">
                            @csrf
                            <input type="hidden" name="department_show_id" id="department_show_id" value="">
                        </form>
                    </div>
                </div>

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
                                                    <li><i class="fas fa-user-tie"></i> <?php echo $item['marathi_name']; ?></li>
                                                    <li><i class="fas fa-building"></i> <?php echo $item['marathi_address']; ?></li>
                                                    <li><i class="fas fa-phone"></i> <?php echo $item['marathi_number']; ?></li>
                                                    <li><i class="fas fa-fax"></i> <?php echo $item['marathi_landline_no']; ?></li>
                                                    <li><i class="fas fa-envelope"></i> <?php echo $item['email']; ?></li>
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
                                                    <li><i class="fas fa-user-tie"></i> <?php echo $item['english_name']; ?></li>
                                                    <li><i class="fas fa-building"></i>
                                                        {{ strip_tags($item['english_address']) }}</li>
                                                    <li><i class="fas fa-phone"></i> <?php echo $item['english_number']; ?></li>
                                                    <li><i class="fas fa-fax"></i> <?php echo $item['english_landline_no']; ?></li>
                                                    <li><i class="fas fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="emergency-info">
                            <h5>
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.HOME_PAGE.HELP_AND_EMERENCY_SERVICE') }}
                                @else
                                    {{ Config::get('english.HOME_PAGE.HELP_AND_EMERENCY_SERVICE') }}
                                @endif
                            </h5>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!--Panel Start-->
                                @foreach ($data_output_emergencycontact as $index => $item)
                                    @if (session('language') == 'mar')
                                        <div class="panel">
                                            <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                                <h6> <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapse{{ $index }}" aria-expanded="true"
                                                        aria-controls="collapse{{ $index }}"> <?php echo $item['marathi_title']; ?>
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapse{{ $index }}" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="heading{{ $index }}">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li> <i class="fas fa-user-tie"></i> <?php echo $item['marathi_name']; ?> </li>
                                                        <li> <i class="fas fa-building"></i> <?php echo $item['marathi_address']; ?> </li>
                                                        <li> <i class="fas fa-phone"></i> <?php echo $item['marathi_number']; ?></li>
                                                        <li> <i class="fas fa-fax"></i> <?php echo $item['marathi_landline_no']; ?> </li>
                                                        <li> <i class="fas fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="panel">
                                            <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                                <h6 class="emergancy-contact"> <a role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapse{{ $index }}"
                                                        aria-expanded="true"
                                                        aria-controls="collapse{{ $index }}" 
                                                        class="help_title" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ strip_tags($item['english_title']) }}">{{ mb_substr(strip_tags($item['english_title']), 0, 19) }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapse{{ $index }}" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="heading{{ $index }}">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li> <i class="fas fa-user-tie"></i> <?php echo $item['english_name']; ?> </li>
                                                        <li> <i class="fas fa-building"></i>
                                                            {{ strip_tags($item['english_address']) }}</li>
                                                        <li> <i class="fas fa-phone"></i> <?php echo $item['english_number']; ?></li>
                                                        <li> <i class="fas fa-fax"></i> <?php echo $item['english_landline_no']; ?> </li>
                                                        <li> <i class="fas fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!--Panel End-->
                            </div>

                        </div> --}}

                    {{-- <a href="{{ route('list-vacancies') }}" class="jobs-link">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.OPEN_VACANCIES') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.OPEN_VACANCIES') }}
                            @endif
                        </a>
                        --}}
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
                                                    <li><?php echo $item['marathi_description']; ?></li>
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
                                                    <li> <?php echo $item['english_description']; ?></li>
                                                </ul>
                                                <?php $forecast_data_api = unserialize(getTempratureData()->forecast); ?>
                                                @foreach ($forecast_data_api as $forecast_data)
                                                    <ul>
                                                        <li> conditions: {{ $forecast_data['conditions'] }}</li>
                                                        <li> description: {{ $forecast_data['description'] }}</li>
                                                        <li> sunrise: {{ $forecast_data['sunrise'] }}</li>
                                                        <li> sunset: {{ $forecast_data['sunset'] }}</li>
                                                    </ul>
                                                    @foreach ($forecast_data['hour_wise'] as $forecast_data_hourwise)
                                                        <ul>
                                                            <li> Time : {{ $forecast_data_hourwise['datetime'] }}
                                                                Temprature : {{ $forecast_data_hourwise['temp'] }}
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
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
@endsection
{{-- @extends('website.layout.navbar')
@extends('website.layout.header') --}}
