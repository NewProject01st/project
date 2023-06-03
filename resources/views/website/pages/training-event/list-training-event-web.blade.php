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

      <div class="main-content">
        <!--Events Start-->
         <div class="events-wrapper events-listing">
            <div class="container">
               <div class="row">
                  <div class="col-md-9 col-sm-8">

                     <div class="card">
                        <div class="row g-0">
                           <div class="col-sm-5 position-relative new_img_ho">
                           <a class="lightbox" href="#"><img src="{{ asset('website_files/images/home/event.jpg') }}" class="card-img fit-cover w-100 h-100" alt="...">
                           </a>
                           </div>

                           <div class="col-sm-7">
                           <div class="card-body card_h_set">
                              <span class="badge rounded-pill bg-dark mb-4">Event</span>
                              <h5 class="card-title mb-3">
                                 <a class="link-dark text-decoration-none" href="#" target="_blank">Event Title</a>
                              </h5>

                                 <ul class="event-meta">
                                    <li><i class="fas fa-calendar-alt"></i> 3-5 March, 2019</li>
                                    <li><i class="fas fa-clock"></i> 09:00am - 06:00pm</li>
                                 </ul>

                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                           </div>

                           <div class="card-footer text-end text-muted">
                              Last updated today.
                           </div>
                           </div>
                        </div>
                     </div>

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
     <!--Main Content End--> 
     

   </div>


@endsection
