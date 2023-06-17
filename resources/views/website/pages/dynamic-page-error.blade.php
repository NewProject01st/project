@extends('website.layout.master')
@section('content')
    <style>
        img {
            width: 100%;
            justify-content: center;
            /* display: flex; */
            /* margin-bottom:25px; */
        }

     
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('website_files/assets/pages/404.png') }}">
            </div>
        </div>
    </div>
@endsection
