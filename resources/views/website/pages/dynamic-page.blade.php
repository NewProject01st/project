@extends('website.layout.master')
@section('content')
    <style>
        img {
            width: 50% !important;
            float: left;
            height: 45% !important;
            /* margin-top: 1% !important; */
            margin-right: 3% !important;
            /* margin-bottom: 0% !important; */
            border-radius: 10px !important;
        }

        h2 {
            margin-top: 0% !important;
            /* margin-top: 1% !important; */
            /* color: #e53b43 !important; */
        }

        p {
            margin-bottom: 0px !important;
            color: #5e5c5c !important;
        }

        .gap-top {
            margin-top: 10px;
        }
    </style>

    <div class="container gap-top">
        <div class="row">
            <div class="col-md-12">
                @include($dynamic_page)
            </div>
        </div>
    </div>
@endsection
