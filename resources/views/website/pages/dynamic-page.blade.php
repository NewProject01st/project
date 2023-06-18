@extends('website.layout.master')
@section('content')
    <style>
        img {
            height: 45% !important;
            margin-top: 1% !important;
            margin-right: 3% !important;
            float: left;
            border-radius: 5px;
        }

        address {
            padding-top: 10%;
        }

        h2 {
            margin-top: 0% !important;
            /* margin-top: 1% !important; */
            /* color: #e53b43 !important; */
        }

        p {
            margin-bottom: 0px !important;
        }

        .gap-top {
            margin-top: 50px;
        }

        .gap-bottom {
            margin-bottom: 50px;
        }
    </style>

    <section class="wf100 subheader gap-bottom">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.CONTACT_US.CONTACT_US_HEADING') }}
                @else
                    {{ Config::get('english.CONTACT_US.CONTACT_US_HEADING') }}
                @endif
            </h2>
            <ul>
                <h6 style="color: white">
                    {{ $page_title }}
                </h6>
            </ul>
        </div>
    </section>

    <div class="container gap-top">
        <div class="row">
            <div class="col-md-12">
                @include($dynamic_page)
            </div>
        </div>
    </div>
@endsection
