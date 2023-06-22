    @extends('website.layout.master')

    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_HEADING') }}
                    @else
                        {{ Config::get('english.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_HEADING') }}
                    @endif
                </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_MAIN_LINK') }}
                            @else
                                {{ Config::get('english.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_MAIN_LINK') }}
                            @endif
                        </a> </li>
                    <li>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_SUB_LINK4') }}
                        @else
                            {{ Config::get('english.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_SUB_LINK4') }}
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
                                        <img src="{{ Config::get('DocumentConstant.SEARCH_RESCUE_TEAM_VIEW') }}{{ $item['marathi_image'] }}"
                                            class="d-block w-100 to_set_img search_team" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    @else
                                        <h3><?php echo $item['english_title']; ?> </h3>
                                        <img src="{{ Config::get('DocumentConstant.SEARCH_RESCUE_TEAM_VIEW') }}{{ $item['english_image'] }}"
                                            class="d-block w-100 to_set_img search_team" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                    @endif
                                </div>
                            @empty
                                <h4>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.EMERGENCY_RESPONSES.NO_DATA_FOUND_SEARCH_RESCUE_TEAM') }}
                                    @else
                                        {{ Config::get('english.EMERGENCY_RESPONSES.NO_DATA_FOUND_SEARCH_RESCUE_TEAM') }}
                                    @endif
                                </h4>
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
