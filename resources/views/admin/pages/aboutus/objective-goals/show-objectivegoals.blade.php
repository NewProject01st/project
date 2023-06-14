@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row justify-content-center">
            <div class="col-7 grid-margin ">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                        <h3 class="page-title">
                            Objective Goals
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                        <div>
                            <a href="{{ route('list-objectivegoals') }}" class="btn btn-sm btn-primary ml-3">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Title English :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <label>{{ strip_tags($objectivegoals->english_title) }}</label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Title Marathi :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <label>{{ strip_tags($objectivegoals->marathi_title) }}</label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Description English :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <label>{{ strip_tags($objectivegoals->english_description) }}</label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Description Marathi :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <label>{{ strip_tags($objectivegoals->marathi_description) }}</label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Image English :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <img src="{{ Config::get('DocumentConstant.OBJECTIVE_GOALS_VIEW')}}{{$objectivegoals->english_image}}"
                                            style="width:300px; height:150px;" />
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Image Marathi :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 pt-2">
                                        <img src="{{ Config::get('DocumentConstant.OBJECTIVE_GOALS_VIEW')}}{{$objectivegoals->marathi_image}}"
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