@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                District Disaster Management Plan
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-district-disaster-management-plan') }}"
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
                                            <label>Title :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($district_management->english_title) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>शीर्षक :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label>{{ strip_tags($district_management->marathi_title) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>PDF :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a href="{{ Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_VIEW') }}{{ $district_management->english_pdf }}"
                                                target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}"
                                                    width="50px" height="50px"></a>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>पीडीएफ :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a href="{{ Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_VIEW') }}{{ $district_management->marathi_pdf }}"
                                                target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}"
                                                    width="50px" height="50px"></a>
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
