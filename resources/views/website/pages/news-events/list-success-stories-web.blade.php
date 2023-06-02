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
        <div class="main-content p60">
            <!--Department Details Page Start-->
            <div class="department-details">
                <div class="container">
                    <div class="row">
                        <!--Start News Start-->
                        <section class="wf100 city-news p75">
                            <div class="container ">
                                <div class="title-style-3">
                                    <h3>Be Updated with Disaster Management News</h3>
                                    <p>Read the News Updates and Articles from Government </p>
                                </div>
                                <div class="row d-flex flex-wrap">

                                    @foreach ($data_output as $item)
                                        @if (session('language') == 'mar')
                                            <div class="col-md-3 col-sm-6">
                                                <div class="news-box">
                                                    {{-- <div class="new-thumb"> <span class="cat c1">Fire</span> --}}
                                                    <img src="{{ asset('storage/images/disaster-news/' . $item['marathi_image']) }}"
                                                        class="d-block w-100">
                                                </div>
                                                <div class="new-txt">
                                                    <ul class="news-meta">
                                                        <li>
                                                            {{-- 05 MAY, 2023  --}}
                                                            <?php echo $item['disaster_date']; ?></li>
                                                        {{-- <li>176 Comments</li> --}}
                                                    </ul>
                                                    <h6><a href="#"><?php echo $item['marathi_title']; ?></a></h6>
                                                    <p> <?php echo $item['marathi_description']; ?></p>
                                                </div>
                                                <div class="news-box-f"> <img
                                                        src="{{ asset('website_files/images/home/tuser1.jpg') }}"
                                                        alt=""> Read more <a data-id="{{ $item['id'] }}"
                                                        class="show-btn"><i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                </div>
                            @else
                                <div class="col-md-3 col-sm-6 mt-4">
                                    <div class="news-box">
                                        <div class="new-thumb">
                                            {{-- <span class="cat c1">Fire</span> --}}
                                            <img src="{{ asset('storage/images/disaster-news/' . $item['english_image']) }}"
                                                class="d-block w-100">
                                        </div>
                                        <div class="new-txt">
                                            <ul class="news-meta">
                                                <li>
                                                    {{-- 05 MAY, 2023  --}}
                                                    <?php echo $item['disaster_date']; ?></li>
                                                {{-- <li>176 Comments</li> --}}
                                            </ul>
                                            <h6><a href="#"><?php echo $item['english_title']; ?></a></h6>
                                            <p> <?php echo $item['english_description']; ?></p>
                                        </div>
                                        <div class="news-box-f"> <img
                                                src="{{ asset('website_files/images/home/tuser1.jpg') }}" alt="">
                                            Read more <a data-id="{{ $item['id'] }}" class="show-btn"><i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <!--News Box End-->
                            </div>
                    </div>
                </div>
                <!--Department Details Page End-->
            </div>
            <!--Main Content End-->
        @endsection