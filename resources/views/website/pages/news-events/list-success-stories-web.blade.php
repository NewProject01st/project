    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
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
            <!--Testimonials Start-->
            <section class="wf100 p75">
                <div class="container">
                    <div class="title-style-3 d-flex justify-content-center">
                        <h3>Success Stories</h3>
                    </div>
                    <div class="testimonials">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($data_output as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="single-item">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="profile">
                                                        <div class="img-area">
                                                            <img src="{{ asset('storage/images/news-events/success-stories/' . (session('language') == 'mar' ? $item['marathi_image'] : $item['english_image'])) }}" alt="">
                                                        </div>
                                                        <div class="bio">
                                                            <h2>{{ $item['english_title'] }}</h2>
                                                            <h4>{{ $item['english_designation'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="content">
                                                        <p><span><i class="fa fa-quote-left"></i></span>{{ session('language') == 'mar' ?  $item['english_description'] : $item['english_description'] }}</p>
                       

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon next_pre_testo_icon pre_testo_icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon next_pre_testo_icon next_testo_icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            
           
            {{-- <section class="testimonials-section wf100 p80 graybg">
                <h2 class="text-center">What People Says</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="h3testimonials" class="owl-carousel owl-theme">
                                <!--testimonials box start-->
                                @foreach ($data_output as $item)
                                    @if (session('language') == 'mar')
                                        <div class="item">
                                            <?php echo $item['marathi_description']; ?>
                                            <div class="tuser">
                                                <img src="{{ asset('storage/images/news-events/success-stories/' . $item['marathi_image']) }}"
                                                    class="d-block w-25">
                                                <strong><?php echo $item['marathi_title']; ?></strong><?php echo $item['marathi_designation']; ?>
                                            </div>
                                        </div>
                                    @else
                                        <div class="item">
                                            <?php echo $item['english_description']; ?>
                                            <div class="tuser">
                                                <img src="{{ asset('storage/images/news-events/success-stories/' . $item['english_image']) }}"
                                                    class="d-block w-25">
                                                <strong><?php echo $item['english_title']; ?></strong><?php echo $item['english_designation']; ?>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!--testimonials box End-->

                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!--Testimonials End-->
        </div>
        <!--Main Content End-->
    @endsection
