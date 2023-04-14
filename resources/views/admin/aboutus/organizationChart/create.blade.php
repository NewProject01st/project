@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            Organization Chart
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Organization Chart</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('organizationchart') }}" method="post" id="regForm">
                        {!! csrf_field() !!}   
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title English</label>
                                        <input type="text" name="fld_english_title" id="fld_english_title" class="form-control" id="exampleInputUsername1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title Marathi</label>
                                        <input type="text" name="fld_marathi_title" id="fld_marathi_title" class="form-control" id="exampleInputUsername1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Image English</label>
                                        <input  name="fld_english_image" id="image1" type="file" accept=" .jpg , .jpeg , .png " required="" >

                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Image Marathi</label>
                                        <input  name="fld_marathi_image" id="image2" type="file" accept=" .jpg , .jpeg , .png " required="" >

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
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                  fld_english_title: {
                        required: true,
                        maxlength: 20,
                    },
                    fld_marathi_title: {
                        required: true,
                        maxlength: 20,
                    },
                    fld_english_description: {
                        required: true,
                        maxlength: 100,
                    },
                    fld_marathi_description: {
                        required: true,
                        maxlength: 100,
                    }
                  },
                messages: {
                  fld_english_title: {
                        required: "Title name is required",
                        maxlength: "First name cannot be more than 20 characters"
                    },
                    fld_marathi_title: {
                      required: "Title name is required",
                        maxlength: "Last name cannot be more than 20 characters"
                    },
                    fld_english_description: {
                      required: "Title name is required",
                        maxlength: "Last name cannot be more than 100 characters"
                    },
                    fld_marathi_description: {
                      required: "Title name is required",
                        maxlength: "Last name cannot be more than 100 characters"
                    } 
                   
                }
            });
        });
    </script>
    
@endsection

