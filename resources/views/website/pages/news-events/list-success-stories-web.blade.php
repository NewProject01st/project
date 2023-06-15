    @extends('website.layout.master')

    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>News & Events </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li> Success Stories </li>
                </ul>
            </div>
        </section>
        <!--Subheader End-->
        <!--Main Content Start-->
        <div class="main-content">
            <!--Success Start-->
            <section class="wf100 p75">
                <div class="container">
                    <h3 class="stitle text-center d-flex justify-content-start">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.SUCCESS_STORIES') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.SUCCESS_STORIES') }}
                        @endif
                    </h3>
                    <div class="testimonials">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @forelse ($data_output as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        @if (session('language') == 'mar')
                                            <div class="single-item">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="profile">
                                                            <div class="img-area">
                                                                <img src="{{ Config::get('DocumentConstant.SUCCESS_STORIES_VIEW') }}{{ $item['marathi_image'] }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="bio">
                                                                <h2>{{ $item['marathi_title'] }}</h2>
                                                                <h4>{{ $item['marathi_designation'] }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="content">
                                                            <p><span><i
                                                                        class="fa fa-quote-left"></i></span>{{ strip_tags($item['marathi_description']) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="single-item">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="profile">
                                                            <div class="img-area">
                                                                <img src="{{ Config::get('DocumentConstant.SUCCESS_STORIES_VIEW') }}{{ $item['english_image'] }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="new-txt">
                                                                <h4>{{ $item['english_title'] }}</h4>
                                                                <h6>{{ $item['english_designation'] }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="content">
                                                            <p><span><i
                                                                        class="fa fa-quote-left"></i></span>{{ strip_tags($item['english_description']) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <h4>No Data Found For Success Stories</h4>
                                @endforelse
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon next_pre_testo_icon pre_testo_icon"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon next_pre_testo_icon next_testo_icon"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!--Success End-->
        </div>
        <!--Main Content End-->
    @endsection
