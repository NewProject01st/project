    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>About Us </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li>Disaster Management Portal </li>
                </ul>
            </div>
        </section>
        <!--Subheader End-->
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
                                        <img src="{{ asset('storage/images/aboutus/disaster-management-portal/' . $item['marathi_image']) }}"
                                    class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    @else
                                        <h3><?php echo $item['english_title']; ?> : </h3>
                                        <img src="{{ asset('storage/images/aboutus/disaster-management-portal/' . $item['english_image']) }}"
                                    class="d-block w-100" alt="...">
                                        <p style="text-align: justify;" class="mt-p2"> <?php echo $item['english_description']; ?></p>
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

    <section>
        <div class="container">
            <h1 class="testimonial_section_header">Client Review <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></h1>
            <div class="testimonials">
                
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="single-item">
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="profile">
                                      <div class="img-area">
                                          <img src="{{ asset('website_files/images/home/head.png') }}" alt="">
                                      </div>
                                      <div class="bio">
                                          <h2>Dave Wood</h2>
                                          <h4>Web Developer</h4>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="content">
                                      <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel a eius excepturi molestias commodi aliquam error magnam consectetur laboriosam numquam, minima eveniet nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi consequatur molestiae voluptatum!</p>
                                      <p class="socials">
                                          <i class="fa fa-twitter"></i>
                                          <i class="fa fa-behance"></i>
                                          <i class="fa fa-pinterest"></i>
                                          <i class="fa fa-dribbble"></i>
                                          <i class="fa fa-vimeo"></i>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="single-item">
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="profile">
                                      <div class="img-area">
                                          <img src="{{ asset('website_files/images/home/head.png') }}" alt="">
                                      </div>
                                      <div class="bio">
                                          <h2>Martin Guptill</h2>
                                          <h4>UI/UX Designer</h4>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="content">
                                      <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel a eius excepturi molestias commodi aliquam error magnam consectetur laboriosam numquam, minima eveniet nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi consequatur molestiae voluptatum!</p>
                                      <p class="socials">
                                          <i class="fa fa-twitter"></i>
                                          <i class="fa fa-behance"></i>
                                          <i class="fa fa-pinterest"></i>
                                          <i class="fa fa-dribbble"></i>
                                          <i class="fa fa-vimeo"></i>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="single-item">
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="profile">
                                      <div class="img-area">
                                          <img src="{{ asset('website_files/images/home/head.png') }}" alt="">
                                      </div>
                                      <div class="bio">
                                          <h2>Stephen Jones</h2>
                                          <h4>Graphic Designer</h4>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="content">
                                      <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel a eius excepturi molestias commodi aliquam error magnam consectetur laboriosam numquam, minima eveniet nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi consequatur molestiae voluptatum!</p>
                                      <p class="socials">
                                          <i class="fa fa-twitter"></i>
                                          <i class="fa fa-behance"></i>
                                          <i class="fa fa-pinterest"></i>
                                          <i class="fa fa-dribbble"></i>
                                          <i class="fa fa-vimeo"></i>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
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

    <main class="main">
  <div class="container gallery_container">
    <div class="card">
      <div class="card-image">
        <a href="{{ asset('website_files/images/home/slide1.jpeg') }}" data-fancybox="gallery" data-caption="Caption Images 1">
          <img src="{{ asset('website_files/images/home/slide1.jpeg') }}" alt="Image Gallery">
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-image">
        <a href="{{ asset('website_files/images/home/slide2.jpeg') }}" data-fancybox="gallery" data-caption="Caption Images 1">
          <img src="{{ asset('website_files/images/home/slide2.jpeg') }}" alt="Image Gallery">
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-image">
        <a href="{{ asset('website_files/images/home/slide3.jpeg') }}" data-fancybox="gallery" data-caption="Caption Images 1">
          <img src="{{ asset('website_files/images/home/slide3.jpeg') }}" alt="Image Gallery">
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-image">
        <a href="{{ asset('website_files/images/home/slide2.jpeg') }}" data-fancybox="gallery" data-caption="Caption Images 1">
          <img src="{{ asset('website_files/images/home/slide2.jpeg') }}" alt="Image Gallery">
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-image">
        <a href="{{ asset('website_files/images/home/slide3.jpeg') }}" data-fancybox="gallery" data-caption="Caption Images 1">
          <img src="{{ asset('website_files/images/home/slide3.jpeg') }}" alt="Image Gallery">
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-image">
        <a href="{{ asset('website_files/images/home/slide1.jpeg') }}" data-fancybox="gallery" data-caption="Caption Images 1">
          <img src="{{ asset('website_files/images/home/slide1.jpeg') }}" alt="Image Gallery">
        </a>
      </div>
    </div>
    
    </div>
  </div>
</main>

<div class="container photo_g">
  <div class="row">
    <div class="col-12">
    <meta name="viewport" content="width=device-width">
  <input type="radio" name="filter" id="all" checked><label for="all">All</label>
  <input type="radio" name="filter" id="animals"><label for="animals">Animals</label>
  <input type="radio" name="filter" id="nature"><label for="nature">Nature</label>
  <input type="radio" name="filter" id="people"><label for="people">People</label>
  <input type="radio" name="filter" id="tech"><label for="tech">Tech</label>
  <div class="gallery">
    <figure class="card tech">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/0/300" alt="">
    </figure>
    <figure class="card nature">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/10/300" alt="">
    </figure>
    <figure class="card animals">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/1003/300" alt="">
    </figure>
    <figure class="card people">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/1005/300" alt="">
    </figure>
    <figure class="card nature">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/218/300" alt="">
    </figure>
    <figure class="card people">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/1012/300" alt="">
    </figure>
    <figure class="card animals">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/1020/300" alt="">
    </figure>
    <figure class="card people">
      <img class="card__image" loading="lazy" src="https://picsum.photos/id/1027/300" alt="">
    </figure>
   
    </div>


    </div>
  </div>
</div>



<script>
    // Fancybox Configuration
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});

</script>


    @endsection
