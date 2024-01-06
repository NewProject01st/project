@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')


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

        /* ===================== */
        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }

        .card-img {
            height: auto !important;
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
                <li> <a href="{{ route('videos-and-multimedia') }}">
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
        <section class="depart-info">
            <!--Video Start-->
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="deprt-txt">
                            <h3 class="stitle text-center d-flex justify-content-start pt-4 pl-4">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.HOME_PAGE.VIDEO') }}
                                @else
                                    {{ Config::get('english.HOME_PAGE.VIDEO') }}
                                @endif
                            </h3>
                        </div>
                        <!-- Carousel Container -->
                        <div class="container text-center my-3">
                            <div class="row mx-auto my-auto justify-content-center">
                                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @forelse ($data_getallvideo as $key => $item)
                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-img">
                                                            <div class="img-fill">
                                                                <iframe class="embed-responsive-item"
                                                                    src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="carousel-item active">
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-img">
                                                            <div class="img-fill">
                                                                <iframe class="embed-responsive-item"
                                                                    src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel"
                                        role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel"
                                        role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Carousel Container -->
                    </div>
                </div>
                <!--Video End-->
            </div>
        </section>
    </div>

    <div class="main-content city-news">
        <!--Video Start-->
        <div class="container">
            <section class="">
                <div class="container photo_g">

                    <div class="row deprt-txt">
                        <h3 class="stitle text-center d-flex justify-content-start pt-4">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.GALLERY') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.GALLERY') }}
                            @endif
                        </h3>
                        <div class="col-12">
                            <a href="javascript:void(0)" onclick="myFunction('')">
                                <input type="radio" name="filter" id="all" checked><label
                                    for="all">All</label>
                            </a>

                            @forelse($categories as $categories_data)
                                @if (session('language') == 'mar')
                                    <a href="javascript:void(0)" onclick="myFunction('{{ $categories_data['id'] }}')">
                                        <input type="radio" name="filter"
                                            id="category_{{ $categories_data['id'] }}"><label for="animals"
                                            class="menugallery">{{ $categories_data['marathi_name'] }}</label>
                                    </a>
                                @else
                                    <a href="javascript:void(0)" onclick="myFunction('{{ $categories_data['id'] }}')">
                                        <input type="radio" name="filter"
                                            id="category_{{ $categories_data['id'] }}"><label for="animals"
                                            class="menugallery">{{ $categories_data['english_name'] }}</label>
                                    </a>
                                @endif
                            @empty
                                No Categries found
                            @endforelse
                            <div class="row d-flex gallery" id="gallary_data">
                                <!-- <div class="d-flex" id="gallary_data"> -->
                                <?php $k = 1; ?>
                                @forelse ($gallery_data as $key=>$item)
                                    <div class="col-md-4 nature">
                                        <figure class="">
                                            @if (session('language') == 'mar')
                                                <img class="card__image toZoom" id="img{{ $key }}" attr="if"
                                                    loading="lazy" src="{{ $item['marathi_image'] }}"
                                                    class="d-block w-100 img-fluid">
                                                <!-- The Modal -->
                                                <div class="idMyModal modal" attr-modal_id="img{{ $key }}">
                                                    <span class="close" attr-close="img{{ $key }}">&times;</span>
                                                    <img class="modal-content" attr-img_id="img{{ $key }}">
                                                </div>
                                            @else
                                                <img class="card__image toZoom d-block w-100 img-fluid"
                                                    id="img{{ $key }}" attr="else" loading="lazy"
                                                    src="{{ $item['english_image'] }}">
                                                <!-- The Modal -->
                                                <div class="idMyModal modal" attr-modal_id="img{{ $key }}">
                                                    <span class="close" attr-close="img{{ $key }}">&times;</span>
                                                    <img class="modal-content" attr-img_id="img{{ $key }}">
                                                </div>
                                            @endif
                                        </figure>
                                    </div>
                                @empty
                                    No Categries found
                                    <?php $k++; ?>
                                @endforelse
                                <!-- </div> -->
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
                        // $("#gallary_data").append('< class="col-md-4 nature">< class="">');
                        var kid = 1;
                        $.each(data, function(i, item) {
                            // console.log(data);
                            @if (session('language') == 'mar')
                                $("#gallary_data").append(`<div class="col-md-4 nature">
                                        <figure class="">
                                                <img class="card__image toZoom d-block w-100 img-fluid" id="img` + i + `" loading="lazy"
                                                    src="` + item.english_image + `"
                                                    alt="...">
                                                <!-- The Modal -->
                                                <div class="idMyModal modal" attr-modal_id="img` + i + `">
                                                    <span class="close" attr-close="img` + i + `">&times;</span>
                                                    <img class="modal-content" attr-img_id="img` + i + `">
                                                </div>
                                                </figure>
                                             </div>`);
                            @else


                                // $("").attr();
                                $("#gallary_data").append(`<div class="col-md-4 nature">
                            <figure class="" attr="else">
                            <img class="card__image toZoom d-block w-100 img-fluid" id="img` + i + `" attr="else" loading="lazy"
                                                    src="` + item.english_image + `" 
                                                    alt="...">
                                                <!-- The Modal -->
                                                <div class="idMyModal modal" attr-modal_id="img` + i + `">
                                                    <span class="close" attr-close="img` + i + `">&times;</span>
                                                    <img class="modal-content" attr-img_id="img` + i + `">
                                                </div>
                                                </figure>
                                             </div>`);
                            @endif
                        });
                    },
                    error: function(data) {}
                });
            }
        </script>
        <!--Main Content End-->


        <script>
            $(document).on('click', '.toZoom', function() {
                var button_id = $(this).attr("id");
                var img_attr = $(this).attr("src");
                $("[attr-img_id=" + button_id + "]").attr("src", img_attr);
                $("[attr-modal_id=" + button_id + "]").css('display', 'block');
            });

            $(document).on('click', '.close', function() {
                var close_id = $(this).attr("attr-close");
                $("[attr-modal_id=" + close_id + "]").css('display', 'none');
            });
        </script>
        <script>
            let items = document.querySelectorAll('.carousel .carousel-item')

            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })
        </script>

    @endsection
