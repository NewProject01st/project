@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Training Workshops</h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>
                <li>Past Events And Trainings</li>
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
                     <h3> Past Events And Trainings</h3>
                  </div>
                  <!--Event List Box Start-->
                  @foreach ($data_output as $item)
                  <div class="event-post-full d-flex">
                     @if (session('language') == 'mar')
                     <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="{{ asset('storage/training-event/event/' . $item['marathi_image']) }}" alt="<?php echo $item['marathi_title']; ?>"> </div>
                     <div class="event-post-content">
                        <div class="event-post-txt">
                           <h5><a href="#"><?php echo $item['marathi_title']; ?></a></h5>
                           <ul class="event-meta">
                              <li><i class="far fa-calendar-alt"></i> <?php echo $item['start_date']; ?></li>
                           </ul>
                           <p><?php echo $item['marathi_description']; ?></p>
                        </div>
                        <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                     </div>
                     @else
                     <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="{{ asset('storage/images/training-event/event/' . $item['english_image']) }}" alt="<?php echo $item['english_title']; ?>"> </div>
                     <div class="event-post-content">
                        <div class="event-post-txt">
                           <h5><a href="#"><?php echo $item['english_title']; ?></a></h5>
                           <ul class="event-meta">
                              <li><i class="far fa-calendar-alt"></i> <?php echo $item['start_date']; ?></li>
                           </ul>
                           <p><?php echo $item['english_description']; ?></p>
                        </div>
                        <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                     </div>
                     @endif
                  </div>
                  @endforeach
                  <!--Event List Box End--> 


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
                  @include('website.pages.recent-posts')
            </div>
         </div>
      </div>
      <!--Events End--> 
   </div>
     </div>
   </div>


@endsection
