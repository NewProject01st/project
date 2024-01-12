@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Government Hospitals
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-govt-hospitals') }}">Preparedness</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Government Hospitals </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-govt-hospitals') }}"
                                method="POST" enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="menu_name_english">Type</label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="hospital_english_type" name="hospital_english_type">
                                                <option selected>Select</option>
                                                <option value="1">Govt Hospitals in Nashik</option>
                                                <option value="2">Primary Health Centre Information</option>
                                            </select>
                                            @if ($errors->has('hospital_english_type'))
                                            <span class="red-text"><?php echo $errors->first('hospital_english_type', ':message'); ?></span>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name">Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_name" id="english_name"
                                                placeholder="" value="{{ old('english_name') }}">
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name">नाव</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_name" id="marathi_name"
                                                placeholder="" value="{{ old('marathi_name') }}">
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_area">Area</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_area" id="english_area"
                                                placeholder="" value="{{ old('english_area') }}">
                                            @if ($errors->has('english_area'))
                                                <span class="red-text"><?php echo $errors->first('english_area', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_area">क्षेत्रफळ</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_area" id="marathi_area"
                                                placeholder="" value="{{ old('marathi_area') }}">
                                            @if ($errors->has('marathi_area'))
                                                <span class="red-text"><?php echo $errors->first('marathi_area', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_address">Address</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_address" id="english_description" placeholder="Enter the Title">{{ old('english_title') }}</textarea>
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_address">पत्ता</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_address" id="marathi_description" placeholder="शीर्षक प्रविष्ट करा">{{ old('marathi_title') }}</textarea>
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="hospital_type">
                                     <div class="row">  
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_phone">Phone</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="english_phone" id="english_phone"
                                                placeholder="" value="{{ old('english_phone') }}">
                                            @if ($errors->has('english_phone'))
                                                <span class="red-text"><?php echo $errors->first('english_phone', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_phone">फोन</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="marathi_phone" id="marathi_phone"
                                                placeholder="" value="{{ old('marathi_phone') }}">
                                            @if ($errors->has('marathi_phone'))
                                                <span class="red-text"><?php echo $errors->first('marathi_phone', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                     </div>
                                   </div>
                                    <div id="hospital_Primary">
                                        <div class="row"> 
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="english_pincode">Pincode</label>&nbsp<span class="red-text">*</span>
                                                    <input type="text" class="form-control" name="english_pincode" id="english_pincode"
                                                        placeholder="" value="{{ old('english_pincode') }}">
                                                    @if ($errors->has('english_pincode'))
                                                        <span class="red-text"><?php echo $errors->first('english_pincode', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="marathi_pincode">पिन कोड</label>&nbsp<span class="red-text">*</span>
                                                    <input type="text" class="form-control" name="marathi_pincode" id="marathi_pincode"
                                                        placeholder="" value="{{ old('marathi_pincode') }}">
                                                    @if ($errors->has('marathi_pincode'))
                                                        <span class="red-text"><?php echo $errors->first('marathi_pincode', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center mt-3">
                                        <button type="submit" class="btn btn-sm btn-success" >Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-govt-hospitals') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
              $('#hospital_english_type').on('change', function() {
                if ( this.value == '1')
                {
                  $("#hospital_type").show();
                }
                else
                {
                  $("#hospital_type").hide();
                }
              });
          });
      </script> 
        <script type="text/javascript">
            $(document).ready(function(){
              $('#hospital_english_type').on('change', function() {
                if ( this.value == '2')
                {
                  $("#hospital_Primary").show();
                }
                else
                {
                  $("#hospital_Primary").hide();
                }
              });
          });
      </script>
        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    // const email = $('#email').val();
                    const hospital_english_type = $('#hospital_english_type').val();
                    const english_name = $('#english_name').val();
                    const marathi_name = $('#marathi_name').val();
                    const english_area = $('#english_area').val();
                    const marathi_area = $('#marathi_area').val();
                    // const marathi_phone = $('#marathi_phone').val();
                    // const english_phone = $('#english_phone').val();
                    const english_address = $('#english_address').val();
                    const marathi_address = $('#marathi_address').val();
                    // const english_pincode = $('#english_pincode').val();
                    // const marathi_pincode = $('#marathi_pincode').val();
                    // Enable the submit button if all fields are valid
                    if (hospital_english_type && english_name && marathi_name && english_area && marathi_area &&
                         english_address && marathi_address) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input,textarea, select, #user_profile').on('input change',
                    checkFormValidity);
            
                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        // email: {
                        //     required: true,
                        //     email:true,
                        // },
                        hospital_english_type: {
                            required: true,
                        },
                        english_name: {
                            required: true,
                             spcenotallow: true,
                        },
                        marathi_name: {
                            required: true,
                             spcenotallow: true,
                        },
                        english_area: {
                            required: true,
                             spcenotallow: true,
                        },
                        marathi_area: {
                            required: true,
                             spcenotallow: true,
                        },
                        // marathi_phone: {
                        //     required: true,
                        //     marathi_phone:true,
                        // },
                        // english_phone: {
                        //     required: true,
                        // },
                        english_address: {
                            required: true,
                        },
                        marathi_address: {
                            required: true,
                        },
                        // english_pincode: {
                        //     required: true,
                        // },
                        // marathi_pincode: {
                        //     required: true,
                        // },
                    },
                    messages: {
                        // email: {
                        //     required: "Please Enter the Eamil",
                        // },
                        hospital_english_type: {
                            required: "Please Select Hospital Type",
                        },
                        english_name: {
                            required: "Please Enter the Name",
                            spcenotallow: "Enter Some Text",
                        },
                        marathi_name: {
                            required: "कृपया नाव प्रविष्ट करा",
                            spcenotallow: "काही मजकूर प्रविष्ट करा",
                        },
                        english_area: {
                            required: "Please Enter the Area",
                            spcenotallow: "Enter Some Text",
                        },                       
                        marathi_area: {
                            required: "कृपया क्षेत्र प्रविष्ट करा",
                            spcenotallow: "काही मजकूर प्रविष्ट करा",
                        },
                        // english_phone: {
                        //     required: "Please Enter the Phone",
                        // },
                        // marathi_phone: {
                        //     required: "कृपया फोन प्रविष्ट करा",
                        // },
                        english_address: {
                            required: "Please Enter the Address",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा",
                        },
                        // english_pincode: {
                        //     required: "Please Enter the Pincode",
                        // },
                        // marathi_pincode: {
                        //     required: "कृपया पिनकोड प्रविष्ट करा",
                        // },
                    },

                });
                $.validator.addMethod("spcenotallow", function (value, element) {
            if (element.nodeName.toLowerCase() === "select") {
                var val = $(element).val();
                return val && val.length > 0;
            }
            return this.checkable(element) ? this.getLength(value, element) > 0 : value.trim().length > 0;
        }, "Enter Some Text");
            });
        </script>
    @endsection
