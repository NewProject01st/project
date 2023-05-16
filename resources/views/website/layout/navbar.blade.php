<!-- <nav class="navbar navclr affix-top" data-spy="affix" data-offset-top="197">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar bg-danger"></span>
                <span class="icon-bar bg-danger"></span>
                <span class="icon-bar bg-danger"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav nav-menu ">

                {{-- @foreach ($menu as $key => $menu_data)
                    @foreach ($menu_data as $key => $menu_data_new)
                        <li class="dropdown">
                            @if ($key == '0')
                                <a
                                href=" {{ url($menu_data_new['url']) }} "
                                {{-- href="{{ url($menu_data_new['url']) }}" --}}
                                 id="" class="dropdown-toggle"
                                    data-toggle="dropdown" title="About Us" target="_self">
                                    {{-- @if (session('language') == 'mar')
                                        {{ $menu_data_new['menu_name_marathi'] }}
                                    @else
                                        {{ $menu_data_new['menu_name_english'] }}
                                    @endif

                                    @if (sizeof($menu_data_new) > 1)
                                        <b id="UcMenu_rep1_bParent_0" class="caret"></b>
                                    @endif --}}
                                </a>
                            {{-- @endif
                            @if (sizeof($menu_data) > 1) --}}
                                <ul class="dropdown-menu">
                                    {{-- @foreach ($menu_data[1] as $key => $menu_data_sub)
                                        <li id="">


                                            <a href="
                                             @if ($menu_data_sub['is_static'] == true) {{ url($menu_data_sub['url']) }} 
                                            @else 
                                                {{ url('/pages/' . $menu_data_sub['url']) }} @endif 
                                            "
                                                target="_self" title="">
                                                <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                                @if (session('language') == 'mar')
                                                    {{ $menu_data_sub['menu_name_marathi'] }}
                                                @else
                                                    {{ $menu_data_sub['menu_name_english'] }}
                                                @endif --}}

                                            </a>
                                        </li>
                                    {{-- @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                @endforeach --}}
                <div> --}}
                    {{-- @foreach ($data_output as $item)
                        <div>
                            @if (session('language') == 'mar')
                                {{ $item['marathi_title'] }}
                            @else
                                {{ $item['english_title'] }}
                            @endif

                        </div>
                    @endforeach --}}
            </ul>
        </div>
    </div>
</nav> -->

{{-- ============================ --}}
<div class="wrapper"> 
    <!--Header Start-->
    <header class="wf100 header-two">
      <div id="closetopbar" class="topbar wf100">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-7">
              <p>Become a <a href="#">Volunteer</a> <a href="#">Now !</a></p>
            </div>
            <div class="col-md-6 col-sm-5"> <a id="closebtn" href="#" class="cross-btn"><i class="fa fa-times"></i></a> <a href="#" class="become-vol">Become a Volunteer</a> </div>
          </div>
        </div>
      </div>
      <div class="h3-logo-row wf100">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <ul class="quick-links">
                <li><a href="#">Site Map</a></li>
                <li><a href="#">Vacancies</a></li>
                <li><a href="#">Report It</a></li>
                <li><a href="#">RTI</a></li>
              </ul>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="h3-logo"> <a href="index.html"><img src="{{ asset('website_files/images/home/DMS.png') }}"  alt="" style="width: 50%;"></a></div>
            </div>
            <div class="col-md-4 col-sm-4">
              <ul class="header-contact">
                <li><span>Toll Free:</span> <strong>0000 00000</strong></li>
                <li class="city-exp"> <i class="fas fa-street-view"></i> <strong>City<br>
                  Name</strong> </li>
                <li class="header-weather"> <i class="fas fa-cloud-sun"></i> 24°C / 75°F </li>
             
                <li>
                    <strong>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.SELECT_LANGUAGE') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.SELECT_LANGUAGE') }}
                        @endif
                    </strong>
                </li>
                <li>
                    <select name="language" id="language">
                        <option value="">Slect language</option>
                        <option value="en" <?php if ($language == 'en') {
                        echo 'selected';
                    }
                        ?>>English</option>
                        <option value="mar"<?php if ($language == 'mar') {
                        echo 'selected';
                        }
                        ?>>Marathi</option>
                    </select>
                </li>            
            </ul>




              {{-- <ul>
                <li>
                    <strong>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.SELECT_LANGUAGE') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.SELECT_LANGUAGE') }}
                        @endif
                    </strong>
                </li>
                <li>
                    <select name="language" id="language">
                        <option value="">Slect language</option>
                        <option value="en" <?php if ($language == 'en') {
                        echo 'selected';
                    }
                        ?>>English</option>
                        <option value="mar"<?php if ($language == 'mar') {
                        echo 'selected';
                        }
                        ?>>Marathi</option>
                    </select>
                </li>
            </ul> --}}

            </div>
          </div>
        </div>
      </div>
  
    </header>
    <!--Header End--> 
  
      <div class="container-fluid">
          <div class="row nav-pd">
              <div class="col-md-12 nav-pd-col">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                      
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
  
                      <div class="collapse navbar-collapse nav-center" id="navbarSupportedContent">
                      @foreach ($menu as $key => $menu_data)
                          @foreach ($menu_data as $key => $menu_data_new)
                              <ul class="navbar-nav mr-auto">
                              @if ($key == '0')
                                  <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          @if (session('language') == 'mar')
                                              {{ $menu_data_new['menu_name_marathi'] }}
                                          @else
                                              {{ $menu_data_new['menu_name_english'] }}
                                          @endif
                                      </a>
                                      @if (sizeof($menu_data) > 1)
                                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                              @foreach ($menu_data[1] as $key => $menu_data_sub)
                                                  <a class="dropdown-item"  href="@if ($menu_data_sub['is_static'] == true) {{ url($menu_data_sub['url']) }} 
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
 


