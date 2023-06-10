    @extends('website.layout.master')
    
    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>About Us </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li>Disaster Management Portal </li>
                </ul>
            </div>
        </section>
        <!--Subheader End-->
        <!--Main Content Start-->
        <div class="main-content p60 sit_map_set">
            <!--Department Details Page Start-->
            <div class="department-details">
                <div class="container sit_map_bor">

                    @foreach ($menu as $key => $menu_data)
                    @foreach ($menu_data as $key => $menu_data_new)
                    <ul class="navbar-nav mr-auto center_sit_map">
                        @if ($key == '0')
                        <li class="nav-item dropdown">
                            <a class="nav-link sit_map_link 
                                            @if (sizeof($menu_data[1]) > 0) dropdown-toggle sit_map_dropdown_toggle @endif" href="@if ($menu_data_new['is_static'] == true) {{ $menu_data_new['url'] }} 
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
                                <a class="dropdown-item dropdown-item-custom" href="@if ($menu_data_sub['is_static'] == true) {{ url($menu_data_sub['url']) }} 
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
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->

    @endsection
