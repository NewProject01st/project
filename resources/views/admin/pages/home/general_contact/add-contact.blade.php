@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                General Contact
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> General Contact </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-general-contact') }}" method="POST"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_name">English Name</label>
                                        <textarea class="form-control english_title" name="english_name"
                                            id="english_name" placeholder="Enter the Name"></textarea>
                                        @if ($errors->has('english_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_name">Marathi Name</label>
                                        <textarea class="form-control marathi_title" name="marathi_name"
                                            id="marathi_name" placeholder="Enter the Name"></textarea>
                                        @if ($errors->has('marathi_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
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
                                        <label for="english_icon">Icon English</label><br>
                                        <input type="file" name="english_icon" id="english_icon" accept="image/*">
                                        @if ($errors->has('english_icon'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_icon', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_icon">Icon Marathi</label><br>
                                        <input type="file" name="marathi_icon" id="marathi_icon" accept="image/*">
                                        @if ($errors->has('marathi_icon'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_icon', ':message'); ?></span>
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