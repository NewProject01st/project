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
                            Sub Header Info
                        </h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                        <div>
                            <a href="{{ route('list-sub-header-info') }}" class="btn btn-sm btn-primary ml-3">Back</a>
                        </div>
                    </div>

                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>English Toll Free Title :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->english_tollfree_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Marathi Toll Free Title :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->marathi_tollfree_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>English Toll Free No :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->english_tollfree_no ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Marathi Toll Free No :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->marathi_tollfree_no ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>English City Title :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->english_city_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Marathi City Title :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->marathi_city_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>English City :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->english_city ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Marathi City :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $subheader_info->marathi_city ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label> English Image :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="{{ asset('websitedocument/images/header/sub-header/' . $subheader_info->english_logo) }}"
                                            style="width:70px; height:70px;" />
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label> Marathi Image:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 pt-2">
                                        <img src="{{ asset('websitedocument/images/header/sub-header/' . $subheader_info->marathi_logo) }}"
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