@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.ABOUT_US.ABOUT_US_HEADING') }}
                @else
                    {{ Config::get('english.ABOUT_US.ABOUT_US_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('index') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.ABOUT_US.ABOUT_US_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.ABOUT_US.ABOUT_US_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.ABOUT_US.ABOUT_US_SUB_LINK3') }}
                    @else
                        {{ Config::get('english.ABOUT_US.ABOUT_US_SUB_LINK3') }}
                    @endif
                </li>
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
                        @forelse ($data_output as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $item['marathi_title']; ?> </h3>
                                    <img src="{{ Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_VIEW') }}{{ $item['marathi_image'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['marathi_title']) }}">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> </h3>
                                    <img src="{{ Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_VIEW') }}{{ $item['english_image'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['english_title']) }}">
                                    <p style="text-align: justify;" class="mt-p2"> <?php echo $item['english_description']; ?></p>
                                @endif
                            </div>
                        @empty
                            <h4>No Data Found For State Disaster Management Authority</h4>
                        @endforelse

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
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
