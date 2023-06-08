@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Emergency Contact Numbers
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Emergency Contact Numbers</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action='{{ route('update-emergency-contact-numbers') }}'
                            method="post" id="regForm" enctype="multipart/form-data">
                            @csrf
                           
           













                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title"
                                                name="english_title">{{ $emergencycontactnumbers->english_title }}</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title"
                                                name="marathi_title">{{ $emergencycontactnumbers->marathi_title }}</textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_description">Description English</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="description">{{ $emergencycontactnumbers->english_description }}</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_description"> Description Marathi</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">{{ $emergencycontactnumbers->marathi_description }}</textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_image">Image English</label>&nbsp<span
                                                class="red-text">*</span><br>
                                                <input type="file" name="english_image" class="form-control" id="english_image"
                                                accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                            <span
                                                class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ asset('storage/images/emergency-response/emergency-contact-numbers/' . $emergencycontactnumbers->english_image) }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic" class="img-fluid img-thumbnail"
                                            width="150" style="display:none">
                                        </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_image">Image Marathi</label>&nbsp<span
                                                class="red-text">*</span><br>
                                                <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                                class="form-control">
                                            @if ($errors->has('marathi_image'))
                                            <span
                                                class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ asset('storage/images/emergency-response/emergency-contact-numbers/' . $emergencycontactnumbers->marathi_image) }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic" class="img-fluid img-thumbnail"
                                            width="150" style="display:none">
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="col-md-12 col-sm-12 ">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" id="add-item">Add More</button>
                                    </div>
                                <div id="items">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="english_emergency_contact_title">English Emergency Contact
                                                        Title</label>&nbsp<span class="red-text">*</span><br>
                                                    <input class="form-control" type="text"
                                                        name="english_emergency_contact_title_1"
                                                        placeholder="Emergency Chontact Title" value="{{ $emergencycontactnumbers->english_emergency_contact_title }}">
                                                    @if ($errors->has('english_emergency_contact_title_1'))
                                                        <span class="red-text"><?php echo $errors->first('english_emergency_contact_title_1', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="marathi_emergency_contact_title">Marathi English Emergency
                                                        Contact Title</label>&nbsp<span class="red-text">*</span><br>
                                                    <input class="form-control" type="text"
                                                        name="marathi_emergency_contact_title_1"
                                                        placeholder="Emergency Contact Title">
                                                        @if ($errors->has('marathi_emergency_contact_title_1'))
                                                        <span class="red-text"><?php echo $errors->first('marathi_emergency_contact_title_1', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="english_emergency_contact_number">English Emergency Contact
                                                        Number</label>&nbsp<span class="red-text">*</span><br>
                                                    <input class="form-control" type="text"
                                                        name="english_emergency_contact_number_1"
                                                        placeholder="Emergency Contact Number">
                                                        @if ($errors->has('english_emergency_contact_number_1'))
                                                        <span class="red-text"><?php echo $errors->first('english_emergency_contact_number_1', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="marathi_emergency_contact_number">Marathi Emergency
                                                        Contact Number</label>&nbsp<span class="red-text">*</span><br>
                                                    <input class="form-control" type="text"
                                                        name="marathi_emergency_contact_number_1"
                                                        placeholder="Emergency Contact Number">
                                                        @if ($errors->has('marathi_emergency_contact_number_1'))
                                                        <span class="red-text"><?php echo $errors->first('marathi_emergency_contact_number_1', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="marathi_image"></label>
                                                <button type="button" class="btn btn-danger remove-item">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <span><a href="{{ route('list-emergency-contact-numbers') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control"
                                value="{{ $emergencycontactnumbers->id }}" placeholder="">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection