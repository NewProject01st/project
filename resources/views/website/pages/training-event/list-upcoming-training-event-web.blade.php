@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
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
                                    <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
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
                                    <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
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
                        <div class="sidebar">
                            <!--Widget Start-->
                            <div class="widget">
                                <h4>Upcoming Events</h4>
                                <div class="upcoming-events inner">
                                    <ul>
                                        <li>
                                            <div class="edate"> <strong>01</strong> July <span class="year">2023</span>
                                            </div>
                                            <h6> <a href="#">Maharashtra battles forest fires</a> </h6>
                                            <span class="loc">Maharashtra, India</span>
                                        </li>
                                        <li>
                                            <div class="edate"> <strong>03</strong> July <span class="year">2023</span>
                                            </div>
                                            <h6> <a href="#">Kerala floods displace thousands</a> </h6>
                                            <span class="loc">Maharashtra, India</span>
                                        </li>
                                        <li>
                                            <div class="edate"> <strong>06</strong> July <span class="year">2023</span>
                                            </div>
                                            <h6> <a href="#">Odisha prepares for Cyclone Yaas.</a>
                                            </h6>
                                            <span class="loc">Maharashtra, India</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Widget End-->
                            <!--Widget Start-->
                            <div class="widget">
                                <h4>Important Links</h4>
                                <div class="archives inner">
                                    <ul>
                                        <li><a href="#">Emergency Services</a></li>
                                        <li><a href="#">Environmental Conditions</a></li>
                                        <li><a href="#">Disaster Preparedness</a></li>
                                        <li><a href="#">Disaster Response</a></li>
                                        <li><a href="#">Disaster Recovery</a></li>
                                        <li><a href="#">Volunteer Opportunities</a></li>
                                        <li><a href="#">Donations and Aid</a></li>
                                        <li><a href="#">Local Resources</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Widget End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Events End-->
        </div>
    </div>
    </div>


@endsection
