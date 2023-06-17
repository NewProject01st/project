@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ====== gallery zooom==== */
        .toZoom {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .toZoom:hover {
            opacity: 0.7;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            padding-top: 65px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            /* height: 100%;  */
            /* Full height */
            overflow: hidden;
            /* overflow: auto;  */
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            height: 90%;
        }

        /* Add Animation */
        .modal-content {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0.1)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_HEADING') }}
                @else
                    {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('index') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK3') }}
                    @else
                        {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK3') }}
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!--Subheader End-->
    <!--Main Content Start-->
    <div class="main-content">
        <!--Video Start-->

        <section class="testimonials-section wf100 p80 graybg">
            <div class="container">
                <div class="title-style-3">
                    <h3 class="stitle text-center d-flex justify-content-start">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.VIDEO') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.VIDEO') }}
                        @endif
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="Container video_cont">
                            <div class="SlickCarousel">
                                <!-- Item -->
                                @foreach ($data_getallvideo as $item)
                                    @if (session('language') == 'mar')
                                        <div class="ProductBlock">
                                            <div class="Content">
                                                <div class="img-fill">
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                                        allowfullscreen></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="ProductBlock">
                                            <div class="Content">
                                                <div class="img-fill">
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                                        allowfullscreen></iframe>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Video End-->
        <section class="">
            <div class="container photo_g">
                <div class="row">
                    <h3 class="stitle text-center d-flex justify-content-start pt-4">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.GALLERY') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.GALLERY') }}
                        @endif
                    </h3>
                    <div class="col-12">
                        <a href="javascript:void(0)" onclick="myFunction('')">
                            <input type="radio" name="filter" id="all" checked><label for="all">All</label>
                        </a>

                        @forelse($categories as $categories_data)
                            @if (session('language') == 'mar')
                                <a href="javascript:void(0)" onclick="myFunction('{{ $categories_data['id'] }}')">
                                    <input type="radio" name="filter" id="category_{{ $categories_data['id'] }}"><label
                                        for="animals">{{ $categories_data['marathi_name'] }}</label>
                                </a>
                            @else
                                <a href="javascript:void(0)" onclick="myFunction('{{ $categories_data['id'] }}')">
                                    <input type="radio" name="filter" id="category_{{ $categories_data['id'] }}"><label
                                        for="animals">{{ $categories_data['english_name'] }}</label>
                                </a>
                            @endif
                        @empty
                            No Categries found
                        @endforelse
                        <div class="row  d-flex gallery">
                            <div class="d-flex" id="gallary_data">
                                <?php $k=1; ?>
                                @forelse ($gallery_data as $item)
                                    <div class="col-md-4 nature">
                                        <figure class="card animals">
                                            @if (session('language') == 'mar')
                                                <img class="card__image toZoom" id="img{{$k}}" loading="lazy"
                                                    src="{{ $item['marathi_image'] }}" class="d-block w-100 img-fluid"
                                                    alt="...">
                                                <!-- The Modal -->
                                                <div class="idMyModal modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content">
                                                </div>
                                            @else
                                                <img class="card__image toZoom p-3 d-block w-100 img-fluid" loading="lazy"
                                                    src="{{ $item['english_image'] }}" 
                                                    alt="...">
                                                <!-- The Modal -->
                                                <div class="idMyModal modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content">
                                                </div>
                                            @endif
    </figure>
    </div>
                                        @empty
                                            No Categries found
                                            <?php $k++ ?>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        // $(document).ready(function() {
        //     myFunction('');
        // });
        
        function myFunction(category_id) {
            $("#gallary_data").empty();
            $.ajax({
                url: "{{ route('list-ajax-multimedia-web') }}",
                method: "POST",
                data: {
                    "category_id": category_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#gallary_data").empty();
                    // $("#gallary_data").append('<div class="col-md-4 nature"><figure class="card animals">');
                    $.each(data, function(i, item) {

                            console.log(item.english_image);
                        @if (session('language') == 'mar')
                            $("#gallary_data").append(`<div class="col-md-4 nature">
                                            <figure class="card animals">
                                            <img class="card__image toZoom" loading="lazy"
                                                    src="item . english_image" class="d-block w-100 img-fluid"
                                                    alt="...">
                                            <div class="idMyModal modal">
                                                <span class="close">&times;</span>
                                                <img class="modal-content">
                                            </div>
                                            </figure>
                                             </div>
                                            `);
                        @else


                        $("").attr();
                            // $("#gallary_data").append(`<div class="col-md-4 nature">
                            // <figure class="card animals">
                            // <img class="card__image toZoom p-3 d-block w-100 img-fluid" loading="lazy"
                            //                         src="`+item.english_image+`" class="d-block w-100 img-fluid"
                            //                         alt="...">
                            //                         <!-- The Modal -->
                            //                     <div class="idMyModal modal">
                            //                         <span class="close">&times;</span>
                            //                         <img class="modal-content">
                            //                     </div>
                            //                     </figure>
                            //                  </div>`);
                        @endif
                    });
                    // $("#gallary_data").append('</figure> </div>');

                },
                error: function(data) {}
            });
        }
   
    </script>
    <!--Main Content End-->
    <script>
        const modal = document.getElementsByClassName('idMyModal');
        const img = document.getElementsByClassName('toZoom');
        const modalImg = document.getElementsByClassName('modal-content');
        
        for (let i = 0; i < img.length; i++) {
            img[i].onclick = function() {
                modal[i].style.display = "block";
                modalImg[i].src = this.src;
            }
        }

        var span = document.getElementsByClassName("close");
        for (let i = 0; i < span.length; i++) {
            span[i].onclick = function() {
                modal[i].style.display = "none";
            }
        }
    </script>

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' type='text/javascript'></script>
    <script src='https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/slick.js' type='text/javascript'></script>
    <script>
        $(document).ready(function() {
            $(".SlickCarousel").slick({
                rtl: false, // If RTL Make it true & .slick-slide{float:right;}
                autoplay: true,
                autoplaySpeed: 5000, //  Slide Delay
                speed: 800, // Transition Speed
                slidesToShow: 4, // Number Of Carousel
                slidesToScroll: 1, // Slide To Move 
                pauseOnHover: false,
                appendArrows: $(".Container .Head .Arrows"), // Class For Arrows Buttons
                prevArrow: '<span class="Slick-Prev"></span>',
                nextArrow: '<span class="Slick-Next"></span>',
                easing: "linear",
                responsive: [{
                        breakpoint: 801,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 641,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 481,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ],
            })
        })
    </script>


@endsection
