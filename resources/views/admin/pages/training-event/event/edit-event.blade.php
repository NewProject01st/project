@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Event
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-event') }}">Training Workshops</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Training Workshops
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-event') }}" method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title">
                                                @if (old('english_title'))
{{ old('english_title') }}@else{{ $event->english_title }}
@endif
                                                </textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="शीर्षक प्रविष्ट करा ">
                                                @if (old('marathi_title'))
{{ old('marathi_title') }}@else{{ $event->marathi_title }}
@endif
                                                </textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description">
                                                    @if (old('english_description'))
{{ old('english_description') }}@else{{ $event->english_description }}
@endif
                                                    </textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> वर्णन</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">
                                                    @if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $event->marathi_description }}
@endif
                                                    </textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>&nbsp<span class="red-text">*</span>
                                            <input type="date" class="form-control" name="start_date" id="start_date"
                                                value="@if (old('start_date')) {{ old('start_date') }}@else{{ $event->start_date }} @endif"
                                                placeholder="Selecte Start Date">
                                            @if ($errors->has('start_date'))
                                                <span class="red-text"><?php echo $errors->first('start_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>&nbsp<span class="red-text">*</span>
                                            <input type="date" class="form-control" name="start_date" id="start_date"
                                                value="{{ old('start_date') ?: $event->start_date }}"
                                                placeholder="Select Start Date">
                                            @if ($errors->has('start_date'))
                                                <span class="red-text">{{ $errors->first('start_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>&nbsp<span class="red-text">*</span>
                                            <input type="date" class="form-control" name="end_date" id="end_date"
                                                value="@if (old('end_date')) {{ old('end_date') }}@else{{ $event->end_date }} @endif"
                                                placeholder="Selecte End Date">
                                            @if ($errors->has('end_date'))
                                                <span class="red-text"><?php echo $errors->first('end_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>&nbsp<span class="red-text">*</span>
                                            <input type="date" class="form-control" name="end_date" id="end_date"
                                                value="{{ old('end_date') ?: $event->end_date }}"
                                                placeholder="Select End Date">
                                            @if ($errors->has('end_date'))
                                                <span class="red-text">{{ $errors->first('end_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Image</label>
                                            <input type="file" name="english_image" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $event->english_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt=" {{ strip_tags($event['marathi_title']) }} प्रतिमा"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image"> प्रतिमा</label>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                                class="form-control">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $event->marathi_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt=" {{ strip_tags($event['english_title']) }} Image"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center mt-4">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-event') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $event->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
