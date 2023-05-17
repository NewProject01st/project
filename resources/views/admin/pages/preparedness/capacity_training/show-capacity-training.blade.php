@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row justify-content-center">
            <div class="col-7 grid-margin ">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                        <h3 class="page-title">
                            Capacity Building And Training
                        </h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                        <div>
                            <a href="{{ route('list-capacity-building-and-training') }}"
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
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $capacity_training->english_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Title Marathi :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $capacity_training->marathi_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Description English :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $capacity_training->english_description ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Description Marathi :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $capacity_training->marathi_description ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label> English Image :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="{{ asset('storage/images/capacity-training/' . $capacity_training->english_image) }}"
                                            style="width:70px; height:70px;" />
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label> Marathi Image:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 pt-2">
                                        <img src="{{ asset('storage/images/capacity-training/' . $capacity_training->marathi_image) }}"
                                            style="width:70px; height:70px;" />
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