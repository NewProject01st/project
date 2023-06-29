@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.TRAINING_WORKSHOP.TRAINING_WORKSHOP_HEADING') }}
                @else
                    {{ Config::get('english.TRAINING_WORKSHOP.TRAINING_WORKSHOP_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('list-past-training-event-web') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.TRAINING_WORKSHOP.TRAINING_WORKSHOP_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.TRAINING_WORKSHOP.TRAINING_WORKSHOP_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.TRAINING_WORKSHOP.TRAINING_WORKSHOP_SUB_LINK2') }}
                    @else
                        {{ Config::get('english.TRAINING_WORKSHOP.TRAINING_WORKSHOP_SUB_LINK2') }}
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!--Subheader End-->

    <!--Main Content Start-->
    <div class="main-content">
        <!--Events Start-->
        <div class="events-wrapper events-listing">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div class="title-style-3">
                            <h3>
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.HOME_PAGE.PAST_EVENTS_TRAINING') }}
                                @else
                                    {{ Config::get('english.HOME_PAGE.PAST_EVENTS_TRAINING') }}
                                @endif
                            </h3>
                        </div>
                        <!--Event List Box Start-->
                        @forelse ($data_output as $item)
                            <div class="event-post-full d-flex">
                                @if (session('language') == 'mar')
                                    <div class="thumb"><img
                                            src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $item['marathi_image'] }}"
                                            alt="{{ strip_tags($item['marathi_title']) }} प्रतिमा"> </div>
                                    <div class="event-post-content">
                                        <div class="event-post-txt">
                                            <h5><a data-id="{{ $item['id'] }}" class="show-btn"><?php echo $item['marathi_title']; ?></a></h5>
                                            <ul class="event-meta">
                                                <li><i class="fas fa-calendar-alt"></i> <?php echo $item['start_date']; ?></li>
                                            </ul>
                                            <p><?php echo $item['marathi_description']; ?></p>
                                        </div>
                                        {{-- <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando,
                                            USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div> --}}
                                    </div>
                                @else
                                    <div class="thumb"><img
                                            src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $item['english_image'] }}"
                                            alt="{{ strip_tags($item['english_title']) }} Image"> </div>
                                    <div class="event-post-content">
                                        <div class="event-post-txt">
                                            <h5><a data-id="{{ $item['id'] }}" class="show-btn"><?php echo $item['english_title']; ?></a></h5>
                                            <ul class="event-meta">
                                                <li><i class="far fa-calendar-alt"></i> <?php echo $item['start_date']; ?></li>
                                            </ul>
                                            <p><?php echo $item['english_description']; ?></p>
                                        </div>
                                        {{-- <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando,
                                            USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div> --}}
                                    </div>
                                @endif
                            </div>
                        @empty
                            <h4>No Data Found For Past Events And Trainings</h4>
                        @endforelse
                        <!--Event List Box End-->
                        <form method="POST" action="{{ url('/list-particular-event') }}" id="showform">
                            @csrf
                            <input type="hidden" name="show_id" id="show_id" value="">
                        </form>

                        <!--Event List Box Start-->

                        {{-- <div class="event-post-full d-flex">
                     <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="{{ asset('website_files/images/home/event.jpg') }}"  alt="..."> </div>
                     <div class="event-post-content">
                        <div class="event-post-txt">
                           <span class="ecat c1">Medical Event</span> 
                           <!--Share Start-->
                           <div class="btn-group share-post">
                              <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i> Share </button>
                              <ul class="dropdown-menu">
                                 <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                 <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                 <li><a href="#" class="insta"><i class="fab fa-instagram"></i></a></li>
                                 <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                 <li><a href="#" class="yt"><i class="fab fa-youtube"></i></a></li>
                              </ul>
                           </div>
                           <!--Share End-->
                           <h5><a href="#">Social Awareness Seminar</a></h5>
                           <ul class="event-meta">
                              <li><i class="far fa-calendar-alt"></i> 3-5 March, 2019</li>
                              <li><i class="far fa-clock"></i> 09:00am - 06:00pm</li>
                           </ul>
                           <p>Find out about your mental health and make a difference to everyday in your life massa aliquam suscipit.</p>
                        </div>
                        <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                     </div>
                  </div> --}}
                        <!--Event List Box End-->
                        <!--Event List Box End-->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        @include('website.pages.training-event.upcoming-events')
                    </div>
                </div>
            </div>
            <!--Events End-->
        </div>
    </div>
    </div>
@endsection
