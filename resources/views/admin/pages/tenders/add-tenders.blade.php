@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Tenders
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Tenders</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-tenders') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>
                                            <input type="text" name="english_title" id="english_title"
                                                class="form-control" id="english_title" placeholder="">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi</label>
                                            <input type="text" name="marathi_title" id="marathi_title"
                                                class="form-control" id="marathi_title" placeholder="">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_description">Description English</label>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="english_description"></textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Description Marathi</label>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description"></textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tender_date">Tender Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="tender_date" id="tender_date">
                                            @if ($errors->has('tender_date'))
                                                <span class="red-text"><?php echo $errors->first('tender_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="start_date" id="start_date">
                                            @if ($errors->has('start_date'))
                                                <span class="red-text"><?php echo $errors->first('start_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="end_date" id="end_date">
                                            @if ($errors->has('end_date'))
                                                <span class="red-text"><?php echo $errors->first('end_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="open_date">Open Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="open_date" id="open_date">
                                            @if ($errors->has('open_date'))
                                                <span class="red-text"><?php echo $errors->first('open_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tender_number">Tender Number</label>
                                            <input type="tel" class="form-control" placeholder="Tender Number"
                                                name="tender_number" id="tender_number">
                                            @if ($errors->has('tender_number'))
                                                <span class="red-text"><?php echo $errors->first('tender_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF English</label><br>
                                            <input type="file" name="english_pdf" id="english_pdf" accept=".pdf">
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">PDF Marathi</label><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf">
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
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
