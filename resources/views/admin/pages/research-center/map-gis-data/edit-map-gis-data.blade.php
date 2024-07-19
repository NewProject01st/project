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
                        <li class="breadcrumb-item"><a href="{{ url('list-map-lot-lons') }}">Resource Center</a></li>
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
                                            <input type="text" name="lat" id="lat" class="form-control mb-2"
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
                                            <input type="text" name="lon" id="lon" class="form-control mb-2"
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
                                            <input type="text" class="form-control mb-2" name="location_name_english"
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
                                            <input type="text" class="form-control mb-2" name="location_name_marathi"
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
                                            <input type="text" class="form-control mb-2" name="location_address_english"
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
                                            <input type="text" class="form-control mb-2" name="location_address_marathi"
                                                id="location_address_marathi" placeholder="Enter the location name"
                                                name="location_address_marathi"
                                                value="@if (old('location_address_marathi')) {{ old('location_address_marathi') }}@else{{ $map_gis->location_address_marathi }} @endif">
                                            @if ($errors->has('location_address_marathi'))
                                                <span class="red-text"><?php echo $errors->first('location_address_marathi', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_description">Description</label>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description">
                                                <label class="error py-2" for="english_description" id="english_description_error"></label>
                                            @if (old('english_description'))
{{ old('english_description') }}@else{{ $map_gis->english_description }}
@endif
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_description"> वर्णन </label>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">
                                            @if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $map_gis->marathi_description }}
@endif
                                            </textarea>
                                            <label class="error py-2" for="english_description"
                                                id="english_description_error"></label>

                                            <label class="error py-2" for="marathi_description"
                                                id="marathi_description_error"></label>
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="google_map_link">Google Map Link</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="google_map_link" id="google_map_link" class="form-control mb-2"
                                                value="@if (old('google_map_link')) {{ old('google_map_link') }}@else{{ $map_gis->google_map_link }} @endif"
                                                placeholder="">
                                            @if ($errors->has('google_map_link'))
                                                <span class="red-text"><?php echo $errors->first('google_map_link', ':message'); ?></span>
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
                                                <span class="red-text"><?php //echo $errors->first('data_for', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
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
        <script>
            $(document).ready(function() {
                function checkFormValidity() {
                    const lat = $('#lat').val();
                    const lon = $('#lon').val();
                    const location_name_english = $('#location_name_english').val();
                    const location_name_marathi = $('#location_name_marathi').val();
                    const location_address_english = $('#location_address_english').val();
                    const location_address_marathi = $('#location_address_marathi').val();
                }
                // Call the checkFormValidity function on file input change
                $('input').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });
                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        lat: {
                            required: true,
                        },
                        lon: {
                            required: true,
                        },
                        location_name_english: {
                            required: true,
                        },
                        location_name_marathi: {
                            required: true,
                        },
                        location_address_english: {
                            required: true,
                        },
                        location_address_marathi: {
                            required: true,
                        },
                        google_map_link: {
                            required: true,
                        },
                    },
                    messages: {
                        lat: {
                            required: "Please Enter the Longitude.",
                        },
                        lon: {
                            required: "Please Enter the Latitude.",
                        },
                        location_name_english: {
                            required: "Please Enter the Location Name",
                        },
                        location_name_marathi: {
                            required: "कृपया स्थानाचे नाव प्रविष्ट करा",
                        },
                        location_address_english: {
                            required: "Please Enter the Location Address",
                        },
                     
                        location_address_marathi: {
                            required: "कृपया स्थानाचा पत्ता प्रविष्ट करा",
                        },
                        google_map_link: {
                            required: "Please Enter the map link",
                        },
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
                // Submit the form when the "Update" button is clicked
                $("#submitButton").click(function() {
                    // Validate the form
                    if (form.valid()) {
                        form.submit();
                    }
                });
            });
        </script>
    @endsection
