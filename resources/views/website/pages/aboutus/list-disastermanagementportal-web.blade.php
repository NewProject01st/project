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
                        @include('website.pages.training-event.upcoming-events')
                        <!--Sidebar End-->
                    </div>
                </div>
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->

<div class="container-fluid text-center my-3">
  <div class="row">
    <div class="row mx-auto my-auto justify-content-center">
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner carousel-inner-video" role="listbox">
          <div class="carousel-item active">
            <div class="col-md-3">
              <div class="card card_video mx-1">
                <div class="card-img card-img-top">
                  <div class="card-img-container">
                    <img alt="Slide 1" src="https://cdn.pixabay.com/photo/2020/09/26/07/05/sea-5603351_1280.jpg">
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
                    <img alt="Slide 2" src="https://cdn.pixabay.com/photo/2022/03/02/13/42/peace-7043225_1280.jpg">
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
                    <img alt="Slide 3" src="https://cdn.pixabay.com/photo/2020/03/09/17/51/narcis-4916584_1280.jpg">
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
                    <img alt="Slide 4" src="https://cdn.pixabay.com/photo/2022/03/04/15/14/river-7047522_1280.jpg">
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
                    <img alt="Slide 5" src="https://cdn.pixabay.com/photo/2020/06/15/17/35/me-nots-5302712_1280.jpg">
                  </div>
                </div>
                <!-- <div class="card-img-overlay">Slide 5</div> -->
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev bg-transparent w-aut" href="#myCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next bg-transparent w-aut" href="#myCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </div>
</div>
<div id="visible" class="d-none d-md-block"></div>

<script>
$(document).ready(function () {
  function initCarousel() {
    if ($("#visible").css("display") == "block") {
      $(".carousel .carousel-item").each(function () {
        var i = $(this).next();
        i.length || (i = $(this).siblings(":first")),
          i.children(":first-child").clone().appendTo($(this));

        for (var n = 0; n < 4; n++)
          (i = i.next()).length || (i = $(this).siblings(":first")),
            i.children(":first-child").clone().appendTo($(this));
      });
    }
  }
  $(window).on({
    resize: initCarousel(),
    load: initCarousel()
  });
});

</script>
        
    @endsection
