    @extends('website.layout.master')

    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_HEADING') }}
                    @else
                        {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_HEADING') }}
                    @endif
                </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_MAIN_LINK') }}
                            @else
                                {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_MAIN_LINK') }}
                            @endif
                        </a> </li>
                    <li>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK2') }}
                        @else
                            {{ Config::get('english.CITIZEN_ACTION.CITIZEN_ACTION_SUB_LINK2') }}
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
                            @forelse ($data_output_new as $item)
                                <div class="deprt-txt">
                                    @if (session('language') == 'mar')
                                        <h3><?php echo $item['marathi_title']; ?> </h3>
                                        <img src="{{ Config::get('DocumentConstant.VOLUNTEER_CITIZEN_SUPPORT_VIEW') }}{{ $item['marathi_image'] }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    @else
                                        <h3><?php echo $item['english_title']; ?> </h3>
                                        <img src="{{ Config::get('DocumentConstant.VOLUNTEER_CITIZEN_SUPPORT_VIEW') }}{{ $item['english_image'] }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                    @endif
                                </div>
                            @empty
                                <h4>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.CITIZEN_ACTION.NO_DATA_FOUND_VOLUNTEER_CITIZEN_SUPPORT') }}
                                    @else
                                        {{ Config::get('english.CITIZEN_ACTION.NO_DATA_FOUND_VOLUNTEER_CITIZEN_SUPPORT') }}
                                    @endif
                                </h4>
                            @endforelse
                            <!--Department Details Txt End-->
                            <!-- Button trigger modal -->
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('volunteer-citizen-support') }}">
                                    <button type="button" class="btn modal-btn-color">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.HOME_PAGE.CITIZEN_VOLUNTEER') }}
                                        @else
                                            {{ Config::get('english.HOME_PAGE.CITIZEN_VOLUNTEER') }}
                                        @endif

                                    </button>
                                </a>
                            </div>
                        </div>
                        <!--Sidebar Start-->
                        <div class="col-md-3">
                            <div class="sidebar">
                                <div class="pb-3">

                                </div>
                                <!--Widget Start-->
                                @include('website.pages.training-event.upcoming-events')
                                <!--Widget End-->
                            </div>
                        </div>
                        <!--Sidebar End-->
                    </div>
                </div>
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->
    @endsection
