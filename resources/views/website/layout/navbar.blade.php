<div class="wrapper">
    <!--Header Start-->
    <header class="wf100 header-two">
        <div id="closetopbar" class="topbar wf100">
            <div class="container-fluid">
                <div class="row head_row">
                    <div class="col-6 d-flex align-items-center new_head_ul">

                        <ul class="quick-links">
                            <li><a href="{{ route('site-map') }}">Site Map</a></li>
                            <li><a href="{{ route('list-vacancies') }}">Vacancies</a></li>
                            <li><a href="{{ route('list-report-incident-crowdsourcing-web') }}">Report It</a></li>
                            <li><a href="{{ route('list-rti') }}">RTI</a></li>
                        </ul>

                    </div>
                    <div class="col-4 d-flex align-items-center new_head_ul2">

                        <ul class="quick-links">
                            <li><a href="#">Toll Free: 000 0000 000</a></li>
                        </ul>
                        <button class="webpage_zoom_btn" id="zoomouttextbody">A-</button>
                        <button class="webpage_zoom_btn" id="zoomtextbody">A+</button>

                    </div>
                    <div class="col-2 set_volunteer">
                        <a href="{{ route('volunteer-citizen-support-web') }}" class="become-vol">Become a
                            Volunteer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="h3-logo-row wf100">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">

                    </div>
                    {{--
                    @foreach ($subheaderinfo as $item)
                        @if (session('language') == 'mar')
                            <div class="col-md-4 col-sm-4">
                                <div class="h3-logo"> <a href="index.html"><img
                                            src="{{ asset('storage/images/header/sub-header/' . $item['logo']) }}"
                                            alt="" style="width: 50%;"></a>
                                </div>
                            </div>
                        @else
                            <div class="col-md-4 col-sm-4">
                                <div class="h3-logo"> <a href="index.html"><img
                                            src="{{ asset('storage/images/header/sub-header/' . $item['logo']) }}"
                                            alt="" style="width: 50%;"></a></div>
                            </div>
                        @endif
                    @endforeach --}}
                    <div class="col-md-4 col-sm-4">
                        <div class="h3-logo"> <a href="/"><img
                                    src="{{ asset('website_files/images/home/DMS.png') }}" alt=""
                                    style="width: 50%;"></a></div>
                    </div>

                    <div class="col-4">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <ul class="header-contact">
                                    <li class="city-exp for_pl_pr"> <i class="fas fa-street-view"></i>
                                        <strong>City<br>Nashik</strong>
                                    </li>
                                    <li class="header-weather for_pl_pr"> <i class="fas fa-cloud-sun"></i>
                                        {{ getTempratureData() }}°C
                                        / {{ getTempratureData() * 1.8 + 32 }}°F 
                                    </li>
                                </ul>
                            </div>

                            <div class="col-3">

                                <ul class="header-contact">

                                    <li class="set_lang">
                                        <form method="post" action="">
                                            <span>
                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.HOME_PAGE.SELECT_LANGUAGE') }}
                                                @else
                                                    {{ Config::get('english.HOME_PAGE.SELECT_LANGUAGE') }}
                                                @endif
                                            </span>
                                            <strong>
                                                <select name="language" id="language">
                                                    <option value="">Select Language</option>
                                                    <option value="en" <?php if ($language == 'en') {
                                                        echo 'selected';
                                                    }
                                                    ?>>English</option>
                                                    <option value="mar" <?php if ($language == 'mar') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Marathi</option>
                                                </select>
                                            </strong>
                                        </form>
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>
    <!--Header End-->

    <!-- <div class="container-fluid">
        <div class="row nav-pd">
            <div class="col-md-12 nav-pd-col navbar_bg-color">
                <nav class="navbar navbar-expand-lg">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse nav-center" id="navbarSupportedContent">
                        @foreach ($menu as $key => $menu_data)
                            @foreach ($menu_data as $key => $menu_data_new)
                                <ul class="navbar-nav mr-auto">
                                    @if ($key == '0')
                                        <li class="nav-item dropdown">
                                            <a class="nav-link 
                                            @if (sizeof($menu_data[1]) > 0) dropdown-toggle @endif"
                                                href="@if ($menu_data_new['is_static'] == true) {{ $menu_data_new['url'] }} 
                                                      @else 
                                                      {{ url('/pages/' . $menu_data_new['url']) }} @endif"
                                                id="" role="button"
                                                @if (sizeof($menu_data[1]) > 0) data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false" @endif>
                                                @if (session('language') == 'mar')
                                                    {{ $menu_data_new['menu_name_marathi'] }}
                                                @else
                                                    {{ $menu_data_new['menu_name_english'] }}
                                                @endif
                                            </a>
                                            @if (sizeof($menu_data[1]) > 0)
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    @foreach ($menu_data[1] as $key => $menu_data_sub)
                                                        <a class="dropdown-item"
                                                            href="@if ($menu_data_sub['is_static'] == true) {{ url($menu_data_sub['url']) }} 
                                                      @else 
                                                          {{ url('/pages/' . $menu_data_sub['url']) }} @endif 
                                                      "
                                                            target="_self" title="">
                                                            @if (session('language') == 'mar')
                                                                {{ $menu_data_sub['menu_name_marathi'] }}
                                                            @else
                                                                {{ $menu_data_sub['menu_name_english'] }}
                                                            @endif
                                                        </a>
                                                        
                                                    @endforeach

                                                </div>
                                            @endif
                                        </li>
                                    @endif
                                </ul>
                            @endforeach
                        @endforeach
                    </div>
                </nav>

            </div>
        </div>
</div>
</div>
</header> -->
<!--Header End-->

<div class="container-fluid">
    <div class="row nav-pd">
        <div class="col-md-12 nav-pd-col navbar_bg-color">
            <nav id="navbar_top" class="navbar navbar-expand-lg">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav-center" id="navbarSupportedContent">
                    @foreach ($menu as $key => $menu_data)
                    @foreach ($menu_data as $key => $menu_data_new)
                    <ul class="navbar-nav mr-auto">
                        @if ($key == '0')
                        <li class="nav-item dropdown">
                            <a class="nav-link 
                                            @if (sizeof($menu_data[1]) > 0) dropdown-toggle @endif" href="@if ($menu_data_new['is_static'] == true) {{ $menu_data_new['url'] }} 
                                                      @else 
                                                      {{ url('/pages/' . $menu_data_new['url']) }} @endif" id=""
                                role="button" @if (sizeof($menu_data[1])> 0) data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false" @endif>
                                @if (session('language') == 'mar')
                                {{ $menu_data_new['menu_name_marathi'] }}
                                @else
                                {{ $menu_data_new['menu_name_english'] }}
                                @endif
                            </a>
                            @if (sizeof($menu_data[1]) > 0)
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($menu_data[1] as $key => $menu_data_sub)
                                <a class="dropdown-item" href="@if ($menu_data_sub['is_static'] == true) {{ url($menu_data_sub['url']) }} 
                                                      @else 
                                                          {{ url('/pages/' . $menu_data_sub['url']) }} @endif 
                                                      " target="_self" title="">
                                    @if (session('language') == 'mar')
                                    {{ $menu_data_sub['menu_name_marathi'] }}
                                    @else
                                    {{ $menu_data_sub['menu_name_english'] }}
                                    @endif
                                </a>
                                <!-- <hr class="gap-drop-menu"> -->
                                @endforeach

                            </div>
                            @endif
                        </li>
                        @endif
                    </ul>
                    @endforeach
                    @endforeach
                </div>
            </nav>

        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        document.getElementById('navbar_top').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbar_top').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
});
</script>
