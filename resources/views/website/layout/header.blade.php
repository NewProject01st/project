<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        {{ env('APP_NAME') }}
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('website_files/images/home/DM.ico') }}">

    <?php
    $common_data = App\Http\Controllers\Website\IndexController::getCommonWebData();
    ?>

    <?php
    $metadata = App\Models\Metadata::first();
    ?>
    <meta name="english_name" content="{{ $metadata->english_name }}">
    
    <meta name="keywords"
        content="@if (isset($dynamic_meta_data)) {{ $dynamic_meta_data }} @else  {{ $metadata->keywords }} @endif">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{ asset('website_files/font-awesome.min.css') }}" type="text/css" rel="stylesheet"> --}}
   
    {{-- <link href="{{ asset('website_files/assets/css/slider.scss') }}" type="text/css" rel="stylesheet"> --}}
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link href="{{ asset('website_files/assets/bootstrap5.3.0/css/bootstrap.css') }}" type="text/css"
    rel="stylesheet">
    <link href="{{ asset('website_files/assets/bootstrap5.3.0/css/bootstrap.min.css') }}" type="text/css"
    rel="stylesheet">
    <script src="{{ asset('website_files/assets/bootstrap5.3.0/js/bootstrap.bundle.js') }}"></script>   --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


     <!-- <link href="{{ asset('website_files/assets/css/all.css') }}" type="text/css" rel="stylesheet">  -->
    <link href="{{ asset('website_files/assets/css/custom.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/responsive.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/color.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/slick.css') }}" type="text/css" rel="stylesheet">

    <link href="{{ asset('website_files/assets/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet">
    {{--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>--}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="{{ asset('website_files/assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('website_files/assets/js/jquery.validate.min.js') }}"></script>

    <!-- Add this in your HTML head section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>





<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4LNNNMTT0C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4LNNNMTT0C');
</script>

    <!-- webpage A+ A- button script -->
    <style type="text/css">
        #zoomtext {
            transform: scale(1);
            transition: transform 0.2s ease-in-out;
        }
    </style>
    <style>
        /* .city-exp {
           
        } */
        .serch-main ul li {
            border-right: none !important;
            padding: 1px 1px !important;
        }

        #search-results {
            position: absolute;
            /* translate: -10px 30px; */
            /* background: aliceblue; */
            /* background-color: #fff; */
            /* border: 1px solid #ccc; */
            /* padding: 10px; */
            /* position: absolute; */
            /* z-index: 999; */
            /* width: 100%; */
        }

        /* #search-results a {
            display: block;
            padding: 5px;
            color: #333;
            text-decoration: none;
        } */
    </style>

    <!-- end webpage A+ A- button script -->

    <script>
        $(document).ready(function() {

            // $("#language").change(function() {
                $(".website_language_select, .mobile_language_select").change(function() {
                var url_env = "{{ env('APP_URL') }}";

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // url: "http://52.66.216.5/change-language",
                     url: "https://nmcdm.org.in/change-language",
                    //  url: "https://newpro.sumagotest.in/change-language",
                    // url: "https://localhost/new_pro/change-language",
                    // url: "http://localhost/new_pro/project/change-language",
                    cache: false,
                    success: function(response) {
                        location.reload();
                    },
                    data: {
                    'language': $(this).val()
                   },
                    // data: {
                    //     'language': $("#language").val()
                    // },
                    error: function(errorResponse) {

                    }
                });
            });
        });
    </script>
</head>

<body>

    {{--
<?php

$url = 'https://api.open-meteo.com/v1/forecast?latitude=73.7898&longitude=19.9975&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m';

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case 'POST':
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case 'PUT':
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data) {
                $url = sprintf('%s?%s', $url, http_build_query($data));
            }
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, 'username:password');

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$frontsliderlist = CallAPI('get', $url);
$frontsliderlist = json_decode($frontsliderlist, true);
echo '<pre>';

print_r($frontsliderlist);
$key_tocheck = '';
foreach ($frontsliderlist['hourly'] as $key => $hour) {
    foreach ($hour as $key_new => $hour_new) {
        if ($hour_new == date('Y-m-d') . 'T' . date('H') . ':00') {
            $key_tocheck = $key_new;
        }
    }

    if ($hour = 'temperature_2m') {
        foreach ($hour as $key_temp => $hour_new) {
            if ($key_temp == $key_new) {
                $temp = $key_new;
            }
        }
    }
}
echo 'FInal key ' . $key_tocheck;
echo 'temp ' . $temp;
echo 'FInal key ' . date('Y-m-d') . 'T' . date('H') . ':00';
//$temp_final =  (9/5($temp - 273) + 32);
?>
    --}}

    <!-- <div class="header">
        <div class="container-fluid">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <a href="">
                    <img src="{{ asset('website_files/full-logo-1.png') }}" id="UcMenu_imgLogo" class="img-responsive"
                        alt="Disaster Management Authority" title="Disaster Management Authority">
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
                                        }
                                        ?>>English</option>
                                        <option value="mar"<?php if ($language == 'mar') {
                                            echo 'selected';
                                        }
                                        ?>>Marathi</option>
                                    </select>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="upper-column info-box text-left zeromarg  " style="padding-left:10px;">
                        <span class="accesibility-area">

                            <a href="" id="linkDecrease" onclick="myFunction1()">
                                <img src="{{ asset('website_files/textsize-decrease.png') }}" class="img-responsive"
                                    height="24" width="24"></a>
                            <a href="" id="linkIncrease" onclick="myFunction()">
                                <img src="{{ asset('website_files/textsize-increase.png') }}" class="img-responsive"
                                    height="24" width="24"></a>
                            <a href="" id="linkReset" onclick="myFunction2()">
                                <img src="{{ asset('website_files/color-01.png') }}" class="img-responsive"
                                    height="24" width="24"></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
