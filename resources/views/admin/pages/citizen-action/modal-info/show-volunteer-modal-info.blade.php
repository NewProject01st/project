@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                Be Volunteer
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-volunteer-modal-info') }}"
                                    class="btn btn-sm btn-primary ml-3">Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Incident Type :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->english_title) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Location :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->location) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Datetime :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->datetime) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Mobile Number :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->mobile_number) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Description :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->description) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Image :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pt-2">
                                            <img src="{{ Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_VIEW') }}{{ $volunteercitizen->media_upload }}"
                                                style="width:300px; height:150px;" />
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Mobile Number :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->mobile_number) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>NGO Name :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->ngo_name) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>NGO Email :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->ngo_email) }}</label>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>NGO Mobile Number :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($volunteercitizen->ngo_contact_number) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>NGO Mobile Number :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <img src="{{ Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_VIEW') }}{{ $volunteercitizen->ngo_photo }}"
                                            style="width:300px; height:150px;" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- content-wrapper ends -->
    @endsection
