@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    MAP Lat Data
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> MAP Lat Data</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-map-lot-lons') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="lat"> Latitude</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control lat" name="lat" id="lat"
                                                placeholder="Enter the latitude." name="lat"
                                                value="{{ old('lat') }}">
                                            @if ($errors->has('lat'))
                                                <span class="red-text"><?php echo $errors->first('lat', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="location_name"> Longitude</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control lon" name="lon" id="lon"
                                                placeholder="Enter the longitude." name="lon"
                                                value="{{ old('lon') }}">
                                            @if ($errors->has('lon'))
                                                <span class="red-text"><?php echo $errors->first('lon', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="location_name_english"> Location Name</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control " name="location_name_english"
                                                id="location_name_english" placeholder="Enter the location name."
                                                name="location_name_english" value="{{ old('location_name_english') }}">
                                            @if ($errors->has('location_name_english'))
                                                <span class="red-text"><?php echo $errors->first('location_name_english', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="location_name_marathi"> स्थानाचे नाव </label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control " name="location_name_marathi"
                                                id="location_name_marathi" placeholder="स्थानाचे नाव प्रविष्ट करा."
                                                name="location_name_marathi" value="{{ old('location_name_marathi') }}">
                                            @if ($errors->has('location_name_marathi'))
                                                <span class="red-text"><?php echo $errors->first('location_name_marathi', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="location_address_english"> Location Address</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control " name="location_address_english"
                                                id="location_address_english" placeholder="Enter the location address."
                                                name="location_address_english"
                                                value="{{ old('location_address_english') }}">
                                            @if ($errors->has('location_address_english'))
                                                <span class="red-text"><?php echo $errors->first('location_address_english', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="location_address_marathi">स्थान पत्ता</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control " name="location_address_marathi"
                                                id="location_address_marathi" placeholder="स्थान पत्ता प्रविष्ट करा."
                                                name="location_address_marathi"
                                                value="{{ old('location_address_marathi') }}">
                                            @if ($errors->has('location_address_marathi'))
                                                <span class="red-text"><?php echo $errors->first('location_address_marathi', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="data_for">Data For</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control " name="data_for" id="data_for"
                                                placeholder="Enter the police station data." name="data_for"
                                                value="{{ old('data_for') }}">
                                            @if ($errors->has('data_for'))
                                                <span class="red-text"><?php echo $errors->first('data_for', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-map-lat-lons') }}"
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
