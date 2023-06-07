@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Roles
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                            action="{{ route('add-role') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_name">Role Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control role_name" name="role_name"
                                                id="role_name" placeholder="Enter the Role Name">
                                            @if ($errors->has('role_name'))
                                            <span
                                                class="red-text"><?php echo $errors->first('role_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                        <span><a href="{{ route('list-role') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                  role_name: {
                        required: true,
                        charactersOnly: true // Use custom validation method
                    },
                  
                  },
                messages: {
                    role_name: {
                        required: "Title name is required",
                        charactersOnly: "Only characters are allowed." // Custom error message for custom validation method
                    },
                   
                   
                }
            });
        });
    </script> --}}


    @endsection