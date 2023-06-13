@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                Relevant Laws And Regulation
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-relevant-laws-and-regulations') }}"
                                    class="btn btn-sm btn-primary ml-3">Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Title English :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($relevant_laws->english_title) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Title Marathi :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($relevant_laws->marathi_title) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Description English :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($relevant_laws->english_description) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Description Marathi :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($relevant_laws->marathi_description) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> English Image :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <img src="{{ Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_VIEW') }}{{ $relevant_laws->english_image }}"
                                                style="width:300px; height:150px;" />
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> Marathi Image:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pt-2">
                                            <img src="{{ Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_VIEW') }}{{ $relevant_laws->marathi_image }}"
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
