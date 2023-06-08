@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Training Workshops</h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>
                <li>Upcoming Events And Trainings</li>
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
                            <h3> Upcoming Events And Trainings</h3>
                        </div>
                        <!--Event List Box Start-->
                        @foreach ($data_output as $item)
                            <div class="event-post-full d-flex">
                                @if (session('language') == 'mar')
                                    <div class="thumb"><img
                                            src="{{ asset('storage/training-event/event/' . $item['marathi_image']) }}"
                                            alt="<?php echo $item['marathi_title']; ?>"> </div>
                                    <div class="event-post-content">
                                        <div class="event-post-txt">
                                            <h5><a href="#"><?php echo $item['marathi_title']; ?></a></h5>
                                            <ul class="event-meta">
                                                <li><i class="fas fa-calendar-alt"></i> <?php echo $item['start_date']; ?></li>
                                            </ul>
                                            <p><?php echo $item['marathi_description']; ?></p>
                                        </div>
                                        {{--<div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando,
                                            USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>--}}
                                    </div>
                                @else
                                    <div class="thumb"> <img
                                            src="{{ asset('storage/images/training-event/event/' . $item['english_image']) }}"
                                            alt="<?php echo $item['english_title']; ?>"> </div>
                                    <div class="event-post-content">
                                        <div class="event-post-txt">
                                            <h5><a href="#"><?php echo $item['english_title']; ?></a></h5>
                                            <ul class="event-meta">
                                                <li><i class="fas fa-calendar-alt"></i> <?php echo $item['start_date']; ?></li>
                                            </ul>
                                            <p><?php echo $item['english_description']; ?></p>
                                        </div>
                                        {{--<div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando,
                                            USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>--}}
                                    </div>
                                @endif
                            </div>
                        @endforeach
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
