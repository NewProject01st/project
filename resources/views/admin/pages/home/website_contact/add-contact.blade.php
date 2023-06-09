@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Website Contact
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Website Contact </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('add-website-contact') }}" method="POST"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_address">English Address</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_title" name="english_address"
                                            id="english_address" placeholder="Enter the english address">{{ old('english_address') }}</textarea>
                                        @if ($errors->has('english_address'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_address">Marathi Address</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control marathi_title" name="marathi_address"
                                            id="marathi_address" placeholder="Enter the marathi address">{{ old('marathi_address') }}</textarea>
                                        @if ($errors->has('marathi_address'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_number">English No</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="english_number" id="english_number"
                                            class="form-control" id="english_number" placeholder="" value="{{ old('english_number') }}">
                                        @if ($errors->has('english_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_number"> Marathi No</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" name="marathi_number" id="marathi_number"
                                            class="form-control" id="marathi_number" placeholder="" value="{{ old('marathi_number') }}">
                                        @if ($errors->has('marathi_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="email" name="email" id="email"
                                            class="form-control" id="email" placeholder="" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <span
                                            class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                    <span><a href="{{ route('list-website-contact') }}"
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