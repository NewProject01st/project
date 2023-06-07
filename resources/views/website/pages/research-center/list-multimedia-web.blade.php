@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')

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
                <h3>Video</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="h3testimonials p-3" class=" owl-theme">
                        <!--Video box start-->
                        @foreach ($data_getallvideo as $item)
                        @if (session('language') == 'mar')
                        <div class="item">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        @else
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/{{ $item['video_name'] }}" allowfullscreen></iframe>
                        <!-- <div class="item">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ $item['video_name'] }}"
                                    allowfullscreen></iframe>
                            </div>
                        </div> -->
                        @endif
                        @endforeach
                        <!--Video box End-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Video End-->

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
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/0/300" alt="">
                        <!-- The Modal -->
                        <div class="idMyModal modal">
                            <span class="close">&times;</span>
                            <img class="modal-content">
                        </div>
                    </figure>
                    <figure class="card nature">
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/10/300" alt="">
                        <!-- The Modal -->
                        <div class="idMyModal modal">
                            <span class="close">&times;</span>
                            <img class="modal-content">
                        </div>
                    </figure>
                    <figure class="card animals">
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/1003/300" alt="">
                        <!-- The Modal -->
                        <div class="idMyModal modal">
                            <span class="close">&times;</span>
                            <img class="modal-content">
                        </div>
                    </figure>
                    <figure class="card people">
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/1005/300" alt="">
                        <!-- The Modal -->
                        <div class="idMyModal modal">
                            <span class="close">&times;</span>
                            <img class="modal-content">
                        </div>
                    </figure>
                    <figure class="card nature">
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/218/300" alt="">
                        <!-- The Modal -->
                        <div class="idMyModal modal">
                            <span class="close">&times;</span>
                            <img class="modal-content">
                        </div>
                    </figure>
                    <figure class="card people">
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/1012/300" alt="">
                        <!-- The Modal -->
                        <div class="idMyModal modal">
                            <span class="close">&times;</span>
                            <img class="modal-content">
                        </div>
                    </figure>
                    <figure class="card animals">
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/1020/300" alt="">
                        <!-- The Modal -->
                        <div class="idMyModal modal">
                            <span class="close">&times;</span>
                            <img class="modal-content">
                        </div>
                    </figure>
                    <figure class="card people">
                        <img class="card__image toZoom" loading="lazy" src="https://picsum.photos/id/1027/300" alt="">
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
</div>
<!--Main Content End-->

<!--Main Content Start-->
<div class="main-content p60">
    <!--Department Details Page Start-->
    <div class="department-details">
        <div class="container">
            <div class="row">
                <div class="container">

                    <!-- Category buttons -->
                    {{-- <div class="mb-3 d-flex justify-content-center">
                          <button class="btn btn-primary filter-button m-1" data-filter="all">All</button>
                          @foreach ($categories as $category)
                              <button class="btn btn-primary filter-button m-1" data-filter="{{ $category }}">{{ $category }}</button>
                    @endforeach
                </div> --}}

                <!-- Image grid -->
                {{-- <div class="row gallery">
                            @foreach ($data_output as $item)
                                <div class="col-md-4 nature">
                                    @if (session('language') == 'mar')
                                        <img src="{{ asset('storage/images/news-events/gallery/' . $item['marathi_image']) }}"
                class="d-block w-100 img-fluid" alt="...">
                @else
                <img src="{{ asset('storage/images/news-events/gallery/' . $item['english_image']) }}"
                    class="d-block w-100 img-fluid" alt="...">
                @endif
            </div>
            @endforeach
            <!-- Add more images here with appropriate categories -->
        </div> --}}
        <!-- Pagination -->
        {{-- <div class="mt-3">
                            <nav aria-label="Gallery Pagination">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
    </div>

</div>
</div>
</div>
</div>
<!--Department Details Page End-->
</div>
<!--Main Content End-->

<!-- Bootstrap JavaScript -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<!-- Custom JavaScript -->
{{-- <script>
        // Filter images based on category
        $(".filter-button").click(function() {
            var value = $(this).attr("data-filter");
            if (value == "all") {
                $(".gallery .col-md-4").show("1000");
            } else {
                $(".gallery .col-md-4")
                    .not("." + value)
                    .hide("3000");
                $(".gallery .col-md-4")
                    .filter("." + value)
                    .show("3000");
            }
            // Highlight active button
            $(this).addClass("active").siblings().removeClass("active");
        });
    </script> --}}
@endsection