<!DOCTYPE html>
<html lang="en">

<head>
    <title>Disaster Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="shortcut icon" href="{{ asset('website_files/images/home/DM.png') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<style>
    .slide {
        position: relative;
    }

    .overlay-container {
        position: absolute;
        right: 15%;
        bottom: 124px;
        left: 15%;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;
        text-align: center;
        line-height: normal;
        background-color: #0000004f;
        padding: 5px;
    }

    .slide-title {
        font-size: 1.5rem !important;
        margin: 0;
        padding: 0 20px;
        box-sizing: border-box;
        color: #fff;
    }
</style>

<body>
    <?php
    $common_data = App\Http\Controllers\Website\IndexController::getCommonWebData();
    ?>
    <!-- Images from Unsplash -->
    <div class="row" style="width:100%; padding:0px; margin:0px;">
        <div class="row main-landing nak-content-box-layout3 "
            style="background-image: url('{{ asset('website_files/images/home/backg.jpg') }}');">
            <div class="col-lg-7 col-md-7 col-sm-12 p-4">
                <div class="row" style="padding:20px 70px 20px 70px;">
                    @foreach ($data_output_landing_content as $key => $content)
                        <div class="d-flex justify-content-left align-items-center py-3">
                            <img class="img-size img-fluid" data-aos="zoom-in" data-aos-duration="2000"
                                src="{{ Config::get('DocumentConstant.LANDING_CONTENT_VIEW') }}{{ $content['image'] }}"
                                alt="{{ strip_tags($content['title']) }} " class="d-block w-100">
                        </div>
                        <div class="sm-block-views-landing-page-title-landingtitle">
                            <h4 class="item-title py-2" data-aos="fade-right" data-aos-anchor="#example-anchor"
                                data-aos-offset="500" data-aos-duration="3000"><?php echo $content['title']; ?> </h4>
                            <span data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                                data-aos-duration="3000"><?php echo $content['description']; ?></span>
                        </div>
                        <div class="">
                            <span class="">
                                <a href="{{ $content['url'] }}" target="_blank"><button type="submit"
                                        data-aos="zoom-in-down" data-aos-duration="3000"
                                        class="nak-btn nak-btn-fill nak-btn-layout2">EXPLORE</button></a>
                            </span>
                        </div>
                    @endforeach
                    <div class="nak-social-layout3">
                        <label class="nak-label" data-aos="fade-left" data-aos-anchor="#example-anchor"
                            data-aos-offset="500" data-aos-duration="3000">Stay in
                            Touch</label>
                        <ul class="footer-social">
                            @forelse ($common_data['social_link'] as $item)
                                <li><a href="{{ $item['url'] }}" target="_blank" class="fb" target="_blank"
                                        target="_blank" data-aos="zoom-in-up" data-aos-duration="3000">
                                        <img src="{{ Config::get('DocumentConstant.SOCIAL_ICON_VIEW') }}{{ $item['icon'] }}"
                                            width="25" height="25" alt="...">
                                    </a></li>
                            @empty
                        </ul>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 slider-container px-0">
            <div class="">
                @foreach ($data_output as $key => $slider)
                    <?php
                    
                    ?>
                    <div class="slide{{ $key === 0 ? ' active' : '' }}" height="100vh">
                        <img src="{{ Config::get('DocumentConstant.LANDING_SLIDER_VIEW') }}{{ $slider['english_image'] }}"
                            class="img-fluid slide-img" height="100vh" alt="Slide {{ $key + 1 }}">
                        <!-- Overlay container with transparent background and white text -->
                        <div class="container px-5">
                            <div class="overlay-container">
                                <span class="slide-title">{{ $slider['english_title'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="controls-container">
                    @foreach ($data_output as $key => $slider)
                        <div class="control{{ $key === 0 ? ' active' : '' }}" data-slide-index="{{ $key }}">
                        </div>
                    @endforeach
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

        changeSlides();
        let intervalId = setInterval(changeSlides, 4000);

        function changeSlides() {
            slides.forEach((slide, index) => {
                slide.classList.remove('active');
                controls[index].classList.remove('active');
            });

            slides[activeSlide].classList.add('active');
            controls[activeSlide].classList.add('active');

            activeSlide++;

            if (activeSlide >= slides.length) {
                activeSlide = 0;
            }
        }

        controls.forEach(control => {
            control.addEventListener('click', () => {
                activeSlide = parseInt(control.getAttribute('data-slide-index'));

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
