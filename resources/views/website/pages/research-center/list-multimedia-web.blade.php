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
    <div class="main-content p60">
        <!--Department Details Page Start-->
        <div class="department-details">
            <div class="container">
                <div class="row">
                       <h1>Multimedia</h1>

                       <div class="container">
                        <h1>Gallery</h1>
                    
                        <!-- Category buttons -->
                        <div class="mb-3">
                          <button class="btn btn-primary filter-button" data-filter="all">All</button>
                          <button class="btn btn-primary filter-button" data-filter="nature">Nature</button>
                          <button class="btn btn-primary filter-button" data-filter="animals">Animals</button>
                          <button class="btn btn-primary filter-button" data-filter="cities">Cities</button>
                        </div>
                    
                        <!-- Image grid -->
                        <div class="row gallery">
                          <div class="col-md-4 nature">
                            <img  src="{{ asset('storage/images/disaster-news/slide1_english.jpeg') }}" alt="Nature Image 1" class="img-fluid">
                          </div>
                          <div class="col-md-4 animals">
                            <img src="{{ asset('storage/images/disaster-news/slide1_english.jpeg') }}" alt="Animal Image 1" class="img-fluid">
                          </div>
                          <div class="col-md-4 cities">
                            <img src="{{ asset('storage/images/disaster-news/slide1_english.jpeg') }}" alt="City Image 1" class="img-fluid">
                          </div>
                          <!-- Add more images here with appropriate categories -->
                        </div>

                         <!-- Pagination -->
    <div class="mt-3">
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
      </div>
    </div>
  
                      </div>
                </div>
            </div>
        </div>
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->

    <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JavaScript -->
  <script>
    // Filter images based on category
    $(".filter-button").click(function () {
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
  </script>
@endsection
