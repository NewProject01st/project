@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Gallery Category
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Gallery Category</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-gallery-category') }}" method="POST"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_name">English Name</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_name" name="english_name"
                                            id="english_name" placeholder="Enter the Title"></textarea>
                                        @if ($errors->has('english_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_name">Marathi Name</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control marathi_name" name="marathi_name"
                                            id="marathi_name" placeholder="Enter the Title"></textarea>
                                        @if ($errors->has('marathi_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection