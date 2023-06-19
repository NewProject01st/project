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
                        {{ Config::get('marathi.ABOUT_US.ABOUT_US_SUB_LINK2') }}
                    @else
                        {{ Config::get('english.ABOUT_US.ABOUT_US_SUB_LINK2') }}
                    @endif
                </li>
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
                    <div class="col-md-9 new_design_about_obj">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Objectives 
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Goals 
                            </button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            
                            @if(isset($data_output[0]))
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $data_output[0]['marathi_title']; ?> </h3>

                                    <p style="text-align: justify;">
                                        <img src="{{ Config::get('DocumentConstant.OBJECTIVE_GOALS_VIEW') }}{{ $data_output[0]['marathi_image'] }}"
                                            class="d-block w-100 to_set_img" alt="{{ strip_tags($data_output[0]['marathi_title']) }}">
                                        <?php echo $data_output[0]['marathi_description']; ?>
                                    </p>
                                @else
                                    <h3><?php echo $data_output[0]['english_title']; ?> </h3>

                                    <p style="text-align: justify;" class="mt-p2">
                                        <img src="{{ Config::get('DocumentConstant.OBJECTIVE_GOALS_VIEW') }}{{ $data_output[0]['english_image'] }}"
                                            class="d-block w-100 to_set_img"
                                            alt="{{ strip_tags($data_output[0]['english_title']) }}">
                                        <?php echo $data_output[0]['english_description']; ?>
                                    </p>
                                @endif
                            </div>
                            @else
                            {{'No Data Available'}}
                            @endif
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            @if(isset($data_output[1]))
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $data_output[1]['marathi_title']; ?> </h3>

                                    <p style="text-align: justify;">
                                        <img src="{{ Config::get('DocumentConstant.OBJECTIVE_GOALS_VIEW') }}{{ $data_output[1]['marathi_image'] }}"
                                            class="d-block w-100 to_set_img" alt="{{ strip_tags($data_output[1]['marathi_title']) }}">
                                        <?php echo $data_output[1]['marathi_description']; ?>
                                    </p>
                                @else
                                    <h3><?php echo $data_output[1]['english_title']; ?> </h3>

                                    <p style="text-align: justify;" class="mt-p2">
                                        <img src="{{ Config::get('DocumentConstant.OBJECTIVE_GOALS_VIEW') }}{{ $data_output[1]['english_image'] }}"
                                            class="d-block w-100 to_set_img"
                                            alt="{{ strip_tags($data_output[1]['english_title']) }}">
                                        <?php echo $data_output[1]['english_description']; ?>
                                    </p>
                                @endif
                            </div>
                            @else
                            {{'No Data Available'}}
                            @endif
                        </div>

                    </div>
                        

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
