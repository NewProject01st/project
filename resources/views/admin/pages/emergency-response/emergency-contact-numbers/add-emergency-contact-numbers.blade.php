@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
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
                    <li class="breadcrumb-item active" aria-current="page"> Emergency Contact Numbers</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action='{{ route('add-emergency-contact-numbers') }}' method="POST"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_title">Title English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control english_title" name="english_title"
                                            id="english_title" placeholder="Enter the Title"
                                            name="english_title"></textarea>
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
                                            id="marathi_title" placeholder="Enter the Title"
                                            name="marathi_title"></textarea>
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
                                            id="english_description" placeholder="Enter the Description"
                                            name="description"></textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_description"> Description Marathi</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control marathi_description" name="marathi_description"
                                            id="marathi_description" placeholder="Enter the Description"></textarea>
                                        @if ($errors->has('marathi_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_image">Image English</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="english_image" id="english_image" accept="image/*">
                                        @if ($errors->has('english_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_image">Image Marathi</label>&nbsp<span
                                            class="red-text">*</span><br>
                                        <input type="file" name="marathi_image" id="marathi_image" accept="image/*">
                                        @if ($errors->has('marathi_image'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                            </div>
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
                                                    name="english_emergency_contact_title[]"
                                                    placeholder="Emergency Contact Title">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="marathi_emergency_contact_title">Marathi English Emergency
                                                    Contact Title</label>&nbsp<span class="red-text">*</span><br>
                                                <input class="form-control" type="text"
                                                    name="marathi_emergency_contact_title[]"
                                                    placeholder="Emergency Contact Title">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="english_emergency_contact_number">English Emergency Contact
                                                    Number</label>&nbsp<span class="red-text">*</span><br>
                                                <input class="form-control" type="text"
                                                    name="english_emergency_contact_number[]"
                                                    placeholder="Emergency Contact Number">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="marathi_emergency_contact_number">Marathi English Emergency
                                                    Contact Number</label>&nbsp<span class="red-text">*</span><br>
                                                <input class="form-control" type="text"
                                                    name="marathi_emergency_contact_number[]"
                                                    placeholder="Emergency Contact Number">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="marathi_image"></label>&nbsp<span class="red-text">*</span><br>
                                            <button type="button" class="btn btn-danger remove-item">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 text-center">
                                <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                <button type="submit" class="btn btn-danger">Cancel</button>
                                <span><a href="{{ route('list-disastermanagementportal') }}"
                                        class="btn btn-sm btn-primary ">Back</a></span>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
    $(document).ready(function() {
        // Add more items
        $("#add-item").click(function() {
            var item = `
                    <div id="items">
                                    <div class="item">
                                        <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="english_emergency_contact_title">English Emergency Contact Title</label><br>
                                                <input class="form-control" type="text" name="english_emergency_contact_title[]"
                                                    placeholder="Emergency Contact Title">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="marathi_emergency_contact_title">Marathi English Emergency Contact Title</label><br>
                                                <input class="form-control" type="text" name="marathi_emergency_contact_title[]"
                                                    placeholder="Emergency Contact Title">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="english_emergency_contact_number">English Emergency Contact Number</label><br>
                                                <input class="form-control" type="text" name="english_emergency_contact_number[]"
                                                    placeholder="Emergency Contact Number">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="marathi_emergency_contact_number">Marathi English Emergency Contact Number</label><br>
                                                <input class="form-control" type="text" name="marathi_emergency_contact_number[]"
                                                    placeholder="Emergency Contact Number">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="marathi_image"></label><br>
                                        <button type="button" class="btn btn-danger remove-item">Remove</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>        
            `;
            $("#items").append(item);
        });

        // Remove item
        $(document).on("click", ".remove-item", function() {
            $(this).closest(".item").remove();
        });
    });
    </script>
    @endsection