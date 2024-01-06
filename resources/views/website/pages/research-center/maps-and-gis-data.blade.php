    @extends('website.layout.master')
    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_HEADING') }}
                    @else
                        {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_HEADING') }}
                    @endif
                </h2>
                <ul>
                    <li> <a href="{{ route('maps-and-gis-data') }}">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                            @else
                                {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                            @endif
                        </a> </li>
                    <li>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK2') }}
                        @else
                            {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK2') }}
                        @endif
                    </li>
                </ul>
            </div>
        </section>
        <!--Subheader End-->
        <!--Main Content Start-->
        <div class="main-content p60">
            <!--Department Details Page Start-->
            {{-- <div class="department-details">
                <div class="container">
                    <div class="row deprt-txt">
                        <h3 class="stitle text-center d-flex justify-content-start">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.HOME_PAGE.MAPS_GIS_DATA') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.MAPS_GIS_DATA') }}
                            @endif
                        </h3>
                        <div class="col-md-12">
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3867187.666169696!2d76.76983739999999!3d18.81817715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1683036229388!5m2!1sen!2sin"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->
    @endsection
