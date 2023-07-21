@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    MAP GIS Data
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update MAP GIS Data</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-map-lot-lons') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="lat">Latitude</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="lat" id="lat" class="form-control"
                                                value="@if (old('lat')) {{ old('lat') }}@else{{ $map_gis->lat }} @endif"
                                                placeholder="">
                                            @if ($errors->has('lat'))
                                                <span class="red-text"><?php echo $errors->first('lat', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="lon">Longitude</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="lon" id="lon" class="form-control"
                                                value="@if (old('lon')) {{ old('lon') }}@else{{ $map_gis->lon }} @endif"
                                                placeholder="">
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
                                                id="location_name_english" placeholder="Enter the location name"
                                                name="location_name_english"
                                                value="@if (old('location_name_english')) {{ old('location_name_english') }}@else{{ $map_gis->location_name_english }} @endif">
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
                                                id="location_name_marathi" placeholder="स्थानाचे नाव प्रविष्ट करा"
                                                name="location_name_marathi"
                                                value="@if (old('location_name_marathi')) {{ old('location_name_marathi') }}@else{{ $map_gis->location_name_marathi }} @endif">
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
                                                id="location_address_english" placeholder="Enter the location name"
                                                name="location_address_english"
                                                value="@if (old('location_address_english')) {{ old('location_address_english') }}@else{{ $map_gis->location_address_english }} @endif">
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
                                                id="location_address_marathi" placeholder="Enter the location name"
                                                name="location_address_marathi"
                                                value="@if (old('location_address_marathi')) {{ old('location_address_marathi') }}@else{{ $map_gis->location_address_marathi }} @endif">
                                            @if ($errors->has('location_address_marathi'))
                                                <span class="red-text"><?php echo $errors->first('location_address_marathi', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="data_for">Data For</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control " name="data_for" id="data_for"
                                                placeholder="Enter the police station data" name="data_for"
                                                value="@if (old('data_for')) {{ old('data_for') }}@else{{ $map_gis->data_for }} @endif">
                                            @if ($errors->has('data_for'))
                                                <span class="red-text"><?php echo $errors->first('data_for', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-map-lat-lons') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $map_gis->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
