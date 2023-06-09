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



                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item custom-accordion-item">
                            <h2 class="accordion-header accordion-header-custom" id="flush-headingOne">
                            <button class="accordion-button accordion-button-custom collapsed bg-secondary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Accordion Item #1
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse bg-secondary-custom" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul class="site_ul">
                                        <li class="site_li"> <i class="fas fa-user-tie"></i> Lorem Ipsum</li>
                                        <li class="site_li"> <i class="far fa-building"></i> 93002 Green Avenue</li>
                                        <li class="site_li"> <i class="fas fa-phone"></i> 333 111 333</li>
                                        <li class="site_li"> <i class="fas fa-fax"></i> 777 555 666 </li>
                                        <li class="site_li"> <i class="far fa-envelope"></i> office@dms.org </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item custom-accordion-item">
                            <h2 class="accordion-header accordion-header-custom" id="flush-headingTwo">
                            <button class="accordion-button accordion-button-custom collapsed bg-secondary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Accordion Item #2
                            </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse bg-secondary-custom" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                            </div>
                        </div>
                        <div class="accordion-item custom-accordion-item">
                            <h2 class="accordion-header accordion-header-custom" id="flush-headingThree">
                            <button class="accordion-button accordion-button-custom collapsed bg-secondary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Accordion Item #3
                            </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse bg-secondary-custom" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Placeholder content for this accordion, which is intended to demonstrate the accordion-flus class.</div>
                            </div>
                        </div>
                    </div>
                
               

                  
                </div>
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->

    @endsection
