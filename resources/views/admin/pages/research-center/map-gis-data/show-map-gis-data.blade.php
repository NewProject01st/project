@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                MAP Lat Data
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-map-lat-lons') }}" class="btn btn-sm btn-primary ml-3">Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Latitude :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($map_gis->lat) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Longitude :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($map_gis->lon) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Location Name :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($map_gis->location_name_english) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>स्थानाचे नाव :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($map_gis->location_name_marathi) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Location Address :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($map_gis->location_address_english) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>स्थान पत्ता :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($map_gis->location_address_marathi) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Map Link :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label style="width: 100%;">{{ strip_tags($map_gis->google_map_link) }}</label>
                                        </div>
                                    </div>
                                    {{-- <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Data For :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($map_gis->data_for) }}</label>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    @endsection
