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
    <script src="{{ asset('website_files/ajax/libs/jquery/1.12.2/jquery.min.js') }}">
    </script>
    <script src="{{ asset('website_files/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_files/asset/js/jquery.totemticker.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('website_files/asset/images/favicon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    @include($dynamic_page)
</body>
</html>
