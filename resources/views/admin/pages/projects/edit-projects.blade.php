@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Projects
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Projects</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action='{{ route('update-projects') }}' method="post" id="regForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title"
                                            placeholder="Enter the Title">{{ $projects->english_title }}</textarea>
                                        @if ($errors->has('english_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_title">Title Marathi</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control marathi_title" name="marathi_title"
                                            id="marathi_title"
                                            placeholder="Enter the Title">{{ $projects->marathi_title }}</textarea>
                                        @if ($errors->has('marathi_title'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_description">Description English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_description" name="english_description"
                                            id="english_description"
                                            placeholder="Enter the Description">{{ $projects->english_description }}</textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Description Marathi</label>&nbsp<span class="red-text">*</span>
                                        <textarea class="form-control marathi_description" name="marathi_description"
                                            id="marathi_description"
                                            placeholder="Enter the Description">{{ $projects->marathi_description }}</textarea>
                                        @if ($errors->has('marathi_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_link">English Link</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="english_link" id="english_link" class="form-control"
                                            value="{{ $projects->english_link }}" placeholder="">
                                        @if ($errors->has('english_link'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_link', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_link">Marathi Link</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="marathi_link" id="marathi_link" class="form-control"
                                            value="{{ $projects->marathi_link }}" placeholder="">
                                        @if ($errors->has('marathi_link'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_link', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_pdf">Pdf English</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="english_pdf" id="english_pdf" accept=".pdf">
                                        @if ($errors->has('english_pdf'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                        @endif
                                        <a href="{{ asset('storage/pdf/projects/' . $projects->english_pdf) }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_pdf">Pdf Marathi</label>&nbsp<span class="red-text">*</span>
                                        <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"
                                            class="form-control">
                                        @if ($errors->has('marathi_pdf'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                        @endif
                                    </div>
                                    <a href="{{ asset('storage/pdf/projects/' . $projects->marathi_pdf) }}"></a>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                    <span><a href="{{ route('list-projects') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $projects->id }}"
                                placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection