    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>Preparedness </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li> Capacity Training </li>
                </ul>
            </div>
        </section>
        <!--Subheader End-->
        <!--Main Content Start-->
        <div class="main-content">
            <!--Testimonials Start-->
            <section class="testimonials-section wf100 p80 graybg">
                <h2 class="text-center">What People Says</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="h3testimonials" class="owl-carousel owl-theme">
                                <!--testimonials box start-->
                                @foreach ($data_output as $item)
                                    @if (session('language') == 'mar')
                                        <div class="item">
                                            <?php echo $item['marathi_description']; ?>
                                            <div class="tuser">
                                                <img src="{{ asset('storage/images/news-events/success-stories/' . $item['marathi_image']) }}"
                                                    class="d-block w-25">
                                                <strong><?php echo $item['marathi_title']; ?></strong><?php echo $item['marathi_designation']; ?>
                                            </div>
                                        </div>
                                    @else
                                        <div class="item">
                                            <?php echo $item['english_description']; ?>
                                            <div class="tuser">
                                                <img src="{{ asset('storage/images/news-events/success-stories/' . $item['english_image']) }}"
                                                    class="d-block w-25">
                                                <strong><?php echo $item['english_title']; ?></strong><?php echo $item['english_designation']; ?>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!--testimonials box End-->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Testimonials End-->
        </div>
        <!--Main Content End-->
    @endsection
