@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            Policies Acts
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Policies Acts</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('policiesacts') }}" method="post" id="regForm" enctype="multipart/form-data">
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
                                        <label for="ImageEnglish">Image English</label><br>
                                    <input type="file" name="english_pdf" id="english_pdf" accept="image/*" >
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ImageMarathi">Image Marathi</label><br>
                                    <input type="file" name="marathi_pdf" id="marathi_pdf" accept="image/*" >
                                 </div>
                                </div>  
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
                    },
                    marathi_title: {
                        required: true,
                    },
                    english_description: {
                        required: true,
                    },
                    marathi_description: {
                        required: true,
                    },
                    english_pdf: {
                        required: true,
                    },
                    marathi_pdf: {
                        required: true,
                    },
                  },
                messages: {
                  english_title: {
                        required: "Title name is required",
                    },
                    marathi_title: {
                      required: "Title name is required",
                    },
                    english_description: {
                      required: "Title name is required",
                    },
                    marathi_description: {
                      required: "Title name is required",
                    },
                    english_pdf: {
                        required: "Tender Date is required"
                    },
                    marathi_pdf: {
                        required: "Start Date is required"
                    },
                  
                }
            });
        });
    </script>
    
@endsection

