@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    State Disaster Management Plan
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Policies and Legislation</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update State Disaster Management Plan
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-state-disaster-management-plan') }}"
                                method="post" id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_title"
                                                id="english_title" placeholder="Enter the Title"
                                                value="@if (old('english_title')) {{ old('english_title') }}@else{{ $state_management->english_title }} @endif">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_title"
                                                id="marathi_title" placeholder="शीर्षक प्रविष्ट करा"
                                                value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $state_management->marathi_title }} @endif">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="url" id="url" class="form-control"
                                                value="@if (old('url')) {{ old('url') }}@else{{ $state_management->url }} @endif"
                                                placeholder="">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="policies_year">Year</label>&nbsp;<span class="red-text">*</span>
                                            <select class="form-control" id="policies_year" name="policies_year">
                                                <option value="">Select Year</option>
                                                @for ($year = date('Y'); $year >= 1950; $year--)
                                                    <option value="{{ $year }}"
                                                        @if (old('policies_year', $state_management->policies_year) == $year) selected @endif>
                                                        {{ $year }}</option>
                                                @endfor
                                            </select>
                                            @if ($errors->has('policies_year'))
                                                <span class="red-text">{{ $errors->first('policies_year') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF</label><br>
                                            <input type="file" name="english_pdf" id="english_pdf" accept=".pdf"><br>
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                            <a
                                                href="{{ Config::get('DocumentConstant.STATE_DISASTER_PLAN_VIEW') }}{{ $state_management->english_pdf }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ</label><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"
                                                class=""><br>
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <a
                                            href="{{ Config::get('DocumentConstant.STATE_DISASTER_PLAN_VIEW') }}{{ $state_management->marathi_pdf }}"></a>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-state-disaster-management-plan') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $state_management->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
