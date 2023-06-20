@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Event </h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>

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
                        @forelse ($success_storage_data as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile">
                                            <div>
                                                <img src="{{ Config::get('DocumentConstant.SUCCESS_STORIES_VIEW') }}{{ $item['marathi_image'] }}"
                                                    alt="">
                                            </div>
                                            <div class="bio">
                                                <h2>{{ $item['marathi_title'] }}</h2>
                                                <h4>{{ $item['marathi_designation'] }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="content">
                                            <p>{{ strip_tags($item['marathi_description']) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile">
                                            <div class="">
                                                <img src="{{ Config::get('DocumentConstant.SUCCESS_STORIES_VIEW') }}{{ $item['english_image'] }}"
                                                    alt="">
                                            </div>
                                            <div class="new-txt">
                                                <h4>{{ $item['english_title'] }}</h4>
                                                <h6>{{ $item['english_designation'] }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="content">
                                            <p><a 
                                              >{{ mb_substr(strip_tags($item['english_description']), 0, 204) }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        @empty
                            <p>No Disaster News</p>
                        @endforelse

                        <!--Department Details Txt End-->
                    </div>
                      <!--Sidebar Start-->
                      <div class="col-md-3">
                        <div class="pb-3">
                            <button type="button" class="btn back-btn-color"><a href="{{ route('list-success-stories-web') }}">
                                    Back</a>
                            </button>
                        </div>

                        @include('website.pages.training-event.upcoming-events')
                    </div>
                    <!--Sidebar End-->
                </div>
            </div>
        </div>
        
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
