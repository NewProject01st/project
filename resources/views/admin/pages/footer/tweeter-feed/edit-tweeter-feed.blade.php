@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Footer Link
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Footer Link</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-tweeter-feed') }}" method="post"
                                id="regForm" name="frm_register" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="url"> URL</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control url" name="url" id="url"
                                                placeholder="Enter the Title" name="url" value="{{ $tweeter->url }}">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-tweeter-feed') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $tweeter->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
