
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
                    Tenders List 
                    </h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                 <div>
                 <a href="{{ route('tender.index') }}" class="btn btn-sm btn-primary ml-3">Back</a>
                 </div>
                </div>
              
        </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Tender Date :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>{{ $tender->tender_date }}</label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Title English :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>{{ $tender->english_title }}</label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Title Marathi :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>{{ $tender->marathi_title }}</label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Description English :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php  echo $tender->english_description; ?></label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Description Marathi :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php  echo $tender->marathi_description; ?></label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Start Date :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label> {{$tender->start_date}}</label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>End Date :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label> {{$tender->end_date}}</label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Open Date :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label> {{$tender->open_date}}</label>
                                    </div>
                                   </div>
                                   <div class="row ">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <label>Tender Number :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label> {{$tender->tender_number}}</label>
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

