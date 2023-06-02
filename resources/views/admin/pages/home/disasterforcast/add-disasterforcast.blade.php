@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Disaster Forcast
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Disaster Forcast</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-disasterforcast') }}" method="POST"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title" placeholder="Enter the Title"
                                            name="english_title"></textarea>
                                        @if ($errors->has('english_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_title">Title Marathi <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control marathi_title" name="marathi_title"
                                            id="marathi_title" placeholder="Enter the Title"
                                            name="marathi_title"></textarea>
                                        @if ($errors->has('marathi_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_description">Description English <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control english_description" name="english_description"
                                            id="english_description" placeholder="Enter the Description"
                                            name="english_description"></textarea>
                                        @if ($errors->has('english_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Description Marathi <span class="text-danger">*</span></label>
                                        <textarea class="form-control marathi_description" name="marathi_description"
                                            id="marathi_description" placeholder="Enter the Description"></textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="forcast_date">Disaster Forcast Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                            name="forcast_date" id="forcast_date">
                                        @if ($errors->has('forcast_date'))
                                        <span
                                            class="red-text"><?php echo $errors->first('forcast_date', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expired_date">Expired Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                            name="expired_date" id="expired_date">
                                        @if ($errors->has('expired_date'))
                                        <span
                                            class="red-text"><?php echo $errors->first('expired_date', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_image">Image English <span
                                                class="text-danger">*</span></label><br>
                                        <input type="file" name="english_image" id="english_image" accept="image/*"><br>
                                        @if ($errors->has('english_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_image">Image Marathi <span
                                                class="text-danger">*</span></label><br>
                                        <input type="file" name="marathi_image" id="marathi_image" accept="image/*"><br>
                                        @if ($errors->has('marathi_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_pdf">PDF English</label><br>
                                        <input type="file" name="english_pdf" id="english_pdf" accept=".pdf">
                                        @if ($errors->has('english_pdf'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_pdf">PDF Marathi</label><br>
                                        <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf">
                                        @if ($errors->has('marathi_pdf'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <span><a href="{{ route('list-disasterforcast') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection