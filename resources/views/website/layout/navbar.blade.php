<?php $data_output_websitelogo = App\Http\Controllers\Website\IndexController::getWebsiteLogo();
$data_output_tollfreenumber = App\Http\Controllers\Website\IndexController::getWebTollFreeNumber();
// print_r($data_output_tollfreenumber);
// die();
?>
<div class="wrapper">
    <!--Header Start-->
    <header class="wf100 header-two">
        <div id="closetopbar" class="topbar wf100">
            <div class="container-fluid">
                <div class="row head_row">
                    <div class="col-6 d-flex align-items-center new_head_ul">

                        <ul class="quick-links">
                            <li><a href="{{ route('site-map') }}">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.SITE_MAP.SITE_MAP') }}
                                    @else
                                        {{ Config::get('english.SITE_MAP.SITE_MAP') }}
                                    @endif
                                </a></li>
                            <li><a href="{{ route('list-vacancies') }}">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.VACANCIES.VACANCIES') }}
                                    @else
                                        {{ Config::get('english.VACANCIES.VACANCIES') }}
                                    @endif
                                </a></li>
                            <li><a href="{{ route('report-incident-crowdsourcing-web') }}">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.NAVBAR.REPORT_IT') }}
                                    @else
                                        {{ Config::get('english.NAVBAR.REPORT_IT') }}
                                    @endif
                                </a></li>
                            <li><a href="{{ route('list-rti') }}">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.RTI.RTI_MAIN_LINK') }}
                                    @else
                                        {{ Config::get('english.RTI.RTI_MAIN_LINK') }}
                                    @endif
                                </a></li>
                        </ul>

                    </div>
                    <div class="col-4 d-flex align-items-center new_head_ul2">

                        <ul class="quick-links">
                            <li><a href="#">

                                    @foreach ($data_output_tollfreenumber as $item)
                                        @if (session('language') == 'mar')
                                            <span><?php echo $item['marathi_tollfree_no']; ?></span>
                                        @else
                                            <span><?php echo $item['english_tollfree_no']; ?></span>
                                        @endif
                                    @endforeach
                                    {{-- @if (session('language') == 'mar')
                                        {{ Config::get('marathi.NAVBAR.TOLL_FREE') }}
                                    @else
                                        {{ Config::get('english.NAVBAR.TOLL_FREE') }}
                                    @endif --}}
                                </a></li>

                                {{-- <li class="nav-item d-lg-block d-none navigationPaddingWeb">
                                    <span title="Magnifier">
                                      <div onclick="handleChange11()" class="textColourMenu" style="cursor: pointer;">
                                        <svg width="20" height="20" viewBox="0 0 22 22" stroke="currentColor" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M21 21L16.2779 16.2695L21 21ZM18.8947 9.94737C18.8947 12.3204 17.9521 14.5962 16.2741 16.2741C14.5962 17.9521 12.3204 18.8947 9.94737 18.8947C7.57438 18.8947 5.29858 17.9521 3.62062 16.2741C1.94267 14.5962 1 12.3204 1 9.94737C1 7.57438 1.94267 5.29858 3.62062 3.62062C5.29858 1.94267 7.57438 1 9.94737 1C12.3204 1 14.5962 1.94267 16.2741 3.62062C17.9521 5.29858 18.8947 7.57438 18.8947 9.94737V9.94737Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <?php //echo $showbutton; ?>
                                      </div>
                                    </span>
                                  </li> --}}
                                  
                        </ul>
                        <button class="webpage_zoom_btn" id="zoomouttextbody">A-</button>
                        <button class="webpage_zoom_btn" id="zoomtextbody">A+</button>

                    </div>
                    <div class="col-2 set_volunteer">
                        <a href="{{ route('add-volunteer-citizen-support-web') }}" class="become-vol">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.NAVBAR.BECOME_VOLUNTEER') }}
                            @else
                                {{ Config::get('english.NAVBAR.BECOME_VOLUNTEER') }}
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="h3-logo-row wf100">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <ul class="header-contact new_city_head_change">
                            <li class="city-exp for_pl_pr"> <i class="fas fa-street-view"></i>
                                <strong>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.HOME_PAGE.CITY') }}
                                    @else
                                        {{ Config::get('english.HOME_PAGE.CITY') }}
                                    @endif
                                </strong>
                            </li>
                            <li class="header-weather for_pl_pr"> <i class="fas fa-cloud-sun"></i>
                                {{ getTempratureData() }}°C
                                / {{ getTempratureData() * 1.8 + 32 }}°F
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4">

                        @foreach ($data_output_websitelogo as $item)
                            @if (session('language') == 'mar')
                                <div class="h3-logo"> <a href="/">
                                        <img src="{{ Config::get('DocumentConstant.WEBSITE_LOGO_VIEW') }}{{ $item['logo'] }}"
                                            alt="" style="width: 50%;"></a></div>
                            @else
                                <div class="h3-logo"> <a href="/">
                                        <img src="{{ Config::get('DocumentConstant.WEBSITE_LOGO_VIEW') }}{{ $item['logo'] }}"
                                            alt="" style="width: 50%;"></a></div>
                            @endif
                        @endforeach
                    </div>

                    <div class="col-4 lang-position">
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-9 col-sm-9">
                                <ul class="header-contact new_city_head_change">
                                    <li class="city-exp for_pl_pr mt-3">

                                        <!-- <input type="text" placeholder="Search.." name="search" > -->
                                        <!-- <button class="btn btn-success btn-sm" type="submit">Go</button> -->
                                        <!-- <button type="submit"><i class="fa fa-search"></i></button> -->

                                    <form>
                                    <input type="search" placeholder="Search...">
                                    <button type="submit">Search</button>
                                    </form>

                                    {{-- <form action="{{ route('/') }}" method="GET">
                                        <input type="text" name="query" placeholder="Search...">
                                        <button type="submit">Search</button>
                                    </form>
                                     --}}

                                    {{-- <form method="GET" action="">
                                        <input type="search" name="query" placeholder="Search...">
                                        <button type="submit">Search</button>
                                    </form> --}}
                                    
                                    
                                {{-- </li>
                                        <form>
                                            <input type="search" placeholder="Search...">
                                            <button type="submit">
                                                @if (session('language') == 'mar')
                                                    {{ Config::get('marathi.NAVBAR.SEARCH') }}
                                                @else
                                                    {{ Config::get('english.NAVBAR.SEARCH') }}
                                                @endif
                                            </button>
                                        </form>
                                    </li> --}}
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

    {{-- <div class="container-fluid">
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
</header>  --}}
    <!--Header End-->

    <div class="container-fluid">
        <div class="row nav-pd">
            <div class="col-md-12 nav-pd-col navbar_bg-color">
                <nav id="navbar_top" class="navbar navbar-expand-lg">

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
    document.addEventListener("DOMContentLoaded", function() {
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

{{-- <script>
    var showbutton = false;
  
    function handleChange11() {
        alert('hii');
      showbutton = !showbutton;
  
      if (showbutton === true) {
        var magnifier = window.HTMLMagnifier({ width: 400 });
        magnifier.show();
      } else {
        var element = document.getElementById("magnifier");
        element.remove();
  
        var list = document.getElementById("magnifier");
        list.removeChild(list.lastElementChild);
      }
    }
  </script> --}}
  
{{-- <script>
    const handleChange11 = () => {
        setShowButton(showbutton ? false : true);
        // alert(showbutton)
       if(showbutton== true){
                const magnifier =  window.HTMLMagnifier({ width: 400 });
                magnifier.show()
                // alert("in show")
    
               } else {
                // document.getElementByClass("magnifier").style.display='none'
                // alert("in hide")
    
                const element = document.getElementById("magnifier");
                element.remove();
    
                const list = document.getElementById("magnifier");
                list.removeChild(list.lastElementChild);
               }             
           };
          </script> --}}