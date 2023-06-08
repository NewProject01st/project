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
        <h2>Research Center </h2>
        <ul>
            <li> <a href="{{ route('index') }}">Home</a> </li>
            <li> Maps and GIS data </li>
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
                <h3 class="stitle text-center d-flex justify-content-start">Video</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <!--Video box start-->
                        @foreach ($data_getallvideo as $item)
                        @if (session('language') == 'mar')
                        <div class="item p-1">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        @else
                        <div class="item p-1">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!--Video box End-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Video End-->  
    <section class="">
        <div class="container photo_g">
            <div class="row">
                <h3 class="stitle text-center d-flex justify-content-start pt-4">Gallery</h3>
                <div class="col-12">
                    <meta name="viewport" content="width=device-width">
                    <input type="radio" name="filter" id="all" checked><label for="all">All</label>
                    <input type="radio" name="filter" id="animals"><label for="animals">Disaster</label>
                    <input type="radio" name="filter" id="nature"><label
                        for="nature">Preparedness</label>
                    <input type="radio" name="filter" id="people"><label for="people">Emergency</label>
                    <input type="radio" name="filter" id="tech"><label for="tech">Citizen</label>
                    <div class="gallery">
                        <figure class="card animals">
                            <img class="card__image toZoom" loading="lazy"
                                src="{{ asset('storage/images/slides/slide1_english.jpeg/') }}" alt="">
                            <!-- The Modal -->
                            <div class="idMyModal modal">
                                <span class="close">&times;</span>
                                <img class="modal-content">
                            </div>
                        </figure>
                        <figure class="card nature">
                            <img class="card__image toZoom" loading="lazy"
                                src="{{ asset('storage/images/slides/slide1_english.jpeg/') }}" alt="">
                            <!-- The Modal -->
                            <div class="idMyModal modal">
                                <span class="close">&times;</span>
                                <img class="modal-content">
                            </div>
                        </figure>
                        <figure class="card people">
                            <img class="card__image toZoom" loading="lazy"
                                src="{{ asset('storage/images/slides/slide2_english.jpeg/') }}" alt="">
                            <!-- The Modal -->
                            <div class="idMyModal modal">
                                <span class="close">&times;</span>
                                <img class="modal-content">
                            </div>
                        </figure>
                        <figure class="card tech">
                            <img class="card__image toZoom" loading="lazy"
                                src="{{ asset('storage/images/slides/slide3_english.jpeg/') }}" alt="">
                            <!-- The Modal -->
                            <div class="idMyModal modal">
                                <span class="close">&times;</span>
                                <img class="modal-content">
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
{{-- <div class="container-fluid text-center my-3">
                        <div class="row">
                            <div class="row mx-auto my-auto justify-content-center">
                                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner carousel-inner-video" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="col-md-3">
                                                <div class="card card_video mx-1">
                                                    <div class="card-img card-img-top">
                                                        <div class="card-img-container">
                                                            <img alt="Slide 1"
                                                                src="https://cdn.pixabay.com/photo/2020/09/26/07/05/sea-5603351_1280.jpg">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="card-img-overlay">Slide 1</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="col-md-3">
                                                <div class="card mx-1">
                                                    <div class="card-img card-img-top">
                                                        <div class="card-img-container">
                                                            <img alt="Slide 2"
                                                                src="https://cdn.pixabay.com/photo/2022/03/02/13/42/peace-7043225_1280.jpg">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="card-img-overlay">Slide 2</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="col-md-3">
                                                <div class="card mx-1">
                                                    <div class="card-img">
                                                        <div class="card-img-container">
                                                            <img alt="Slide 3"
                                                                src="https://cdn.pixabay.com/photo/2020/03/09/17/51/narcis-4916584_1280.jpg">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="card-img-overlay">Slide 3</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="col-md-3">
                                                <div class="card mx-1">
                                                    <div class="card-img">
                                                        <div class="card-img-container">
                                                            <img alt="Slide 4"
                                                                src="https://cdn.pixabay.com/photo/2022/03/04/15/14/river-7047522_1280.jpg">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="card-img-overlay">Slide 4</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="col-md-3">
                                                <div class="card mx-1">
                                                    <div class="card-img">
                                                        <div class="card-img-container">
                                                            <img alt="Slide 5"
                                                                src="https://cdn.pixabay.com/photo/2020/06/15/17/35/me-nots-5302712_1280.jpg">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="card-img-overlay">Slide 5</div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev bg-transparent w-aut" href="#myCarousel"
                                        role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next bg-transparent w-aut" href="#myCarousel"
                                        role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="visible" class="d-none d-md-block"></div> --}}

</div>
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
@endsection
