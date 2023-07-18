@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.HOME_PAGE.DEPARTMENT_INFORMATION_DESK') }}
                @else
                    {{ Config::get('english.HOME_PAGE.DEPARTMENT_INFORMATION_DESK') }}
                @endif
            </h2>
        </div>
    </section>
    <!--Subheader End-->
    <!--Main Content Start-->
    <div class="main-content">
        <!--Department Details Page Start-->
        <div class="department-details">
            <!--Start News Start-->
               <!--Departments & Information Desk Start-->
    <section class="wf100 p75-50  depart-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style-3">
                        <h3>
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.DEPARTMENT_INFORMATION_DESK') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.DEPARTMENT_INFORMATION_DESK') }}
                            @endif
                        </h3>
                    </div>
                    <div class="row">
                        @foreach ($data_output as $item)
                            @if (session('language') == 'mar')
                                <!--Icon Box Start-->
                                <div class="col-md-3 col-sm-3">
                                    <div class="deprt-icon-box"> <img
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $item['marathi_image'] }}"
                                            alt="{{ strip_tags($item['marathi_title']) }} प्रतिमा">
                                        <h6> <a><?php echo $item['marathi_title']; ?></a> </h6>
                                        <a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                            @else
                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-3 col-sm-3">
                                    <div class="deprt-icon-box"> <img
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $item['english_image'] }}"
                                            alt="{{ strip_tags($item['english_title']) }} Image">
                                        <h6> <a><?php echo $item['english_title']; ?></a> </h6>
                                        <a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.HOME_PAGE.READ_MORE') }}
                                            @else
                                                {{ Config::get('english.HOME_PAGE.READ_MORE') }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <!--Icon Box End-->
                            @endif
                        @endforeach
                        
                    </div>
                </div>

        </div>
        </div>
        </div>
    </section>
    <!--Departments & Information Desk End-->
            <!--Main Content End-->
        @endsection
