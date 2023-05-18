<div class="wrapper">
    <!--Header Start-->
    <header class="wf100 header-two">
        <div id="closetopbar" class="topbar wf100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <p>Become a <a href="#">Volunteer</a> <a href="#">Now !</a></p>
                    </div>
                    <div class="col-md-6 col-sm-5"> <a id="closebtn" href="#" class="cross-btn"><i
                                class="fa fa-times"></i></a> <a href="#" class="become-vol">Become a Volunteer</a>
                    </div>
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
                        <div class="h3-logo"> <a href="index.html"><img
                                    src="{{ asset('website_files/images/home/DMS.png') }}" alt=""
                                    style="width: 50%;"></a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <ul class="header-contact">
                            <li><span>Toll Free:</span> <strong>0000 00000</strong></li>
                            <li class="city-exp"> <i class="fas fa-street-view"></i> <strong>City<br>
                                    Name</strong> </li>
                            <li class="header-weather"> <i class="fas fa-cloud-sun"></i> 24°C / 75°F </li>
                            <li>
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
                                    </strong>
                                </form>
                            </li>
                        </ul>
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
                                            <a class="nav-link dropdown-toggle" 
                                                    href="@if ($menu_data_new['is_static'] == true) {{ url($menu_data_new['url']) }} 
                                                      @else 
                                                          {{ url('/pages/' . $menu_data_new['url']) }} @endif 
                                                      "
                                                       id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                @if (session('language') == 'mar')
                                                    {{ $menu_data_new['menu_name_marathi'] }}
                                                @else
                                                    {{ $menu_data_new['menu_name_english'] }}
                                                @endif
                                            </a>
                                            @if (sizeof($menu_data) > 1)
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
