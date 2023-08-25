@extends('website.layout.master')

@section('content')
    <style>

    </style>

    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.TRAINING_WORKSHOP.TRAINING_WORKSHOP_HEADING') }}
                @else
                    {{ Config::get('english.TRAINING_WORKSHOP.TRAINING_WORKSHOP_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('index') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.TRAINING_WORKSHOP.TRAINING_WORKSHOP_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.TRAINING_WORKSHOP.TRAINING_WORKSHOP_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.TRAINING_WORKSHOP.TRAINING_WORKSHOP_SUB_LINK1') }}
                    @else
                        {{ Config::get('english.TRAINING_WORKSHOP.TRAINING_WORKSHOP_SUB_LINK1') }}
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!--Subheader End-->

    <!--Main Content Start-->
    <div class="main-content p60">
        <!--Events Start-->
        <div class="events-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  col-md-12 col-sm-12">
                        <div class="title-style-3 deprt-txt">
                            <h3>
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.HOME_PAGE.UPCOMING_EVENTS_TRAINING') }}
                                @else
                                    {{ Config::get('english.HOME_PAGE.UPCOMING_EVENTS_TRAINING') }}
                                @endif
                            </h3>
                        </div>
                        <!--Event List Box Start-->
                        @forelse ($data_output as $item)
                            <div class="event-post-full d-flex">
                                @if (session('language') == 'mar')
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a data-id="{{ $item['id'] }}" class="show-btn cursor-pointer">
                                                <div class="thumb"><img
                                                        src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $item['marathi_image'] }}"
                                                        alt="{{ strip_tags($item['marathi_title']) }} छायाचित्र"> </div>
                                            </a>
                                        </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 ">
                                                <a data-id="{{ $item['id'] }}" class="show-btn cursor-pointer">
                                                    <div class="event-post-content">
    
                                                        <div class="event-post-txt">
                                                            <h5 class="card_title training-card-title"><?php echo mb_substr($item['marathi_title'], 0, 35); ?></h5>
                                                            <ul class="event-meta">
                                                                <li><i class="fas fa-calendar-alt"></i> <?php echo $item['start_date']; ?> - <?php echo $item['end_date']; ?></li>
                                                            </ul>
                                                            <p class="card_title"><?php echo mb_substr($item['marathi_description'], 0, 121); ?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>                                            
                                        </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a data-id="{{ $item['id'] }}" class="show-btn cursor-pointer">
                                                <div class="thumb">
                                                    <img src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $item['english_image'] }}"
                                                        alt="{{ strip_tags($item['english_title']) }} Image"
                                                        class="thumb">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                                            <a data-id="{{ $item['id'] }}" class="show-btn cursor-pointer">
                                                <div class="event-post-content">

                                                    <div class="event-post-txt">
                                                        <h5 class="card_title training-card-title"><?php echo mb_substr($item['english_title'], 0, 35); ?></h5>
                                                        <ul class="event-meta">
                                                            <li><i class="fas fa-calendar-alt"></i> <?php echo $item['start_date']; ?> - <?php echo $item['end_date']; ?></li>
                                                        </ul>
                                                        <p class="card_title"><?php echo mb_substr($item['english_description'], 0, 121); ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                        <h4>
                            @if (session('language') == 'mar')
                            {{ Config::get('marathi.TRAINING_WORKSHOP.TRAINING_DATA_NOT_FOUND_UPCOMMING') }}
                        @else
                            {{ Config::get('english.TRAINING_WORKSHOP.TRAINING_DATA_NOT_FOUND_UPCOMMING') }}
                        @endif
                    </h4>
                        @endforelse
                        <!--Event List Box End-->

                        <form method="POST" action="{{ url('/list-particular-event') }}" id="showform">
                            @csrf
                            <input type="hidden" name="show_id" id="show_id" value="">
                        </form>
                    </div>
                </div>
                <!--Events End-->
            </div>
        </div>
    </div>
@endsection
