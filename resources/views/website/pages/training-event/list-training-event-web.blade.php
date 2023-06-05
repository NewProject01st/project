@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Training Workshops</h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>
                <li> Training Workshops </li>
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
                  <!--Event List Box Start-->
                  <div class="event-post-full d-flex">
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
                  </div>
                  <!--Event List Box End--> 
                   <!--Event List Box End--> 
                 </div>
               <div class="col-md-3 col-sm-4">
                  <div class="sidebar">
                     <!--Widget Start-->
                     <div class="widget">
                     <h4>About us</h4>
                        <div class="about-widget inner">
                           <img src="images/about-widget-img.jpg" alt="">
                           <p> On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment. </p>
                           <a href="#">More About us</a> 
                        </div>
                     </div>
                     <!--Widget End--> 
                     <!--Widget Start-->
                     <div class="widget">
                      <h4>Recent Posts</h4>
                        <div class="recent-posts inner">
                           <ul>
                              <li>
                                 <img src="images/rp1.jpg" alt=""> <strong>28 August, 2019</strong>
                                 <h6> <a href="#">Fake News may be worrisome, but the </a> </h6>
                              </li>
                              <li>
                                 <img src="images/rp2.jpg" alt=""> <strong>28 August, 2019</strong>
                                 <h6> <a href="#">Republic Faces Political Turmoil</a> </h6>
                              </li>
                              <li>
                                 <img src="images/rp3.jpg" alt=""> <strong>28 August, 2019</strong>
                                 <h6> <a href="#">Improve Police and Justice System</a> </h6>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!--Widget End--> 
                     <!--Widget Start-->
                     <div class="widget">
                     <h4>Categories</h4>
                        <div class="categories inner">
                           <ul>
                              <li><a href="#">Latest Updates</a></li>
                              <li><a href="#">Economical Stability</a></li>
                              <li><a href="#">Educational Institutes</a></li>
                              <li><a href="#">Speeches &amp; Videos</a></li>
                              <li><a href="#">Latest Updates</a></li>
                              <li><a href="#">Foreign Policies</a></li>
                           </ul>
                        </div>
                     </div>
                     <!--Widget End--> 
                     <!--Widget Start-->
                     <div class="widget">
                     <h4>Upcoming Events</h4>
                        <div class="upcoming-events inner">
                           
                           <ul>
                              <li>
                                 <div class="edate"> <strong>30</strong> Sep <span class="year">2019</span> </div>
                                 <h6> <a href="#">Violence against women</a> </h6>
                                 <span class="loc">150 / G iii, Newyork, USA</span> 
                              </li>
                              <li>
                                 <div class="edate"> <strong>30</strong> Sep <span class="year">2019</span> </div>
                                 <h6> <a href="#">New Year Cultural Festival</a> </h6>
                                 <span class="loc">150 / G iii, Newyork, USA</span> 
                              </li>
                              <li>
                                 <div class="edate"> <strong>30</strong> Sep <span class="year">2019</span> </div>
                                 <h6> <a href="#">Corner Meetings for
                                    Next Elections.</a> 
                                 </h6>
                                 <span class="loc">150 / G iii, Newyork, USA</span> 
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!--Widget End--> 
                     <!--Widget Start-->
                     <div class="widget">
                      <h4>Archives</h4>
                        <div class="archives inner">
                          
                           <ul>
                              <li><a href="#">May 2019</a></li>
                              <li><a href="#">April 2019</a></li>
                              <li><a href="#">March 2019</a></li>
                              <li><a href="#">February 2019</a></li>
                              <li><a href="#">January 2019</a></li>
                              <li><a href="#">March 2017</a></li>
                           </ul>
                        </div>
                     </div>
                     <!--Widget End--> 
                     
                     <!--Widget Start-->
                     <div class="widget">
                      <h4>Tags</h4>
                        <div class="tags-widget inner">
                          
                           <a href="#">Health</a> <a href="#">City News</a> <a href="#">Vote</a> <a href="#">Election</a> <a href="#">Democratic</a> <a href="#">Press</a> <a href="#">Campaign</a> 
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
