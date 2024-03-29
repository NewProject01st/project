@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Emergency Contact Numbers
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('edit-emergency-contact-numbers') }}">Emergency Response</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Emergency Contact Numbers</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.alert')
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-emergency-contact-numbers') }}"
                                method="post" id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title </label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="english_title" id="english_title" placeholder="Enter the Title"
                                                name="english_title" value="@if (old('english_title'))
                                                {{ old('english_title') }}@else{{ strip_tags($emergencycontact_data['emergencycontactnumbers']->english_title) }}
                                                @endif">                                                   
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control" name="marathi_title" id="marathi_title" placeholder="Enter the Title"
                                                name="marathi_title" value="@if (old('marathi_title'))
                                                {{ old('marathi_title') }}@else{{ strip_tags($emergencycontact_data['emergencycontactnumbers']->marathi_title) }}
                                                @endif">                                               
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="description">
                                                    @if (old('english_description'))
{{ old('english_description') }}@else{{ $emergencycontact_data['emergencycontactnumbers']->english_description }}
@endif
                                                    </textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="marathi_description">वर्णन </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">
                                                    @if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $emergencycontact_data['emergencycontactnumbers']->marathi_description }}
@endif
                                                    </textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Image </label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="english_image" class="form-control mb-2"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $emergencycontact_data['emergencycontactnumbers']->english_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image">छायाचित्र </label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                                class="form-control mb-2">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $emergencycontact_data['emergencycontactnumbers']->marathi_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 text-center  mt-3">
                                    <input type="hidden" name="edit_id" id="edit_id"
                                        value="{{ $emergencycontact_data['emergencycontactnumbers']->id }}">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                    {{-- <span><a href="{{ route('list-emergency-contact-numbers') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span> --}}
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12 col-sm-12 text-center emergancy_contact_add">

                            <div class="pt-3 d-flex justify-content-end" style="margin-bottom: 10px">
                                <a href="{{ route('add-more-emergency-contact-data') }}"
                                    class="btn btn-sm btn-primary ml-3">Add Contact
                                    Number</a>
                            </div>
                            <table id="order-listing" class="table table-striped table-hover table-bordered border-dark mt-3 mb-3">
                                <thead class="" style="background-color: #47194a; color:#fff">
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Emergency Contact Title</th>
                                        <th scope="col">आपत्कालीन संपर्क शीर्षक</th>
                                        <th scope="col">Emergency Contact Number</th>
                                        <th scope="col">आपत्कालीन संपर्क क्रमांक</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($add_more_contact_numbers as $key => $contact_data)
                                        <tr>
                                            <td scope="col">{{ $key + 1 }}</td>
                                            <td scope="col">{{ $contact_data['english_emergency_contact_title'] }}</td>
                                            <td scope="col">{{ $contact_data['marathi_emergency_contact_title'] }}</td>
                                            <td scope="col">{{ $contact_data['english_emergency_contact_number'] }}
                                            </td>
                                            <td scope="col">{{ $contact_data['marathi_emergency_contact_number'] }}
                                            </td>
                                            <td>
                                                <div class="d-flex">

                                                    <a data-id="{{ $contact_data['id'] }}"
                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                        title="Delete"><i class="fas fa-archive"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <h4 style="text-align: center">No Data Found For Emergency Contact</h4>
                                    @endforelse
                                </tbody>
                            </table>


                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <form method="POST" action="{{ url('/add-more-emergency-contact-data-delete') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>

    <script>
        $(document).ready(function() {
            var currentEnglishImage = $("#currentEnglishImage").val();
            var currentMarathiImage = $("#currentMarathiImage").val();
    
            // Function to check if all input fields are filled with valid data
            function checkFormValidity() {
                const english_title = $('#english_title').val();
                const marathi_title = $('#marathi_title').val();
                const english_description = $('#english_description').val();
                const marathi_description = $('#marathi_description').val();
                const english_image = $('#english_image').val();
                const marathi_image = $('#marathi_image').val();
    
                // Update the old PDF values if there are any selected files
                if (english_image !== currentEnglishImage) {
                    $("#currentEnglishImage").val(english_image);
                }
                if (marathi_image !== currentMarathiImage) {
                    $("#currentMarathiImage").val(marathi_image);
                }
            }
    
            // Call the checkFormValidity function on file input change
            $('input, #english_image, #marathi_image').on('change', function() {
                checkFormValidity();
                validator.element(this); // Revalidate the file input
            });
    
            $.validator.addMethod("validImage", function(value, element) {
                // Check if a file is selected
                if (element.files && element.files.length > 0) {
                    var extension = element.files[0].name.split('.').pop().toLowerCase();
                    // Check the file extension
                    return (extension == "jpg" || extension == "jpeg" || extension == "png");
                }
                return true; // No file selected, so consider it valid
            }, "Only JPG, JPEG, PNG images are allowed.");
    
            $.validator.addMethod("fileSize", function(value, element, param) {
                // Check if a file is selected
                if (element.files && element.files.length > 0) {
                    // Convert bytes to KB
                    const fileSizeKB = element.files[0].size / 1024;
                    return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                }
                return true; // No file selected, so consider it valid
            }, "File size must be between {0} KB and {1} KB.");
    
            // Initialize the form validation
            var form = $("#regForm");
            var validator = form.validate({
                rules: {
                    english_title: {
                        required: true,
                    },
                    marathi_title: {
                        required: true,
                    },
                    english_description: {
                        required: true,
                    },
                    marathi_description: {
                        required: true,
                    },
                    english_image: {
                        validImage: true,
                        fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                    },
                    marathi_image: {
                        validImage: true,
                        fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                    },
                },
                messages: {
                    english_title: {
                        required: "Please Enter the Title",
                    },
                    marathi_title: {
                        required: "कृपया शीर्षक प्रविष्ट करा",
                    },
                    english_description: {
                        required: "Please Enter the Description",
                    },
                    marathi_description: {
                        required: "कृपया वर्णन प्रविष्ट करा",
                    },
                    english_image: {
                validImage: "Only JPG, JPEG, PNG images are allowed.",
                fileSize: "The file size must be between 180 KB and 2048 KB.",
            },
            marathi_image: {
                validImage: "फक्त JPG, JPEG, PNG छायाचित्रंना परवानगी आहे.",
                fileSize: "फाईलचा आकार 180 KB and 2048 KB दरम्यान असणे आवश्यक आहे.",
            },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
    
            // Submit the form when the "Update" button is clicked
            $("#submitButton").click(function() {
                // Validate the form
                if (form.valid()) {
                    form.submit();
                }
            });
    
            // You can remove the following two blocks if you don't need to display selected images on the page
            $("#english_image").change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Display the selected image for English
                    // You can remove this if you don't need to display the image on the page
                    $("#currentEnglishImageDisplay").attr('src', e.target.result);
                    validator.element("#english_image"); // Revalidate the file input
                };
                reader.readAsDataURL(this.files[0]);
            });
    
            $("#marathi_image").change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Display the selected image for Marathi
                    // You can remove this if you don't need to display the image on the page
                    $("#currentMarathiImageDisplay").attr('src', e.target.result);
                    validator.element("#marathi_image"); // Revalidate the file input
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
