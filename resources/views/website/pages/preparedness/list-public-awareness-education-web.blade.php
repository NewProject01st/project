@extends('website.layout.master')
@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Preparedness </h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>
                <li> Public Awareness Education </li>
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
                                    <img src="{{ asset('storage/images/preparedness/awareness-education/' . $item['marathi_image']) }}"
                                    class="d-block w-100" alt="...">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> : </h3>
                                    <img src="{{ asset('storage/images/preparedness/awareness-education/' . $item['english_image']) }}"
                                    class="d-block w-100" alt="...">
                                    <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
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
        <!--Objective Goals End-->
    </div>
    <!--Main Content End-->
@endsection