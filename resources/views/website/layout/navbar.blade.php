<nav class="navbar navclr affix-top" data-spy="affix" data-offset-top="197">
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

                @foreach ($menu as $key => $menu_data)
                    @foreach ($menu_data as $key => $menu_data_new)
                        <li class="dropdown">
                            @if ($key == '0')
                                <a href="{{ url($menu_data_new['url']) }}" id="" class="dropdown-toggle"
                                    data-toggle="dropdown" title="About Us" target="_self">
                                    @if (session('language') == 'mar')
                                        {{ $menu_data_new['menu_name_marathi'] }}
                                    @else
                                        {{ $menu_data_new['menu_name_english'] }}
                                    @endif

                                    @if (sizeof($menu_data_new) > 1)
                                        <b id="UcMenu_rep1_bParent_0" class="caret"></b>
                                    @endif
                                </a>
                            @endif
                            @if (sizeof($menu_data) > 1)
                                <ul class="dropdown-menu">
                                    @foreach ($menu_data[1] as $key => $menu_data_sub)
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
                                                @endif

                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                @endforeach
                <div>
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
</nav>
