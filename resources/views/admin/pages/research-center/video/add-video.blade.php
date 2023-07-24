@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Video
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-video') }}">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Video</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-video') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="video_name">Video Name</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control video_name" name="video_name" id="video_name"
                                                placeholder="Enter Video Name" {{ old('video_name') }}>
                                            @if ($errors->has('video_name'))
                                                <span class="red-text"><?php echo $errors->first('video_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-video') }}"
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
