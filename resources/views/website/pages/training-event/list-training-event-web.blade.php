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
                    <!--Event List Box Start-->
                    <div class="event-post-full">
                       <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="{{ asset('website_files/images/home/event-list4.jpg') }}" alt=""> </div>
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
                    <!--Event List Box Start-->
                    <div class="event-post-full">
                       <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="images/event-list2.jpg" alt=""> </div>
                       <div class="event-post-content">
                          <div class="event-post-txt">
                             <span class="ecat c1">Sports</span> 
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
                             <h5><a href="#">Motor Sports Event</a></h5>
                             <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 3-5 March, 2019</li>
                                <li><i class="far fa-clock"></i> 09:00am - 06:00pm</li>
                             </ul>
                             <p>Find out about your mental health and make a difference to everyday in your life.</p>
                          </div>
                          <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                       </div>
                    </div>
                    <!--Event List Box End--> 
                    <!--Event List Box Start-->
                    <div class="event-post-full">
                       <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="images/event-list3.jpg" alt=""> </div>
                       <div class="event-post-content">
                          <div class="event-post-txt">
                             <span class="ecat c1">Business</span> 
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
                             <h5><a href="#">Exhibition 2019 Program</a></h5>
                             <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 3-5 March, 2019</li>
                                <li><i class="far fa-clock"></i> 09:00am - 06:00pm</li>
                             </ul>
                             <p>Find out about your mental health and make a difference to everyday in your life.</p>
                          </div>
                          <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                       </div>
                    </div>
                    <!--Event List Box End--> 
                    <!--Event List Box Start-->
                    <div class="event-post-full">
                       <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="images/event-list4.jpg" alt=""> </div>
                       <div class="event-post-content">
                          <div class="event-post-txt">
                             <span class="ecat c1">Culture</span> 
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
                             <h5><a href="#">New Year Cultural Festival</a></h5>
                             <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 3-5 March, 2019</li>
                                <li><i class="far fa-clock"></i> 09:00am - 06:00pm</li>
                             </ul>
                             <p>Find out about your mental health and make a difference to everyday in your life.</p>
                          </div>
                          <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                       </div>
                    </div>
                    <!--Event List Box End--> 
                    <!--Event List Box Start-->
                    <div class="event-post-full">
                       <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="images/event-list5.jpg" alt=""> </div>
                       <div class="event-post-content">
                          <div class="event-post-txt">
                             <span class="ecat c1">Human Rights</span> 
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
                             <h5><a href="#">Violence against women</a></h5>
                             <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 3-5 March, 2019</li>
                                <li><i class="far fa-clock"></i> 09:00am - 06:00pm</li>
                             </ul>
                             <p>Find out about your mental health and make a difference to everyday in your life.</p>
                          </div>
                          <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                       </div>
                    </div>
                    <!--Event List Box End-->
                    <!--Event List Box Start-->
                    <div class="event-post-full">
                       <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="images/event-list1.jpg" alt=""> </div>
                       <div class="event-post-content">
                          <div class="event-post-txt">
                             <span class="ecat c1">Seminars</span> 
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
                    <!--Event List Box Start-->
                    <div class="event-post-full">
                       <div class="thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src="images/event-list2.jpg" alt=""> </div>
                       <div class="event-post-content">
                          <div class="event-post-txt">
                             <span class="ecat c1">Sports</span> 
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
                             <h5><a href="#">Motor Sports Event</a></h5>
                             <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 3-5 March, 2019</li>
                                <li><i class="far fa-clock"></i> 09:00am - 06:00pm</li>
                             </ul>
                             <p>Find out about your mental health and make a difference to everyday in your life.</p>
                          </div>
                          <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> Millenia Orlando, USA <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
                       </div>
                    </div>
                    <!--Event List Box End--> 
                    <div class="site-pagination">
                       <nav aria-label="Page navigation">
                          <ul class="pagination">
                             <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                             <li><a href="#">1</a></li>
                             <li><a href="#">2</a></li>
                             <li class="active"><a href="#">3</a></li>
                             <li><a href="#">4</a></li>
                             <li><a href="#">5</a></li>
                             <li> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
                          </ul>
                       </nav>
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
     <!--Footer Start-->
     <footer class="home3 main-footer wf100">
        <div class="container">
           <div class="row">
              <!--Footer Widget Start-->
              <div class="col-md-3 col-sm-6">
                 <div class="textwidget">
                    <img src="images/footer-logo2.png" alt="">
                    <address>
                       <ul>
                          <li> <i class="fas fa-university"></i> <strong>Council Address:</strong> Block H, Cosmo Avenue, #201
                             New York, USA 
                          </li>
                          <li> <i class="fas fa-envelope"></i> <strong>Email:</strong> contact@balad.com
                             info@balad.com 
                          </li>
                          <li> <i class="fas fa-phone"></i> <strong>Call us:</strong> (0800) 009876
                             +12 6547 0987 
                          </li>
                       </ul>
                    </address>
                 </div>
              </div>
              <!--Footer Widget End--> 
              <!--Footer Widget Start-->
              <div class="col-md-3 col-sm-6">
                 <div class="footer-widget">
                    <h6>Govt. Departments</h6>
                    <ul>
                       <li><a href="#"><i class="fas fa-star"></i> Agriculture & Food</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Employment Affairs</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Housing & Planning</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Education and Skills</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Health & Security</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Laws & Justice</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Roads & Transport</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Climate & Environment</a></li>
                    </ul>
                 </div>
              </div>
              <!--Footer Widget End--> 
              <!--Footer Widget Start-->
              <div class="col-md-3 col-sm-6">
                 <div class="footer-widget">
                    <h6>Explore City Highlights</h6>
                    <ul>
                       <li><a href="#"><i class="fas fa-star"></i> City Culture & Heritage</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> City Events</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Jobs & Careers</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Donations</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Become a Volunteer</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Tourism Map</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Food & Restaurants</a></li>
                       <li><a href="#"><i class="fas fa-star"></i> Nightlife Entertainments</a></li>
                    </ul>
                 </div>
              </div>
              <!--Footer Widget End--> 
              <!--Footer Widget Start-->
              <div class="col-md-3 col-sm-6">
                 <div class="twitter-widget">
                    <div class="tw-txt">
                       <h6>@john.flintoff</h6>
                       <a href="#" class="reply-tw"><i class="fas fa-reply"></i></a>
                       <p> The Hightst Glory of the Citizen’s revolution was this; it connected in one indissoluble bond the principles of civil govt. with humanity principles. </p>
                    </div>
                    <div class="tw-footer"> @Balad.gov <strong>3 November, 2019</strong> <i class="fab fa-twitter"></i> </div>
                 </div>
              </div>
              <!--Footer Widget End--> 
           </div>
        </div>
     </footer>
     <!--Footer Start--> 
     <!--Footer Start-->
     <footer class="home3 footer wf100">
        <div class="container">
           <div class="row">
              <div class="col-md-7 col-sm-7">
                 <p class="copyr">Balad  Rights Reserved © 2019, By: <a href="#">Gramotech</a></p>
              </div>
              <div class="col-md-5 col-sm-5">
                 <ul class="footer-social">
                    <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="insta"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#" class="yt"><i class="fab fa-youtube"></i></a></li>
                 </ul>
              </div>
           </div>
        </div>
     </footer>
     <!--Footer End--> 
     </div>



























    <!--Main Content Start-->
    <div class="main-content p60">
        <!--Department Details Page Start-->
        <div class="department-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!--Department Details Txt Start-->
                        @foreach ($data_output as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $item['marathi_title']; ?> : </h3>
                                    <img src="{{ asset('storage/images/policies-legislation/district-plan/' . $item['marathi_image']) }}"
                                class="d-block w-100" alt="...">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> : </h3>
                                    <img src="{{ asset('storage/images/policies-legislation/district-plan/' . $item['english_image']) }}"
                                class="d-block w-100" alt="...">
                                    <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                @endif
                            </div>
                        @endforeach

                        <!--Department Details Txt End-->
                    </div>
                    <!--Sidebar Start-->
                    <div class="col-md-3">
                        <div class="sidebar">
                            <!--Widget Start-->
                            <div class="widget">
                                <h4>Upcoming Events</h4>
                                <div class="upcoming-events inner">
                                    <ul>
                                        <li>
                                            <div class="edate"> <strong>01</strong> May <span
                                                    class="year">2023</span> </div>
                                            <h6> <a href="#">Maharashtra battles forest fires</a> </h6>
                                            <span class="loc">Maharashtra, India</span>
                                        </li>
                                        <li>
                                            <div class="edate"> <strong>03</strong> May <span
                                                    class="year">2023</span> </div>
                                            <h6> <a href="#">Kerala floods displace thousands</a> </h6>
                                            <span class="loc">Maharashtra, India</span>
                                        </li>
                                        <li>
                                            <div class="edate"> <strong>06</strong> May <span
                                                    class="year">2023</span> </div>
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
                    <!--Sidebar End-->
                </div>
            </div>
        </div>
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
