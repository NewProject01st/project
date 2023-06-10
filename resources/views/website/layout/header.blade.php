<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        My Website
    </title>
    <?php
    $common_data = App\Http\Controllers\Website\IndexController::getCommonWebData();
    ?>

<?php 
    $metadata = App\Models\Metadata::first()
     ?>
     <meta name="english_name" content="{{ $metadata->english_name}}">
     
     <meta name="keywords" content="{{ $metadata->keywords}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="{{ asset('website_files/bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/custom.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('website_files/asset/js/jquery.min.js') }}"></scripthttps:>
    <script src="{{ asset('website_files/asset/js/bootstrap.js') }}"></script>
    <script src="{{ asset('website_files/ajax/libs/jquery/1.12.2/jquery.min.js') }}"></script>
    <script src="{{ asset('website_files/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/jquery.totemticker.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('website_files/asset/images/favicon.png') }}" />
    <script src="{{ asset('website_files/asset/js/jquery.totemticker.js') }}"></script> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
   {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('website_files/assets/bootstrap-5.0.2-dist/css/bootstrap.css') }}" type="text/css"
        rel="stylesheet">
    <link href="{{ asset('website_files/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" type="text/css"
        rel="stylesheet">
    <link href="{{ asset('website_files/assets/font-awesome.min') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('website_files/assets/bootstrap-5.0.2-dist/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="{{ asset('website_files/assets/css/all.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/custom.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/responsive.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/color.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('website_files/assets/css/slick.css') }}" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <!-- webpage A+ A- button script -->
        <style type="text/css">
        #zoomtext {
            transform: scale(1);
            transition: transform 0.2s ease-in-out;
        }
    </style>
   
    <!-- end webpage A+ A- button script -->

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
