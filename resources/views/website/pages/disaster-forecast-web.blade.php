@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.HOME_PAGE.DISASTER_FORCAST') }}
                @else
                    {{ Config::get('english.HOME_PAGE.DISASTER_FORCAST') }}
                @endif
            </h2>
        </div>
    </section>
    <!--Subheader End-->
    <!--Main Content Start-->
    <div class="main-content">
        <!--Department Details Page Start-->
        <div class="department-details">
            <!--Start News Start-->
            <section class="wf100 city-news p60">
                <div class="container ">
                    <div class="title-style-3 deprt-txt">
                        <h3>
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.DISASTER_FORCAST') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.DISASTER_FORCAST') }}
                            @endif
                        </h3>

                    </div>
                    <div class="row d-flex flex-wrap">

                        @forelse ($data_output as $item)
                            @if (session('language') == 'mar')
                                <div class="col-md-3 col-sm-6 mt-4">
                                    <div class="news-box">
                                        <div class="new-thumb">
                                            {{-- <span class="cat c1">Fire</span> --}}

                                        </div>
                                        <div class="new-txt">

                                            <h6 class="card_title_main"><a href="#"><?php echo $item['marathi_title']; ?></a>
                                            </h6>
                                            <p class="card_title"> <?php echo $item['marathi_description']; ?></p>
                                        </div>

                                        <div class="text-center readmorebtn">
                                            <a data-id="{{ $item['id'] }}" class="disaster-show-btn cursor-pointer">
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
                                <div class="col-md-3 col-sm-6 mt-4">
                                    <div class="news-box">
                                        <div class="new-thumb">
                                            {{-- <span class="cat c1">Fire</span> --}}

                                        </div>
                                        <div class="new-txt">
                                            <h6 class="card_title_main"><a href="#"><?php echo $item['english_title']; ?>...</a>
                                            </h6>
                                            <p class="card_title"> <?php echo $item['english_description']; ?>...</p>
                                        </div>

                                        <div class="text-center readmorebtn">
                                            <a data-id="{{ $item['id'] }}" class="disaster-show-btn cursor-pointer">
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
                        @empty
                            <h4>
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.HOME_PAGE.DISASTER_FORCAST') }}
                                @else
                                    {{ Config::get('english.HOME_PAGE.DISASTER_FORCAST') }}
                                @endif
                            </h4>
                        @endforelse
                        <form method="POST" action="{{ url('/particular-disaster_forecast') }}" id="disastershowform">
                            @csrf
                            <input type="hidden" name="disaster_show_id" id="disaster_show_id" value="">
                        </form>

                        <!--News Box End-->
                    </div>
                </div>
            </section>
            <!--Main Content End-->
        @endsection
