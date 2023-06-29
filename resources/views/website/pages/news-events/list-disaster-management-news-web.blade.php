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
                            {{ Config::get('marathi.NEWS_EVENTS.NEWS_EVENTS_SUB_LINK1') }}
                        @else
                            {{ Config::get('english.NEWS_EVENTS.NEWS_EVENTS_SUB_LINK1') }}
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
                <section class="wf100 city-news p75">
                    <div class="container ">
                        <div class="title-style-3">
                            <h3>
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.NEWS_EVENTS.DISASTER_MANAGEMENT_NEWS') }}
                                @else
                                    {{ Config::get('english.NEWS_EVENTS.DISASTER_MANAGEMENT_NEWS') }}
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
                                                <img src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $item['marathi_image'] }}"
                                                alt=" {{ strip_tags($item['marathi_title']) }} प्रतिमा"  class="d-block w-100">
                                            </div>
                                            <div class="new-txt">
                                                <ul class="news-meta">
                                                    <li>
                                                        {{-- 05 MAY, 2023  --}}
                                                        <?php echo $item['disaster_date']; ?></li>
                                                    {{-- <li>176 Comments</li> --}}
                                                </ul>
                                                <h6 class="card_title_main"><a href="#"><?php echo $item['marathi_title']; ?></a>
                                                </h6>
                                                <p class="card_title"> <?php echo $item['marathi_description']; ?></p>
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
                                    <div class="col-md-3 col-sm-6 mt-4">
                                        <div class="news-box">
                                            <div class="new-thumb">
                                                {{-- <span class="cat c1">Fire</span> --}}
                                                <img src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $item['english_image'] }}"
                                                alt="{{ strip_tags($item['english_title']) }} Image" class="d-block w-100">
                                            </div>
                                            <div class="new-txt">
                                                <ul class="news-meta">
                                                    <li>
                                                        {{-- 05 MAY, 2023  --}}
                                                        <?php echo $item['disaster_date']; ?></li>
                                                    {{-- <li>176 Comments</li> --}}
                                                </ul>
                                                <h6 class="card_title_main"><a href="#"><?php echo $item['english_title']; ?>...</a>
                                                </h6>
                                                <p class="card_title"> <?php echo $item['english_description']; ?>...</p>
                                            </div>
                                            <div class="news-box-f"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Read more <a
                                                    data-id="{{ $item['id'] }}" class="show-btn"><i
                                                        class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <h4>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.NEWS_EVENTS.NO_DATA_FOUND_DISASTER_MANAGEMENT_NEWS') }}
                                    @else
                                        {{ Config::get('english.NEWS_EVENTS.NO_DATA_FOUND_DISASTER_MANAGEMENT_NEWS') }}
                                    @endif
                                </h4>
                            @endforelse
                            <form method="POST" action="{{ url('/new-paricular-data-web') }}" id="showform">
                                @csrf
                                <input type="hidden" name="show_id" id="show_id" value="">
                            </form>
                            <!--News Box End-->
                        </div>
                    </div>
                </section>
                <!--Main Content End-->
            @endsection
