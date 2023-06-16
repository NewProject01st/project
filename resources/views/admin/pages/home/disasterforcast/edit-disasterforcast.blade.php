@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Disaster Forcast
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Disaster Forcast</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('update-disasterforcast') }}' method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title"
                                                name="english_title">
@if (old('english_title'))
{{ old('english_title') }}@else{{ $disasterforcast->english_title }}
@endif
</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title"
                                                name="marathi_title">
@if (old('marathi_title'))
{{ old('marathi_title') }}@else{{ $disasterforcast->marathi_title }}
@endif
</textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php //echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description English <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="english_description">
@if (old('english_description'))
{{ old('english_description') }}@else{{ $disasterforcast->english_description }}
@endif
</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php //echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label> Description Marathi <span class="text-danger">*</span></label>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">
@if (old('english_title'))
{{ old('english_title') }}@else{{ $disasterforcast->english_title }}
@endif
</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="forcast_date">Disaster Forcast Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                value="@if (old('forcast_date')) {{ old('forcast_date') }}@else{{ $disasterforcast->forcast_date }} @endif"
                                                name="forcast_date" id="forcast_date">
                                            @if ($errors->has('forcast_date'))
                                                <span class="red-text"><?php echo $errors->first('forcast_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="expired_date">Expired Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                value="@if (old('expired_date')) {{ old('expired_date') }}@else{{ $disasterforcast->expired_date }} @endif"
                                                name="expired_date" id="expired_date">
                                            @if ($errors->has('expired_date'))
                                                <span class="red-text"><?php //echo $errors->first('expired_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">English Image</label>
                                            <input type="file" name="english_image" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php //echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ asset('storage/images/home/disaster-forcast/' . $disasterforcast->english_image) }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image">Marathi Image</label>
                                            <input type="file" name="marathi_image" id="marathi_image"
                                                accept="image/*" class="form-control">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php //echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ asset('storage/images/home/disaster-forcast/' . $disasterforcast->marathi_image) }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF English</label><br>
                                            <input type="file" name="english_pdf" id="english_pdf"
                                                value="{{ $disasterforcast->english_pdf }}" accept=".pdf">
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php //echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">PDF Marathi</label><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf"
                                                value="{{ $disasterforcast->marathi_pdf }}" accept=".pdf">
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php //echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger"><a
                                            href="{{ route('list-disasterforcast') }}"
                                            class="text-light">Cancel</a></button> --}}
                                        <span><a href="{{ route('list-disasterforcast') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $disasterforcast->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
