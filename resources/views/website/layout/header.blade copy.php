<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        My Website
    </title>

    <?php 
    $metadata = App\Http\Repository\MetadataRepository::getAll();
     ?>
   
     <meta name="english_name" content="{{ $metadata->english_name}}">
     
     <meta name="keywords" content="{{ $metadata->keywords}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="{{ asset('website_files/bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/custom.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('website_files/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/bootstrap.js') }}"></script>
    <script src="{{ asset('website_files/ajax/libs/jquery/1.12.2/jquery.min.js') }}"></script>
    <script src="{{ asset('website_files/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/jquery.totemticker.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('website_files/asset/images/favicon.png') }}" />
    <script src="{{ asset('website_files/asset/js/jquery.totemticker.js') }}"></script> --}}

    {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('website_files/assets/bootstrap-5.0.2-dist/css/bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/font-awesome.min') }}" type="text/css" rel="stylesheet">
    <!-- <script src="{{ asset('website_files/assets/bootstrap-5.0.2-dist/js/jquery.min.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="{{ asset('website_files/assets/css/all.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/custom.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/responsive.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/color.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/slick.css') }}" type="text/css" rel="stylesheet">
    
   
</head>

<body>

    <!-- <div class="header">
        <div class="container-fluid">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <a href="">
                    <img src="{{ asset('website_files/full-logo-1.png') }}" id="UcMenu_imgLogo" class="img-responsive"
                        alt="Disaster Management Authority" title="Disaster Management Authority">
                </a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-header">

                <div class="col-sm-2"><img src="{{ asset('website_files/G-20-Summit-India.png') }}"
                        style="border: solid 1px #ccc; background: white; height: 75px;"></div>
                <div class="col-sm-4 col-xs-12">
                    <div class="upper-column info-box ">
                        <div class="icon-box">
                            <i class="fa fa-phone"></i>
                        </div>
                        <ul>
                            <li>
                                <strong>
                                    <a href="">Emergency Toll free number</a>
                                </strong>
                            </li>
                            <li>State Control Room - 1070
                            </li>
                            <li>District EOC'<sub>s</sub>
                                - &lt;STD CODE&gt; + 1077
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                    <div class="upper-column info-box  center-block text-center">


                        <div class="icon-box ">
                            <i class="fa fa-language" aria-hidden="true"></i>
                        </div>

                        <form method="post" action="">

                            <ul>
                                <li>
                                    <strong>
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.HOME_PAGE.SELECT_LANGUAGE') }}
                                        @else
                                            {{ Config::get('english.HOME_PAGE.SELECT_LANGUAGE') }}
                                        @endif
                                    </strong>
                                </li>
                                <li>
                                    <select name="language" id="language">
                                        <option value="">Slect language</option>
                                        <option value="en" <?php if ($language == 'en') {
                                            echo 'selected';
                                        }
                                        ?>>English</option>
                                        <option value="mar"<?php if ($language == 'mar') {
                                            echo 'selected';
                                        }
                                        ?>>Marathi</option>
                                    </select>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="upper-column info-box text-left zeromarg  " style="padding-left:10px;">
                        <span class="accesibility-area">

                            <a href="" id="linkDecrease" onclick="myFunction1()">
                                <img src="{{ asset('website_files/textsize-decrease.png') }}" class="img-responsive"
                                    height="24" width="24"></a>
                            <a href="" id="linkIncrease" onclick="myFunction()">
                                <img src="{{ asset('website_files/textsize-increase.png') }}" class="img-responsive"
                                    height="24" width="24"></a>
                            <a href="" id="linkReset" onclick="myFunction2()">
                                <img src="{{ asset('website_files/color-01.png') }}" class="img-responsive"
                                    height="24" width="24"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<div class="wrapper"> 
  <!--Header Start-->
  <header class="wf100 header-two">
    <div id="closetopbar" class="topbar wf100">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7">
            <p>Become a <a href="#">Volunteer</a> <a href="#">Now !</a></p>
          </div>
          <div class="col-md-6 col-sm-5"> <a id="closebtn" href="#" class="cross-btn"><i class="fa fa-times"></i></a> <a href="#" class="become-vol">Become a Volunteer</a> </div>
        </div>
      </div>
    </div>
    <div class="h3-logo-row wf100">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <ul class="quick-links">
              <li><a href="#">Site Map</a></li>
              <li><a href="#">Vacancies</a></li>
              <li><a href="#">Report It</a></li>
              <li><a href="#">RTI</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="h3-logo"> <a href="index.html"><img src="images/DMS.png" alt="" style="width: 50%;"></a></div>
          </div>
          <div class="col-md-4 col-sm-4">
            <ul class="header-contact">
              <li><span>Toll Free:</span> <strong>0000 00000</strong></li>
              <li class="city-exp"> <i class="fas fa-street-view"></i> <strong>City<br>
                Name</strong> </li>
              <li class="header-weather"> <i class="fas fa-cloud-sun"></i> 24°C / 75°F </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </header>
  <!--Header End--> 

    <div class="container-fluid">
        <div class="row nav-pd">
            <div class="col-md-12 nav-pd-col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse nav-center" id="navbarSupportedContent">
                    @foreach ($menu as $key => $menu_data)
                        @foreach ($menu_data as $key => $menu_data_new)
                            <ul class="navbar-nav mr-auto">
                            @if ($key == '0')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (session('language') == 'mar')
                                            {{ $menu_data_new['menu_name_marathi'] }}
                                        @else
                                            {{ $menu_data_new['menu_name_english'] }}
                                        @endif
                                    </a>
                                    @if (sizeof($menu_data) > 1)
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($menu_data[1] as $key => $menu_data_sub)
                                                <a class="dropdown-item"  href="@if ($menu_data_sub['is_static'] == true) {{ url($menu_data_sub['url']) }} 
                                                    @else 
                                                        {{ url('/pages/' . $menu_data_sub['url']) }} @endif 
                                                    "
                                                    target="_self" title="">
                                                    @if (session('language') == 'mar')
                                                        {{ $menu_data_sub['menu_name_marathi'] }}
                                                    @else
                                                        {{ $menu_data_sub['menu_name_english'] }}
                                                    @endif
                                                </a>
                                                    <!-- <hr class="gap-drop-menu"> -->
                                            @endforeach
                                        
                                        </div>
                                    @endif
                                </li>
                            @endif
                            </ul>
                        @endforeach
                    @endforeach
                    </div>
                </nav>

            </div>
        </div>
    </div>



    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('website_files/images/home/slide1.jpeg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('website_files/images/home/slide2.jpeg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('website_files/images/home/slide3.jpeg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


</div>


<!--Main Content Start-->
<div class="main-content"> 
    <!--Mayor Msg with Video Start-->
    <section class="Mayor-video-msg">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-5"> 
            <!--Mayor Msg Start-->
            <div class="city-tour gallery"> <strong> Disaster Management Head </strong>  <img src="{{ asset('website_files/images/home/head.png') }}" alt=""> </div>
            <!--Mayor Msg End--> 
          </div>
          <div class="col-md-8 col-sm-7">
            <div class="Mayor-welcome">
              <h5>Welcome to Visit Disaster Management Web Portal</h5>
              <p>To build a safer and disaster resilient India by a holistic, pro-active, technology driven and sustainable development strategy that involves all stakeholders and fosters a culture of prevention, preparedness and mitigation.</p>
              <h6>FirstName LastName</h6>
              <strong>Person Designation</strong> </div>
          </div>
        </div>
      </div>
    </section>
    <!--Mayor Msg with Video End--> 

        <!--City News Start-->
        <section class="wf100 city-news p75">
      <div class="container">
        <div class="title-style-3">
          <h3>Be Updated with Disaster Management News</h3>
          <p>Read the News Updates and Articles from Government </p>
        </div>
        <div class="row"> 
          <!--News Box Start-->
          <div class="col-md-3 col-sm-6">
            <div class="news-box">
              <div class="new-thumb"> <span class="cat c1">Fire</span> <img src="{{ asset('website_files/images/home/c1.jpeg') }}" alt=""> </div>
              <div class="new-txt">
                <ul class="news-meta">
                  <li>05 MAY, 2023</li>
                  <li>176 Comments</li>
                </ul>
                <h6><a href="#">Maharashtra battles forest fires</a></h6>
                <p> In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. </p>
              </div>
              <div class="news-box-f"> <img src="{{ asset('website_files/images/home/tuser1.jpg') }}" alt=""> Read more <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
            </div>
          </div>
          <!--News Box End--> 
          <!--News Box Start-->
          <div class="col-md-3  col-sm-6">
            <div class="news-box">
              <div class="new-thumb"> <span class="cat c2">Flood</span> <img src="{{ asset('website_files/images/home/c2.jpeg') }}" alt=""> </div>
              <div class="new-txt">
                <ul class="news-meta">
                  <li>05 MAY, 2023</li>
                  <li>136 Comments</li>
                </ul>
                <h6><a href="#">Kerala floods displace thousands</a></h6>
                <p> In August 2021, heavy rains and floods displaced thousands of people in Kerala, India, damaging homes, roads, and infrastructure.</p>
              </div>
              <div class="news-box-f"> <img src="{{ asset('website_files/images/home/tuser1.jpg') }}" alt=""> Read more <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
            </div>
          </div>
          <!--News Box End--> 
          <!--News Box Start-->
          <div class="col-md-3  col-sm-6">
            <div class="news-box">
              <div class="new-thumb"> <span class="cat c4">Cyclone</span> <img src="{{ asset('website_files/images/home/c3.jpeg') }}" alt=""> </div>
              <div class="new-txt">
                <ul class="news-meta">
                  <li>05 MAY, 2023</li>
                  <li>116 Comments</li>
                </ul>
                <h6><a href="#">Odisha prepares for Cyclone Yaas</a></h6>
                <p> In May 2021, The government evacuated people to safer places and took other precautionary measures to minimize the impact.</p>
              </div>
              <div class="news-box-f"> <img src="{{ asset('website_files/images/home/tuser1.jpg') }}" alt=""> Read more <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
            </div>
          </div>
          <!--News Box End--> 
           <!--News Box Start-->
           <div class="col-md-3  col-sm-6">
            <div class="news-box">
              <div class="new-thumb"> <span class="cat c3">Flood</span> <img src="{{ asset('website_files/images/home/c4.jpeg') }}" alt=""> </div>
              <div class="new-txt">
                <ul class="news-meta">
                  <li>05 MAY, 2023</li>
                  <li>126 Comments</li>
                </ul>
                <h6><a href="#">Assam flood situation remains critical</a></h6>
                <p> In 2021, Assam faced severe floods due to heavy rains, displacing many people and damaging homes and infrastructure. </p>
              </div>
              <div class="news-box-f"> <img src="{{ asset('website_files/images/home/tuser1.jpg') }}" alt=""> Read more <a href="#"><i class="fas fa-arrow-right"></i></a> </div>
            </div>
          </div>
          <!--News Box End--> 
        </div>
      </div>
    </section>
    <!--City News End--> 

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
                <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon1.png') }}" alt="">
                  <h6> <a href="#">Emergency Department</a> </h6>
                  <a class="rm" href="#">Read More</a> </div>
              </div>
              <!--Icon Box End--> 
              <!--Icon Box Start-->
              <div class="col-md-4 col-sm-4">
                <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon2.png') }}" alt="">
                  <h6> <a href="#">Public Health Department</a> </h6>
                  <a class="rm" href="#">Read More</a> </div>
              </div>
              <!--Icon Box End--> 
              <!--Icon Box Start-->
              <div class="col-md-4 col-sm-4">
                <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon3.png') }}" alt="">
                  <h6> <a href="#">Information Desk/Hotline</a> </h6>
                  <a class="rm" href="#">Read More</a> </div>
              </div>
              <!--Icon Box End--> 
              <!--Icon Box Start-->
              <div class="col-md-4 col-sm-4">
                <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon4.png') }}" alt="">
                  <h6> <a href="#">Police Department </a> </h6>
                  <a class="rm" href="#">Read More</a> </div>
              </div>
              <!--Icon Box End--> 
              <!--Icon Box Start-->
              <div class="col-md-4 col-sm-4">
                <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon5.png') }}" alt="">
                  <h6> <a href="#">National Guard </a> </h6>
                  <a class="rm" href="#">Read More</a> </div>
              </div>
              <!--Icon Box End--> 
              <!--Icon Box Start-->
              <div class="col-md-4 col-sm-4">
                <div class="deprt-icon-box"> <img src="{{ asset('website_files/images/home/deprticon6.png') }}" alt="">
                  <h6> <a href="#">Fire Department</a> </h6>
                  <a class="rm" href="#">Read More</a> </div>
              </div>
              <!--Icon Box End--> 
            </div>
          </div>
          <div class="col-md-3">
            <div class="emergency-info">
              <h5>Helplines &
                Emergency
                Services </h5>
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> 
                <!--Panel Start-->
                <div class="panel">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> DMS Office </a> </h6>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <ul>
                        <li> <i class="fas fa-user-tie"></i> Lorem Ipsum</li>
                        <li> <i class="far fa-building"></i> 93002 Green Avenue</li>
                        <li> <i class="fas fa-phone"></i> 333 111 333</li>
                        <li> <i class="fas fa-fax"></i> 777 555 666 </li>
                        <li> <i class="far fa-envelope"></i> office@dms.org </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--Panel End--> 
                <!--Panel Start-->
                <div class="panel">
                  <div class="panel-heading" role="tab" id="heading2">
                    <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2"> City Council </a> </h6>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                    <div class="panel-body">
                      <ul>
                        <li> <i class="fas fa-user-tie"></i> Lorem Ipsum</li>
                        <li> <i class="far fa-building"></i> 93002 Green Avenue</li>
                        <li> <i class="fas fa-phone"></i> 333 111 333</li>
                        <li> <i class="fas fa-fax"></i> 777 555 666 </li>
                        <li> <i class="far fa-envelope"></i> city@dms.org </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--Panel End--> 
                <!--Panel Start-->
                <div class="panel">
                  <div class="panel-heading" role="tab" id="heading3">
                    <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3"> Police Emergency </a> </h6>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                    <div class="panel-body">
                      <ul>
                        <li> <i class="fas fa-user-tie"></i> Lorem Ipsum</li>
                        <li> <i class="far fa-building"></i> 93002 Green Avenue</li>
                        <li> <i class="fas fa-phone"></i> 333 111 333</li>
                        <li> <i class="fas fa-fax"></i> 777 555 666 </li>
                        <li> <i class="far fa-envelope"></i> police@dms.org </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--Panel End--> 
                <!--Panel Start-->
                <div class="panel">
                  <div class="panel-heading" role="tab" id="heading4">
                    <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4"> Ambulance </a> </h6>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                    <div class="panel-body">
                      <ul>
                        <li> <i class="fas fa-user-tie"></i> Lorem Ipsum</li>
                        <li> <i class="far fa-building"></i> 93002 Green Avenue</li>
                        <li> <i class="fas fa-phone"></i> 333 111 333</li>
                        <li> <i class="fas fa-fax"></i> 777 555 666 </li>
                        <li> <i class="far fa-envelope"></i> ambulance@dms.org </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--Panel End--> 
                <!--Panel Start-->
                <div class="panel">
                  <div class="panel-heading" role="tab" id="heading5">
                    <h6> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5"> E-Services </a> </h6>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                    <div class="panel-body">
                      <ul>
                        <li> <i class="fas fa-user-tie"></i> Lorem Ipsum</li>
                        <li> <i class="far fa-building"></i> 93002 Green Avenue</li>
                        <li> <i class="fas fa-phone"></i> 333 111 333</li>
                        <li> <i class="fas fa-fax"></i> 777 555 666 </li>
                        <li> <i class="far fa-envelope"></i> service@dms.org </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--Panel End--> 
              </div>
            </div>
            <a href="#" class="jobs-link">Open Vacancies</a>
            <ul class="reports">
              <li> <a href="#"><i class="fas fa-file-alt"></i> 2023 Economy Report</a> </li>
              <li> <a href="#"><i class="fas fa-file-alt"></i> 30 Days Plans of Govt.</a> </li>
              <li> <a href="#"><i class="fas fa-file-alt"></i> Court Case about TAX</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!--Departments & Information Desk End--> 

    <!--Recent Events Start-->
    <!-- <section class="wf100 p75 recent-events">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h3>Recent Events</h3>
            <div class="recent-event-block">  -->
              <!--Slider Big Slider Start-->
              <!-- <div class="recent-event-slider">
                <div class="event-big">
                  <div class="event-cap">
                    <h5><a href="#">2K23 Disaster Risk Reduction</a></h5>
                    <ul>
                      <li><i class="fas fa-image"></i> 83 Photos</li>
                      <li><i class="fas fa-play-circle"></i> 16 Videos</li>
                    </ul>
                    <p> The National Disaster Management Authority (NDMA), headed by the Prime Minister of India, is the apex body for Disaster Management in India. </p>
                  </div>
                  <img src="{{ asset('website_files/images/home/e1.jpeg') }}" alt=""> </div>
                
              </div> -->
              <!--Slider Big Slider End--> 
              Slider Big Slider Nav
              <div class="recent-event-slider-nav">
                <div><img src="{{ asset('website_files/images/home/e0.jpeg') }}" alt=""></div>
                <div><img src="{{ asset('website_files/images/home/e02.jpeg') }}" alt=""></div>
                <div><img src="{{ asset('website_files/images/home/e04.jpeg') }}" alt=""></div>
                <div><img src="{{ asset('website_files/images/home/05.jpeg') }}" alt=""></div>
              </div>
              <!--Slider Big Slider Nav--> 
            <!-- </div>
          </div>
          <div class="col-md-7">
            <h3>Upcoming Schedules</h3>
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#Events" aria-controls="Events" role="tab" data-toggle="tab">Next Events</a></li>
              <li role="presentation"><a href="#Meetings" aria-controls="Meetings" role="tab" data-toggle="tab">Meetings</a></li>
            </ul> -->
            <!-- Tab panes -->
            <!-- <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="Events">  -->
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/chart.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Annual Cycling 2023 for Charity Donation</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/chart.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Cultural Festival & Concert at New Year</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/chart.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Seminar on Child Labour  held in next month</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/chart.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Protest against women rights violence</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
              <!-- </div>
              <div role="tabpanel" class="tab-pane" id="Meetings">  -->
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/meeting.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Seminar on Child Labour  held in next month</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/meeting.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Cultural Festival & Concert at New Year</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/meeting.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Annual Cycling 2023 for Charity Donation</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
                <!--Event List Start-->
                <!-- <ul class="event-list">
                  <li> <strong class="edate">30 May, 2023</strong> <strong class="etime">09:00 pm</strong> </li>
                  <li><img src="images/meeting.jpeg" alt=""></li>
                  <li class="el-title">
                    <h6><a href="#">Protest against women rights violence</a></h6>
                    <p><i class="fas fa-map-marker-alt"></i> DMS Office, India</p>
                  </li>
                  <li> <a href="#" class="joinnow">Join Now</a> </li>
                </ul> -->
                <!--Event List End--> 
              <!-- </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!--Recent Events End--> 

        <!-- Explore Community Start-->
        <section class="wf100 p80 explore-community">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>DMS Sub-Departments</h3>
            <ul class="community-links-style-two">
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Emergency Management </a> </li>
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Public Health </a> </li>
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Transportation  </a> </li>
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Communications </a> </li>
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Infrastructure </a> </li>
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Law Enforcement </a> </li>
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Administration </a> </li>
              <li> <a href="#"> <img src="{{ asset('website_files/images/home/excomm-icon4.png') }}" alt=""> Volunteer Management </a> </li>
              
            </ul>
          </div>
          <div class="col-md-6">
            <h3>Meet Officials</h3>
            <!--Team Slider Start-->

            <!--Team Slider End--> 
          </div>
        </div>
      </div>
    </section>
    <!-- Explore Community End-->

    <!-- <section class="wf100 home3 emergency-numbers">
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
                  <div class="em-box"> <i class="fas fa-user-secret"></i> <strong class="em-num">100</strong> <strong class="em-deprt">Police
                    Department</strong> </div>
                </li>
                <li class="col-md-4 col-sm-4">
                  <div class="em-box"> <i class="fas fa-ambulance"></i> <strong class="em-num">108</strong> <strong class="em-deprt"> Ambulance
                    Services</strong> </div>
                </li>
                <li class="col-md-4 col-sm-4">
                  <div class="em-box"> <i class="fas fa-fire-extinguisher"></i> <strong class="em-num">101</strong> <strong class="em-deprt">Fire Brigade
                    Department</strong> </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!--Footer Start-->
  <footer class="home3 main-footer wf100">
    <div class="container">
      <div class="row"> 
        <!--Footer Widget Start-->
        <div class="col-md-3 col-sm-6">
          <div class="textwidget"> <img src="images/footer_logo.png" alt="" width="80%"><br><br>
            <address>
            <ul>
              <li> <i class="fas fa-university"></i> <strong>Council Address:</strong>  DMS Office, Maharshtra,
                INDIA</li>
              <li> <i class="fas fa-envelope"></i> <strong>Email:</strong> contact@dms.com<br>
                info@dms.com </li>
              <li> <i class="fas fa-phone"></i> <strong>Call us:</strong>
                +91 000 0000 000 </li>
            </ul>
            </address>
          </div>
        </div>
        <!--Footer Widget End--> 
        <!--Footer Widget Start-->
        <div class="col-md-3 col-sm-6">
          <div class="footer-widget">
            <h6>Sub-Departments</h6>
            <ul>
              <li><a href="#"><i class="fas fa-star"></i> Emergency Management</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Public Health</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Transportation</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Communications</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Infrastructure</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Law Enforcement</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Finance and Administration</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Volunteer Management</a></li>
            </ul>
          </div>
        </div>
        <!--Footer Widget End--> 
        <!--Footer Widget Start-->
        <div class="col-md-3 col-sm-6">
          <div class="footer-widget">
            <h6>Important Links</h6>
            <ul>
              <li><a href="#"><i class="fas fa-star"></i> Emergency Services</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Environmental Conditions</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Disaster Preparedness</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Disaster Response</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Disaster Recovery</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Volunteer Opportunities</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Donations and Aid</a></li>
              <li><a href="#"><i class="fas fa-star"></i> Local Resources</a></li>
            </ul>
          </div>
        </div>
        <!--Footer Widget End--> 
        <!--Footer Widget Start-->
        <div class="col-md-3 col-sm-6">
          <div class="twitter-widget">
            <div class="tw-txt">
              <h6>@DMS.gov</h6>
              <a href="#" class="reply-tw"><i class="fas fa-reply"></i></a>
              <p> "Stay prepared for disasters, stay safe. Make sure you have an emergency kit, know evacuation routes, and stay informed with our updates. #DisasterPreparedness #StaySafe" </p>
            </div>
            <div class="tw-footer"> @dms.gov <strong>3 May, 2023</strong> <i class="fab fa-twitter"></i> </div>
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
          <p class="copyr"> © 2023, <a href="#">All rights reserved</a></p>
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

