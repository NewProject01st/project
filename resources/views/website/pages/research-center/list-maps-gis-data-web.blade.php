    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
    <style>
        .gallery-item {
          display: none;
        }
        
        .gallery-item.active {
          display: block;
        }
      </style>
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>Resource Center</h2>
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

            {{-- <div class="container">
                <h1>Gallery</h1>
                
                <ul class="nav nav-pills mb-4">
                  <li class="nav-item">
                    <a class="nav-link active" data-category="all" href="#">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-category="nature" href="#">Nature</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-category="animals" href="#">Animals</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-category="city" href="#">City</a>
                  </li>
                </ul>
                
                <div class="row gallery">
                  <div class="col-lg-4 col-md-6 gallery-item" data-category="nature">
                    <img src="{{ asset('storage/images/disaster-news/slide1_english.jpeg') }}" alt="Nature 1">
                  </div>
                  <div class="col-lg-4 col-md-6 gallery-item" data-category="animals">
                    <img src="{{ asset('storage/images/disaster-news/slide1_english.jpeg') }}" alt="Animals 1">
                  </div>
                  <div class="col-lg-4 col-md-6 gallery-item" data-category="city">
                    <img src="{{ asset('storage/images/disaster-news/slide1_english.jpeg') }}" alt="City 1">
                  </div>
                  <!-- Add more gallery items here -->
                </div>
                
                <ul class="pagination mt-4">
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <!-- Add more page links here -->
                </ul>
              </div> --}}
            
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  // Filter gallery items based on selected category
                  function filterItems(category) {
                    const galleryItems = document.querySelectorAll('.gallery-item');
                    galleryItems.forEach(function(item) {
                      if (category === 'all' || item.dataset.category === category) {
                        item.classList.add('active');
                      } else {
                        item.classList.remove('active');
                      }
                    });
                  }
                  
                  // Activate selected category and filter items
                  const navLinks = document.querySelectorAll('.nav-link');
                  navLinks.forEach(function(link) {
                    link.addEventListener('click', function(event) {
                      event.preventDefault();
                      navLinks.forEach(function(navLink) {
                        navLink.classList.remove('active');
                      });
                      this.classList.add('active');
                      filterItems(this.dataset.category);
                    });
                  });
                  
                  // Initialize gallery with 'all' category
                  filterItems('all');
                });
              </script>
            <div class="department-details">
                <div class="container">
                    <div class="row">
                            <div class="col-md-12">
                               <div class="map">
                               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3867187.666169696!2d76.76983739999999!3d18.81817715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1683036229388!5m2!1sen!2sin"></iframe>
                               </div>
                            </div>
                    </div>
                </div>
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->
    @endsection
