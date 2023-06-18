@extends('website.layout.master')
@section('content')
    <style>
        img {
            width: 100%;
            justify-content: center;
            /* display: flex; */
            /* margin-bottom:25px; */
        }

        .gap-top {
            margin-top: 50px;
        }
    </style>
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.CONTACT_US.CONTACT_US_HEADING') }}
                @else
                    {{ Config::get('english.CONTACT_US.CONTACT_US_HEADING') }}
                @endif
            </h2>
            <ul>

                <li> <a href="{{ route('index') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.CONTACT_US.CONTACT_US_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.CONTACT_US.CONTACT_US_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.CONTACT_US.CONTACT_US_SUB_LINK2') }}
                    @else
                        {{ Config::get('english.CONTACT_US.CONTACT_US_SUB_LINK2') }}
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12  gap-top">
                <img src="{{ asset('website_files/assets/pages/404.png') }}">
            </div>
        </div>
    </div>
@endsection
