@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>About Us </h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>
                <li> Objective and Goals </li>
            </ul>
        </div>
    </section>
    <!--Subheader End-->
    <!--Main Content Start-->
    <div class="main-content p60">
        <!--Objective Goals Start-->
        <div class="department-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!--Department Details Txt Start-->
                        @foreach ($data_output as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $item['marathi_title']; ?> : </h3>

                                    <p style="text-align: justify;">
                                        <img src="{{ asset('storage/images/aboutus/objective-goals/' . $item['marathi_image']) }}"
                                            class="d-block w-100 to_set_img" alt="...">
                                        <?php echo $item['marathi_description']; ?>
                                    </p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> : </h3>

                                    <p style="text-align: justify;" class="mt-p2">
                                        <img src="{{ asset('storage/images/aboutus/objective-goals/' . $item['english_image']) }}"
                                            class="d-block w-100 to_set_img" alt="...">
                                        <?php echo $item['english_description']; ?>
                                    </p>
                                @endif
                            </div>
                        @endforeach

                        <!--Department Details Txt End-->
                    </div>
                    <!--Sidebar Start-->
                    <div class="col-md-3">
                        @include('website.pages.training-event.upcoming-events')
                    </div>
                    <!--Sidebar End-->
                </div>
            </div>
        </div>
        <!--Objective Goals End-->
    </div>
    <!--Main Content End-->
@endsection
