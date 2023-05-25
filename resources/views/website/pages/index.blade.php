@extends('website.layout.master')
@section('content')
    <div class="main-content">
        <style>

        </style>
        {{-- Start Marquee --}}
        {{-- <section class="marquee-main">
            <div class="container">
                <?php //print_r($data_output_marquee);
                //die();
                ?>
                <div class="deprt-txt">
                    @if (session('language') == 'mar')
                        <marquee class="marquee-scroll" behavior="scroll" direction="left" scrollamount="10">
                            <span class="d-flex" target="_blank"><?php //echo $data_output_marquee;
                            ?></span>
                        </marquee>
                    @else
                        <marquee class="marquee-scroll" behavior="scroll" direction="left" scrollamount="10">
                            <span class="d-flex">
                                <a href="{{ $data_output_marquee->url }}" class="con"
                                            target="_blank">
                                <?php //echo $data_output_marquee;
                                ?>
                                </a>
                            </span>
                        </marquee>
                    @endif
                </div>
            </div>
        </section> --}}
        <section class="marquee-main">
            <div class="container">
                @foreach ($data_output_marquee as $item)
                    @if (session('language') == 'mar')
                        <marquee class="marquee-scroll" behavior="scroll" direction="left" scrollamount="10">
                            <span class="d-flex" target="_blank"><?php echo $item['marathi_title']; ?></span>
                        </marquee>
                    @else
                        <div class="maindiv">
                            <div class="div1">
                                <a href="{{ $item['url'] }}" target="_blank">
                                    &nbsp;<?php echo $item['english_title']; ?>
                                </a>

                            </div>
                    @endif
                @endforeach
            </div>
        </section>
        {{-- End Marquee --}}
        @include('website.layout.crouseler')
        {{-- Start Disaster Management --}}
        <section class="Mayor-video-msg">
            <div class="container">
                @foreach ($data_output_disastermangwebportal as $item)
                    @if (session('language') == 'mar')
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="city-tour gallery"> <strong> Disaster Management Head </strong>
                                    <img src="{{ asset('storage/images/disaster-webportal/' . $item['marathi_image']) }}"
                                        class="d-block w-100">
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
                                <div class="city-tour gallery"> <strong> Disaster Management Head </strong>
                                    <img src="{{ asset('storage/images/disaster-webportal/' . $item['english_image']) }}"
                                        class="d-block w-100">
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
                    <h3>Be Updated with Disaster Management News</h3>
                    <p>Read the News Updates and Articles from Government </p>
                </div>
                <div class="row d-flex flex-wrap">
                    
                    @foreach ($data_output_disastermanagementnews as $item)
                        @if (session('language') == 'mar')
                            <div class="col-md-3 col-sm-6">
                                <div class="news-box">
                                    {{-- <div class="new-thumb"> <span class="cat c1">Fire</span> --}}
                                    <img src="{{ asset('storage/images/disaster-news/' . $item['marathi_image']) }}"
                                        class="d-block w-100">
                                </div>
                                <div class="new-txt">
                                    <ul class="news-meta">
                                        <li>
                                            {{-- 05 MAY, 2023  --}}
                                            <?php echo $item['disaster_date']; ?></li>
                                        {{-- <li>176 Comments</li> --}}
                                    </ul>
                                    <h6><a href="#"><?php echo $item['marathi_title']; ?></a></h6>
                                    <p> <?php echo $item['marathi_description']; ?></p>
                                </div>
                                <div class="news-box-f"> <img src="{{ asset('website_files/images/home/tuser1.jpg') }}"
                                    alt=""> Read more <a data-id="{{ $item['id'] }}" class="show-btn"><i class="fas fa-arrow-right"></i></a>
                            </div>
                            </div>
                           </div>
                        @else                        
                        <div class="col-md-3 col-sm-6 mt-4">
                            <div class="news-box">
                                <div class="new-thumb">
                                    {{-- <span class="cat c1">Fire</span> --}}
                                    <img src="{{ asset('storage/images/disaster-news/' . $item['english_image']) }}"
                                        class="d-block w-100">
                                </div>
                                <div class="new-txt">
                                    <ul class="news-meta">
                                        <li>
                                            {{-- 05 MAY, 2023  --}}
                                            <?php echo $item['disaster_date']; ?></li>
                                        {{-- <li>176 Comments</li> --}}
                                    </ul>
                                    <h6><a href="#"><?php echo $item['english_title']; ?></a></h6>
                                    <p> <?php echo $item['english_description']; ?></p>
                                </div>
                                <div class="news-box-f"> <img src="{{ asset('website_files/images/home/tuser1.jpg') }}"
                                    alt=""> Read more <a data-id="{{ $item['id'] }}" class="show-btn"><i class="fas fa-arrow-right"></i></a>
                            </div>
                            </div>
                        </div>
                      @endif
                @endforeach
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
                        <h3>Departments & Information Desk</h3>
                        <p>Read the News Updates and Articles about Disaster Management </p>
                    </div>
                    <div class="row">
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon1.png') }}"
                                    alt="">
                                <h6> <a href="#">Emergency Department</a> </h6>
                                <a class="rm" href="#">Read More</a>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon2.png') }}"
                                    alt="">
                                <h6> <a href="#">Public Health Department</a> </h6>
                                <a class="rm" href="#">Read More</a>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon3.png') }}"
                                    alt="">
                                <h6> <a href="#">Information Desk/Hotline</a> </h6>
                                <a class="rm" href="#">Read More</a>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon4.png') }}"
                                    alt="">
                                <h6> <a href="#">Police Department </a> </h6>
                                <a class="rm" href="#">Read More</a>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img
                                    src="{{ asset('website_files/images/home/deprticon5.png') }}" alt="">
                                <h6> <a href="#">National Guard </a> </h6>
                                <a class="rm" href="#">Read More</a>
                            </div>
                        </div>
                        <!--Icon Box End-->
                        <!--Icon Box Start-->
                        <div class="col-md-4 col-sm-4">
                            <div class="deprt-icon-box"> <img
                                    src="{{ asset('website_files/images/home/deprticon6.png') }}" alt="">
                                <h6> <a href="#">Fire Department</a> </h6>
                                <a class="rm" href="#">Read More</a>
                            </div>
                        </div>
                        <!--Icon Box End-->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="emergency-info">
                        <h5>Helplines &
                            Emergency
                            Services </h5>
                        {{-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!--Panel Start-->
                                @foreach ($data_output_emergencycontact as $item)
                                    @if (session('language') == 'mar')
                                        <div class="panel">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h6> <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne"> <?php echo $item['marathi_title']; ?> </a> </h6>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                                aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li> <i class="fas fa-user-tie"></i> <?php echo $item['marathi_name']; ?> </li>
                                                        <li> <i class="far fa-building"></i> <?php echo $item['marathi_address']; ?> </li>
                                                        <li> <i class="fas fa-phone"></i> <?php echo $item['marathi_number']; ?></li>
                                                        <li> <i class="fas fa-fax"></i> <?php echo $item['marathi_landline_no']; ?> </li>
                                                        <li> <i class="far fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="panel">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h6> <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne"> <?php echo $item['english_title']; ?> </a> </h6>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                                aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li> <i class="fas fa-user-tie"></i> <?php echo $item['english_name']; ?> </li>
                                                        <li> <i class="far fa-building"></i> <?php echo $item['english_address']; ?> </li>
                                                        <li> <i class="fas fa-phone"></i> <?php echo $item['english_number']; ?></li>
                                                        <li> <i class="fas fa-fax"></i> <?php echo $item['english_landline_no']; ?> </li>
                                                        <li> <i class="far fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!--Panel End-->

                            </div> --}}

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!--Panel Start-->
                            @foreach ($data_output_emergencycontact as $index => $item)
                                @if (session('language') == 'mar')
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                            <h6> <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapse{{ $index }}" aria-expanded="true"
                                                    aria-controls="collapse{{ $index }}"> <?php echo $item['marathi_title']; ?> </a>
                                            </h6>
                                        </div>
                                        <div id="collapse{{ $index }}" class="panel-collapse collapse"
                                            role="tabpanel" aria-labelledby="heading{{ $index }}">
                                            <div class="panel-body">
                                                <ul>
                                                    <li> <i class="fas fa-user-tie"></i> <?php echo $item['marathi_name']; ?> </li>
                                                    <li> <i class="far fa-building"></i> <?php echo $item['marathi_address']; ?> </li>
                                                    <li> <i class="fas fa-phone"></i> <?php echo $item['marathi_number']; ?></li>
                                                    <li> <i class="fas fa-fax"></i> <?php echo $item['marathi_landline_no']; ?> </li>
                                                    <li> <i class="far fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id="heading{{ $index }}">
                                            <h6> <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapse{{ $index }}" aria-expanded="true"
                                                    aria-controls="collapse{{ $index }}"> <?php echo $item['english_title']; ?> </a>
                                            </h6>
                                        </div>
                                        <div id="collapse{{ $index }}" class="panel-collapse collapse"
                                            role="tabpanel" aria-labelledby="heading{{ $index }}">
                                            <div class="panel-body">
                                                <ul>
                                                    <li> <i class="fas fa-user-tie"></i> <?php echo $item['english_name']; ?> </li>
                                                    <li> <i class="far fa-building"></i> <?php echo $item['english_address']; ?> </li>
                                                    <li> <i class="fas fa-phone"></i> <?php echo $item['english_number']; ?></li>
                                                    <li> <i class="fas fa-fax"></i> <?php echo $item['english_landline_no']; ?> </li>
                                                    <li> <i class="far fa-envelope"></i> <?php echo $item['email']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <!--Panel End-->
                        </div>

                    </div>
                    <a href="#" class="jobs-link">Open Vacancies</a>
                    {{-- <ul class="reports">
                            <li> <a href="#"><i class="fas fa-file-alt"></i> 2023 Economy Report</a> </li>
                            <li> <a href="#"><i class="fas fa-file-alt"></i> 30 Days Plans of Govt.</a> </li>
                            <li> <a href="#"><i class="fas fa-file-alt"></i> Court Case about TAX</a> </li>
                        </ul> --}}
                </div>
            </div>
        </div>
    </section>
    <!--Departments & Information Desk End-->

    <!--Recent Events Start-->
    {{-- <section class="wf100 p75 recent-events">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h3>Recent Events</h3>
                        <div class="recent-event-block">
                            <!--Slider Big Slider Start-->
                            <div class="recent-event-slider">
                                <div class="event-big">
                                    <div class="event-cap">
                                        <h5><a href="#">2K23 Disaster Risk Reduction</a></h5>
                                        <ul>
                                            <li><i class="fas fa-image"></i> 83 Photos</li>
                                            <li><i class="fas fa-play-circle"></i> 16 Videos</li>
                                        </ul>
                                        <p> The National Disaster Management Authority (NDMA), headed by the Prime Minister
                                            of India, is the apex body for Disaster Management in India. </p>
                                    </div>
                                    <img src="{{ asset('website_files/images/home/e1.jpeg') }}" alt="">
                                </div>
                                <!-- <div class="event-big">
                                                      <div class="event-cap">
                                                        <h5><a href="#">Ohio Stormwater Conference</a></h5>
                                                        <ul>
                                                          <li><i class="fas fa-image"></i> 83 Photos</li>
                                                          <li><i class="fas fa-play-circle"></i> 16 Videos</li>
                                                        </ul>
                                                        <p> The conference has grown from 399 attendees to over 1,000 in the past 15 years. </p>
                                                      </div>
                                                      <img src="{{ asset('website_files/images/home/e2.jpeg') }}" alt=""> </div> -->
                                <!-- <div class="event-big">
                                                      <div class="event-cap">
                                                        <h5><a href="#">Governors Hurricane Conference</a></h5>
                                                        <ul>
                                                          <li><i class="fas fa-image"></i> 83 Photos</li>
                                                          <li><i class="fas fa-play-circle"></i> 16 Videos</li>
                                                        </ul>
                                                        <p> It was a good event, one particular program was overcrowded. A better plan for this presentation could have made a better situation. </p>
                                                      </div>
                                                      <img src="{{ asset('website_files/images/home/e4.jpeg') }}" alt=""> </div> -->
                                <!-- <div class="event-big">
                                                      <div class="event-cap">
                                                        <h5><a href="#">2K23 Conference</a></h5>
                                                        <ul>
                                                          <li><i class="fas fa-image"></i> 83 Photos</li>
                                                          <li><i class="fas fa-play-circle"></i> 16 Videos</li>
                                                        </ul>
                                                        <p> The conference has grown from 399 attendees to over 1,000 in the past 15 years. </p>
                                                      </div>
                                                      <img src="{{ asset('website_files/images/home/e5.jpeg') }}" alt=""> </div> -->
                            </div>
                            <!--Slider Big Slider End-->
                            <!--Slider Big Slider Nav-->
                            <div class="recent-event-slider-nav">
                                <div><img src="{{ asset('website_files/images/home/e0.jpeg') }}" alt=""></div>
                                <div><img src="{{ asset('website_files/images/home/e02.jpeg') }}" alt=""></div>
                                <div><img src="{{ asset('website_files/images/home/e04.jpeg') }}" alt=""></div>
                                <div><img src="{{ asset('website_files/images/home/05.jpeg') }}" alt=""></div>
                            </div>
                            <!--Slider Big Slider Nav-->
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h3>Upcoming Schedules</h3>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Events" aria-controls="Events"
                                    role="tab" data-toggle="tab">Next Events</a></li>
                            <li role="presentation"><a href="#Meetings" aria-controls="Meetings" role="tab"
                                    data-toggle="tab">Meetings</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="Events">
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/chart.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Annual Cycling 2023 for Charity Donation</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/chart.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Cultural Festival & Concert at New Year</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/chart.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Seminar on Child Labour held in next month</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/chart.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Protest against women rights violence</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="Meetings">
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/meeting.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Seminar on Child Labour held in next month</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/meeting.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Cultural Festival & Concert at New Year</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/meeting.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Annual Cycling 2023 for Charity Donation</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                                <!--Event List Start-->
                                <ul class="event-list">
                                    <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00
                                            pm</strong> </li>
                                    <li><img src="images/meeting.jpeg" alt=""></li>
                                    <li class="el-title">
                                        <h6><a href="#">Protest against women rights violence</a></h6>
                                        <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                                    </li>
                                    <li> <a href="#" class="joinnow">Join Now</a> </li>
                                </ul>
                                <!--Event List End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    <!--Recent Events End-->

    <!-- Explore Community Start-->
    {{-- <section class="wf100 p80 explore-community">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>DMS Sub-Departments</h3>
                        <ul class="community-links-style-two">
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Emergency Management </a> </li>
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Public Health </a> </li>
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Transportation </a> </li>
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Communications </a> </li>
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Infrastructure </a> </li>
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Law Enforcement </a> </li>
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Administration </a> </li>
                            <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}"
                                        alt=""> Volunteer Management </a> </li>
                            <!-- <li> <a href="#"> <img src="images/excomm-icon9.png" alt=""> City Council </a> </li>
                                                  <li> <a href="#"> <img src="images/excomm-icon10.png" alt=""> Important Numbers </a> </li> -->
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Meet Officials</h3>
                        <!--Team Slider Start-->

                        <!--Team Slider End-->
                    </div>
                </div>
            </div>
        </section> --}}
    <!-- Explore Community End-->
    {{-- 
        <section class="wf100 home3 emergency-numbers">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-5">
                        <div class="newsletter-form">
                            <h5>Be Updated with us</h5>
                            <ul class="row">
                                <li class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </li>
                                <li class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Email Address">
                                </li>
                                <li class="col-md-6">
                                    <p>Signup to get the updates on email from the disaster management!</p>
                                </li>
                                <li class="col-md-6">
                                    <button>Subscribe</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7">
                        <div class="e-numbers">
                            <h5>Emergency Numbers</h5>
                            <p>Dial these numbers in case of any emergency</p>
                            <div class="info-num"> <strong>For any Information</strong>
                                <h3>(00)00 0000</h3>
                            </div>
                            <ul class="row">
                                <li class="col-md-4 col-sm-4">
                                    <div class="em-box"> <i class="fas fa-user-secret"></i> <strong
                                            class="em-num">100</strong> <strong class="em-deprt">Police
                                            Department</strong> </div>
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <div class="em-box"> <i class="fas fa-ambulance"></i> <strong
                                            class="em-num">108</strong> <strong class="em-deprt"> Ambulance
                                            Services</strong> </div>
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <div class="em-box"> <i class="fas fa-fire-extinguisher"></i> <strong
                                            class="em-num">101</strong> <strong class="em-deprt">Fire Brigade
                                            Department</strong> </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}





    </div>
    <script>
        $('.maindiv ').width($('.div1').width());
    </script>
    {{-- <script>
        $(".marquee-scroll span p a").each(function() { // use $.each to loop through all a tags inside div
            $(this).attr("target", "_blank"); // use .attr() to add attribute
        });
    </script> --}}
@endsection
{{-- @extends('website.layout.navbar')
@extends('website.layout.header') --}}
