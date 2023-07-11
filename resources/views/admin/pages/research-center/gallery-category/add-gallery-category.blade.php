@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Gallery Category
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Resource Center</a></li>
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
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name"> Name</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control english_name" name="english_name" id="english_name"
                                                placeholder="Enter the Name" {{ old('english_name') }}>
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name"> नाव</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control marathi_name" name="marathi_name" id="marathi_name"
                                                placeholder="नाव प्रविष्ट करा" {{ old('marathi_name') }}>
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        <span><a href="{{ route('list-gallery-category') }}"
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
