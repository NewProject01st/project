@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Vacancies
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Vacancies</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-header-vacancies') }}" method="POST"
                                enctype="multipart/form-data" id="formVacancy">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_title"
                                                id="english_title" value="{{ old('english_title') }}"
                                                placeholder="Enter the Title">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_title"
                                                id="marathi_title" value="{{ old('marathi_title') }}"
                                                placeholder="शीर्षक प्रविष्ट करा">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
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
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ</label><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"><br>
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="url">URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="url" id="url" class="form-control"
                                                id="url" placeholder="" value="{{ old('url') }}">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-header-vacancies') }}"
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
