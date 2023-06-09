@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                Emergency Contact Numbers
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-emergency-contact-numbers') }}"
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
                                            <label>Title English :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label><?php echo $emergencycontactnumbers->english_title; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Title Marathi :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label><?php echo $emergencycontactnumbers->marathi_title; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Description English :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label><?php echo $emergencycontactnumbers->english_description; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Description Marathi :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label><?php echo $emergencycontactnumbers->marathi_description; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Description Marathi :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <label><?php echo $data_output_array->english_emergency_contact_title; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Image English :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <img src="{{ asset('storage/images/emergency-response/emergency-contact-numbers/' . $emergencycontactnumbers->english_image) }}"
                                                style="width:70px; height:70px;" />
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label>Image Marathi :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pt-2">
                                            <img src="{{ asset('storage/images/emergency-response/emergency-contact-numbers/' . $emergencycontactnumbers->marathi_image) }}"
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
