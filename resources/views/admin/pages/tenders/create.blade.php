@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            Budget
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Constitution & History</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('tender') }}" method="post" id="regForm" enctype="multipart/form-data">
                        {!! csrf_field() !!}   
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title English</label>
                                        <input type="text" name="english_title" id="english_title" class="form-control" id="exampleInputUsername1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title Marathi</label>
                                        <input type="text" name="marathi_title" id="marathi_title" class="form-control" id="exampleInputUsername1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description English</label>
                                        <textarea class="form-control english_description"  name="english_description" id="english_description" placeholder="Enter the Description" name="english_description"></textarea>

                                      </div>
                                </div>
                             
                                <div class="col-md-6">
                                <div class="form-group">
                                <label> Description Marathi</label>
                                <textarea class="form-control marathi_description"  name="marathi_description" id="marathi_description" placeholder="Enter the Description"></textarea>
                            </div>
                           </div>
                           <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Tender Date</label>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="tender_date" id="tender_date"  required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Start Date</label>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="start_date" id="start_date"  required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">End Date</label>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="end_date" id="end_date"  required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Open Date</label>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="open_date"  id="open_date" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Tender Number</label>
                                        <input type="tel" class="form-control" placeholder="Tender Number" name="tender_number" id="tender_number"  required="">
                                    </div>
                                </div>
                                <div class="my-2">
                                    <input type="file" name="tender_pdf" id="tender_pdf" accept=".pdf" >
                                
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Tender Pdf</label><br>
                                        <input  name="tender_pdf" id="image" type="file" accept=" .pdf " required="" >

                                      </div>
                                </div> -->
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '.english_description' ) )
            .catch( error => {
                console.error( error );
            } );

            
    </script>
     <script>
        ClassicEditor
            .create( document.querySelector( '.marathi_description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                  english_title: {
                        required: true,
                        maxlength: 20,
                    },
                    marathi_title: {
                        required: true,
                        maxlength: 20,
                    },
                    english_description: {
                        required: true,
                        maxlength: 100,
                    },
                    marathi_description: {
                        required: true,
                        maxlength: 100,
                    },
                    tender_date: {
                        required: true,
                    },
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
                    open_date: {
                        required: true,
                    },
                    tender_number: {
                        required: true,
                    },
                    tender_pdf: {
                        required: true,
                    },
                   
                  },
                messages: {
                  english_title: {
                        required: "Title name is required",
                        maxlength: "First name cannot be more than 20 characters"
                    },
                    marathi_title: {
                      required: "Title name is required",
                        maxlength: "Last name cannot be more than 20 characters"
                    },
                    english_description: {
                      required: "Title name is required",
                        maxlength: "Last name cannot be more than 100 characters"
                    },
                    marathi_description: {
                      required: "Title name is required",
                        maxlength: "Last name cannot be more than 100 characters"
                    },
                    tender_date: {
                        required: "Tender Date is required"
                    },
                    start_date: {
                        required: "Start Date is required"
                    },
                    end_date: {
                        required: "End Date is required"
                    },
                    open_date: {
                        required: "Open Date is required"
                    },
                    tender_number: {
                        required: "Tender Number is required"
                    },
                    tender_pdf: {
                        required: "Tender Pdf is required",
                    },
                }
            });
        });
    </script>
    
@endsection

