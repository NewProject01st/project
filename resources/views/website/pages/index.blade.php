<!DOCTYPE html>
<html lang="en">

<head>
    <title>Disaster Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="shortcut icon" href="{{ asset('website_files/images/home/DM.png') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <?php
    $common_data = App\Http\Controllers\Website\IndexController::getCommonWebData();
    // dd($common_data);
    // die();
    ?>
    <!-- Images from Unsplash -->
    <div class="row" style="width:100%; padding:0px; margin:0px;">
        <div class="row main-landing nak-content-box-layout3 "
            style="background-image: url('{{ asset('website_files/images/home/backg.jpg') }}');">
            <div class="col-lg-7 col-md-7 col-sm-12 p-4">
                <div class="row" style="padding:50px 70px;">
                    <div class="d-flex justify-content-left align-items-center py-3">
                        <img class="img-size img-fluid" data-aos="zoom-in" data-aos-duration="2000"
                            src="{{ asset('website_files/images/home/dmlogo.png') }}" alt="" width="80%">
                    </div>
                    <div class="sm-block-views-landing-page-title-landingtitle">
                        <h4 class="item-title py-2" data-aos="fade-right" data-aos-anchor="#example-anchor"
                            data-aos-offset="500" data-aos-duration="3000">Welcome to Disaster Management</h4>
                        <p class="" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                            data-aos-duration="3000">The National Disaster Management Authority (NDMA), headed by the
                            Prime Minister of India, is the apex body for Disaster Management in India. Setting up of
                            NDMA and the creation of an enabling environment for institutional mechanisms.
                        
                        </p>
                    </div>
                    <div class="">
                        <span class="">
                            <a href="https://localhost/new_pro/home"><button type="submit" data-aos="zoom-in-down"
                                    data-aos-duration="3000"
                                    class="nak-btn nak-btn-fill nak-btn-layout2">EXPLORE</button></a>
                        </span>
                    </div>
                    <div class="nak-social-layout3">
                        <label class="nak-label" data-aos="fade-left" data-aos-anchor="#example-anchor"
                            data-aos-offset="500" data-aos-duration="3000">Stay in
                            Touch</label>
                        <ul class="d-flex">
                            <li>
                                <a href="https://www.facebook.com/mynashikmc/" target="_blank" data-aos="zoom-in-up" data-aos-duration="3000">
                                    <i class="fab fa-facebook-f icon"></i> </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/my_nmc/" target="_blank" data-aos="zoom-in-up" data-aos-duration="3000"><i class="fab fa-instagram icon"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fmy_nmc" target="_blank" data-aos="zoom-in-down" data-aos-duration="3000"><i class="fab fa-twitter icon"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/c/mynmc" target="_blank" data-aos="zoom-in-down" data-aos-duration="3000"><i class="fab fa-youtube icon"></i></a>
                            </li>
                            <li>
                                <a href="https://nmc.gov.in/" target="_blank" data-aos="zoom-in-down" data-aos-duration="3000"><i class="fas fa-globe icon"></i></a>
                            </li>
                        </ul>
                        {{-- <ul class="footer-social">
                            @forelse ($common_data['social_link'] as $item)
                                    <li><a href="{{ $item['url'] }}" target="_blank" class="fb" target="_blank" target="_blank" data-aos="zoom-in-up" data-aos-duration="3000">
                                            
                                            <img src="{{ Config::get('DocumentConstant.SOCIAL_ICON_VIEW') }}{{ $item['icon'] }}"
                                                width="25" height="25" alt="...">
                                        </a></li>
                            @empty
                        </ul>
                    </div>
                    @endforelse --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 slider-container px-0">
                <div class="">
                    {{-- <h1>The best for<br/>the brightest.</h1> --}}
                    <div class="slide active" height="100vh">
                        <img src="{{ asset('website_files/images/home/1.png') }}" class="img-fluid slide-img" height="100vh" alt="Slide 1">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('website_files/images/home/2.png') }}" class="img-fluid slide-img" height="100vh" alt="Slide 2">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('website_files/images/home/3.png') }}" class="img-fluid slide-img" height="100vh" alt="Slide 3">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('website_files/images/home/4.png') }}" class="img-fluid slide-img" height="100vh" alt="Slide 4">
                    </div>
                    <div class="controls-container">
                        <div class="control"></div>
                        <div class="control"></div>
                        <div class="control"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        const slides = document.querySelectorAll('.slide');
        const controls = document.querySelectorAll('.control');
        let activeSlide = 0;
        let prevActive = 0;

        changeSlides();
        let intervalId = setInterval(changeSlides, 4000);

        function changeSlides() {
            slides[prevActive].classList.remove('active');
            controls[prevActive].classList.remove('active');

            slides[activeSlide].classList.add('active');
            controls[activeSlide].classList.add('active');

            prevActive = activeSlide++;

            if (activeSlide >= slides.length) {
                activeSlide = 0;
            }
        }

        controls.forEach(control => {
            control.addEventListener('click', () => {
                let idx = Array.from(controls).indexOf(control);
                activeSlide = idx;

                changeSlides();

                clearInterval(intervalId);
                intervalId = setInterval(changeSlides, 4000);
            });
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
