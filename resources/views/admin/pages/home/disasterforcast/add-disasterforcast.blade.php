@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Disaster Forecast
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Disaster Forecast</li>
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
                                   <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English <span
                                                    class="text-danger">*</span></label>
                                                    <input class="form-control" name="english_title" id="english_title" placeholder="Enter the Title">  
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php //echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi <span
                                                    class="text-danger">*</span></label>
                                                    <input class=" form-control" name="marathi_title" id="marathi_title" placeholder="शीर्षक प्रविष्ट करा">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php //echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control " name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="english_description">{{ old('english_description') }}</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> वर्णन <span class="text-danger">*</span></label>
                                            <textarea class="form-control " name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                         {{-- <button type="reset" class="btn btn-danger">Cancel</button>  --}}
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
