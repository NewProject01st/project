<!DOCTYPE html>
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
<?php echo '<pre>'; ?>
{{print_r($menu)}}
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

                        <li>
                            <a href="">
                                Home

                            </a>
                        </li>

                        <li id="UcMenu_rep1_liParent_0" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_0" class="dropdown-toggle" data-toggle="dropdown"
                                title="About Us" target="_self">

                                About Us
                                <b id="UcMenu_rep1_bParent_0" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_0_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Introduction to the disaster management portal
                                    </a>

                                </li>

                                <li id="UcMenu_rep1_rep2_0_liparent_1">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Objective and Goals
                                    </a>

                                </li>

                                <li id="UcMenu_rep1_rep2_0_liparent_2">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        State disaster management authority (SDMA) structure and organization</a>

                                </li>

                            </ul>

                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Disasters
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Types of disasters (Natural and Man-made)
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Earthquakes
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Floods
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Cyclones
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Droughts
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Landslides
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Industrial accidents
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Fires
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Disaster history and statistics for the state
                                    </a>
                                </li>
                            </ul>
                        </li>




                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Preparedness
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Hazard and vulnerability assessment
                                    </a>
                                </li>


                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Early warning systems
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Capacity building and training
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Public awareness and education
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Emergency Response
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">


                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        State Emergency Operations Center (EOC)
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        District Emergency Operations Center (DEOC)
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Emergency contact numbers
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Search and rescue teams
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Relief measures and resources
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Evacuation plans
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Citizen Action
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Report a Incident : Crowdsourcing
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Be a Volunteer : Citizen Support
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;

                                        Feedback and suggestions
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Training Workshops
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Upcoming events and trainings
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Past Events and Trainings
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Policies and Legislation
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        State disaster management plan
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        District disaster management plans
                                    </a>
                                </li>


                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        State disaster management policy
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Relevant laws and regulations
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Resource Center
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Documents and publications
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Maps and GIS data
                                    </a>
                                </li>
                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Videos and multimedia
                                    </a>
                                </li>
                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Training materials and workshops
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                News & Events
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Latest news related to disaster management
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Upcoming events and trainings
                                    </a>
                                </li>


                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Success stories and case studies
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="UcMenu_rep1_liParent_1" class="dropdown">
                            <a href="" id="UcMenu_rep1_aParent_1" class="dropdown-toggle"
                                data-toggle="dropdown" target="_self">
                                Contact Us
                                <b id="UcMenu_rep1_bParent_1" class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Contact information for SDMA
                                    </a>
                                </li>

                                <li id="UcMenu_rep1_rep2_1_liparent_0">
                                    <a href="" target="_self" title="">
                                        <span class="glyphicon glyphicon-menu-right"></span>&nbsp;
                                        Feedback and suggestions
                                    </a>
                                </li>
                            </ul>
                        </li>

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

</html>
