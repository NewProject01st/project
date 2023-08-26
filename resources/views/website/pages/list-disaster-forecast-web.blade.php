@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.NEWS_EVENTS.NEWS_EVENTS_HEADING') }}
                @else
                    {{ Config::get('english.NEWS_EVENTS.NEWS_EVENTS_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('list-disaster-management-news-web') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.NEWS_EVENTS.NEWS_EVENTS_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.NEWS_EVENTS.NEWS_EVENTS_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                    {{ Config::get('marathi.HOME_PAGE.DISASTER_FORCAST') }}
                @else
                    {{ Config::get('english.HOME_PAGE.DISASTER_FORCAST') }}
                @endif
                </li>
            </ul>
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
                            Disaster Forecaste
                            {{-- @if (session('language') == 'mar')
                                {{ Config::get('marathi.NEWS_EVENTS.DISASTER_MANAGEMENT_NEWS') }}
                            @else
                                {{ Config::get('english.NEWS_EVENTS.DISASTER_MANAGEMENT_NEWS') }}
                            @endif --}}
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
                                        <div class="news-box-f"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  @if (session('language') == 'mar')
                                            {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                        @else
                                            {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                        @endif <a
                                            data-id="{{ $item['id'] }}" class="disaster-show-btn"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                        {{-- <div class="news-box-f cursor-pointer">
                                            <span class="pl-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                                @else
                                                    {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                                @endif
                                            </span> <a data-id="{{ $item['id'] }}" class="show-btn"><i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div> --}}
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
                                        <div class="news-box-f"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Read more <a
                                                data-id="{{ $item['id'] }}" class="disaster-show-btn"><i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4>
                                Disaster Forecaste
                                {{-- @if (session('language') == 'mar')
                                    {{ Config::get('marathi.NEWS_EVENTS.NO_DATA_FOUND_DISASTER_MANAGEMENT_NEWS') }}
                                @else
                                    {{ Config::get('english.NEWS_EVENTS.NO_DATA_FOUND_DISASTER_MANAGEMENT_NEWS') }}
                                @endif --}}
                            </h4>
                        @endforelse
                          <form method="POST" action="{{ url('/particular-disaster_forecast') }}"
                                id="disastershowform">
                                @csrf
                                <input type="hidden" name="disaster_show_id" id="disaster_show_id" value="">
                            </form> 

                        <!--News Box End-->
                    </div>
                </div>
            </section>
            <!--Main Content End-->
        @endsection
