@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Emergency Contact
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Emergency Contact </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-emergency-contact') }}" method="POST"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English</label>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title" placeholder="Enter the Title"></textarea>
                                        @if ($errors->has('english_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_title">Title Marathi</label>
                                        <textarea class="form-control marathi_title" name="marathi_title"
                                            id="marathi_title" placeholder="Enter the Title"></textarea>
                                        @if ($errors->has('marathi_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_name">Name English</label><br>
                                        <input type="text" name="english_name" id="english_name" class="form-control">
                                        @if ($errors->has('english_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_name">Name Marathi</label><br>
                                        <input type="text" name="marathi_name" id="marathi_name" class="form-control">
                                        @if ($errors->has('marathi_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_address">English Address</label>
                                        <textarea class="form-control english_description" name="english_address"
                                            id="english_address" placeholder="Enter the Address"></textarea>
                                        @if ($errors->has('english_address'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_address">Marathi Address</label>
                                        <textarea class="form-control marathi_description" name="marathi_address"
                                            id="marathi_address" placeholder="Enter the Address"></textarea>
                                        @if ($errors->has('marathi_address'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_number">English No</label>
                                        <input type="text" name="english_number" id="english_number"
                                            class="form-control" id="english_number" placeholder="">
                                        @if ($errors->has('english_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_number"> Marathi No</label>
                                        <input type="text" name="marathi_number" id="marathi_number"
                                            class="form-control" id="marathi_number" placeholder="">
                                        @if ($errors->has('marathi_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_landline_no">English Landline No</label>
                                        <input type="text" name="english_landline_no" id="english_landline_no"
                                            class="form-control" id="english_landline_no" placeholder="">
                                        @if ($errors->has('english_landline_no'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_landline_no', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_landline_no"> Marathi Landline No</label>
                                        <input type="text" name="marathi_landline_no" id="marathi_landline_no"
                                            class="form-control" id="marathi_landline_no" placeholder="">
                                        @if ($errors->has('marathi_landline_no'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_landline_no', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" id="email"
                                            placeholder="">
                                        @if ($errors->has('email'))
                                        <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                        @endif
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
    @endsection