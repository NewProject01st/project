@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Contact Feedback and suggestions
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Contact Feedback and suggestions
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-contact-suggestion') }}" method="post"
                            id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control full_name" name="english_image"
                                            placeholder="Enter the Full Name" value="{{ $contact_data->full_name }}"
                                            id="full_name"><br>

                                        @if ($errors->has('full_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('full_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                        <input type="email" class="form-control email" name="email"
                                            value="{{ $contact_data->email }}" placeholder="Enter the email"
                                            id="email"><br>

                                        @if ($errors->has('email'))
                                        <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" class="form-control mobile_number" name="mobile_number"
                                            value="{{ $contact_data->mobile_number }}"
                                            placeholder="Enter the mobile number" id="mobile_number"><br>

                                        @if ($errors->has('mobile_number'))
                                        <span
                                            class="red-text"><?php echo $errors->first('mobile_number', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_type">Contact Type</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="text" class="form-control " name="contact_type"
                                            value="{{ $contact_data->contact_type }}"
                                            placeholder="Enter the contact type" id="contact_type"><br>

                                        @if ($errors->has('contact_type'))
                                        <span
                                            class="red-text"><?php echo $errors->first('contact_type', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control " name="subject"
                                            value="{{ $contact_data->subject }}" placeholder="Enter the subject"
                                            id="subject"><br>

                                        @if ($errors->has('subject'))
                                        <span
                                            class="red-text"><?php echo $errors->first('subject', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suggestion">Suggestion</label>&nbsp<span class="red-text">*</span>
                                        <textarea class="form-control marathi_title" name="suggestion" id="suggestion"
                                            placeholder="Enter the suggestion">{{ $contact_data->suggestion }}</textarea>
                                        @if ($errors->has('suggestion'))
                                        <span
                                            class="red-text"><?php echo $errors->first('suggestion', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                    <span><a href="{{ route('list-citizen-feedback-and-suggestion') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $feedback_data->id }}"
                                placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection