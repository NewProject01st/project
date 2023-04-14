@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            Constitution & History
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
                        <form class="forms-sample" action="{{ url('constitutionHistory') }}" method="post" id="regForm">
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
                                        <!-- <input type="text" name="english_description" class="form-control" id="exampleInputUsername1" placeholder=""> -->
                                        <textarea class="form-control english_description"  name="english_description" id="english_description" placeholder="Enter the Description" name="description"></textarea>

                                      </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description Marathi</label>
                                        <input type="text" name="marathi_description" class="form-control" id="exampleInputUsername1" placeholder="">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                <div class="form-group">
                                <label> Description Marathi</label>
                                <textarea class="form-control marathi_description"  name="marathi_description" id="marathi_description" placeholder="Enter the Description"></textarea>
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
                    }
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
                    } 
                   
                }
            });
        });
    </script>
    
@endsection

