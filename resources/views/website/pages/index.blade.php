<div class="container-fluid page-body-wrapper">
    @include('website.layout.header')
    @include('website.layout.navbar')
    @yield('content')
    @extends('website.layout.footer')
{{-- <!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        My Website
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('website_files/bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/custom.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('website_files/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/bootstrap.js') }}"></script>
    <script src="{{ asset('website_files/ajax/libs/jquery/1.12.2/jquery.min.js') }}"></script>
    <script src="{{ asset('website_files/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/jquery.totemticker.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('website_files/asset/images/favicon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php //echo '<pre>'; print_r($menu);
    ?>

    <form method="post" action="" id="form1">

        <a href="" class="simple-back-to-top"></a>

        <div class="header">
            <div class="container-fluid">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <a href="">
                        <img src="{{ asset('website_files/full-logo-1.png') }}" id="UcMenu_imgLogo"
                            class="img-responsive" alt="Disaster Management Authority"
                            title="Disaster Management Authority">
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-header">

                    <div class="col-sm-2"><img src="{{ asset('website_files/G-20-Summit-India.png') }}"
                            style="border: solid 1px #ccc; background: white; height: 75px;"></div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="upper-column info-box ">
                            <div class="icon-box">
                                <i class="fa fa-phone"></i>
                            </div>
                            <ul>
                                <li>
                                    <strong>
                                        <a href="">Emergency Toll free number</a>
                                    </strong>
                                </li>
                                <li>State Control Room - 1070
                                </li>
                                <li>District EOC'<sub>s</sub>
                                    - &lt;STD CODE&gt; + 1077
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="upper-column info-box  center-block text-center">


                            <div class="icon-box ">
                                <i class="fa fa-language" aria-hidden="true"></i>
                            </div>

                            <form method="post" action="">

                                <ul>
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
                                            } ?>>English</option>
                                            <option value="mar"<?php if ($language == 'mar') {
                                                echo 'selected';
                                            } ?>>Marathi</option>
                                        </select>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="upper-column info-box text-left zeromarg  " style="padding-left:10px;">
                            <span class="accesibility-area">

                                <a href="" id="linkDecrease" onclick="myFunction1()">
                                    <img src="{{ asset('website_files/textsize-decrease.png') }}"
                                        class="img-responsive" height="24" width="24"></a>
                                <a href="" id="linkIncrease" onclick="myFunction()">
                                    <img src="{{ asset('website_files/textsize-increase.png') }}"
                                        class="img-responsive" height="24" width="24"></a>
                                <a href="" id="linkReset" onclick="myFunction2()">
                                    <img src="{{ asset('website_files/color-01.png') }}" class="img-responsive"
                                        height="24" width="24"></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                        <a href="{{ url($menu_data_new['url']) }}" id=""
                                            class="dropdown-toggle" data-toggle="dropdown" title="About Us"
                                            target="_self">
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
                                                     @if ($menu_data_sub['is_static'] == true) {{url($menu_data_sub['url'])}} 
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



                    </ul>
                </div>
            </div>
        </nav>

    </form>



    <script type="text/javascript">
        $("#language").change(function() {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ env('APP_URL') }}/change-language",
                cache: false,
                success: function(response) {
                    location.reload();
                },
                data: {
                    'language': $("#language").val()
                },
                error: function(errorResponse) {
                    swal({
                        titile: "Error!",
                        text: "Something Went Wrong",
                        icon: "error",
                        button: "Ok",
                    });
                }
            });


        });
    </script>
</body>

</html> --}}
