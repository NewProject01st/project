@extends('admin.layout.master')
@section('content')
    <style>
        .error {
            color: red
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        .fa-eye-slash {
            /* display: none; */
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Users Master
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-users') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Users Master</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            
                            <form class="forms-sample" id="frm_register1" name="frm_register1" method="post" role="form"
                                action="{{ route('update-user-profile') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="f_name">First Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="f_name" id="f_name"
                                                placeholder=""
                                                value="@if (old('f_name')) {{ old('f_name') }}@else{{ $user_data->f_name }} @endif" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            @if ($errors->has('f_name'))
                                                <span class="red-text"><?php echo $errors->first('f_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="m_name">Middle Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="m_name" id="m_name"
                                                placeholder=""
                                                value="@if (old('m_name')) {{ old('m_name') }}@else{{ $user_data->m_name }} @endif" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            @if ($errors->has('m_name'))
                                                <span class="red-text"><?php echo $errors->first('m_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name">Last Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="l_name" id="l_name"
                                                placeholder=""
                                                value="@if (old('l_name')) {{ old('l_name') }}@else{{ $user_data->l_name }} @endif" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            @if ($errors->has('l_name'))
                                                <span class="red-text"><?php echo $errors->first('l_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_email">Email ID</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="u_email" id="u_email"
                                                placeholder="" readonly
                                                value="@if (old('u_email')) {{ old('u_email') }}@else{{ $user_data->u_email }} @endif">
                                            @if ($errors->has('u_email'))
                                                <span class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="u_password">Password</label>
                                            <input type="password" class="password form-control" name="u_password"
                                                id="u_password" placeholder=""
                                                value="@if (old('u_password')) {{ old('u_password') }} @endif">

                                            @if ($errors->has('u_password'))
                                                <span class="red-text"><?php echo $errors->first('u_password', ':message'); ?></span>
                                            @endif
                                            <span id="togglePassword" class="togglePpassword password-toggle"
                                                onclick="togglePasswordVisibility()">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="password_confirmation form-control"
                                                id="password_confirmation" name="password_confirmation"
                                                value="@if (old('password_confirmation')) {{ old('password_confirmation') }} @endif">

                                            <span id="password-error" class="error-message red-text"></span>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="red-text"><?php echo $errors->first('password_confirmation', ':message'); ?></span>
                                            @endif
                                            <span id="toggleConfirmPassword" class="toggleConfirmPpassword password-toggle"
                                                onclick="toggleConfirmPasswordVisibility()">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_password">Password</label>&nbsp<span class="red-text">*</span>
                                            <input type="password" class="form-control" name="u_password" id="u_password"
                                                placeholder=""
                                                value="@if (old('u_password')) {{ old('u_password') }}@endif">
                                            @if ($errors->has('u_password'))
                                                <span class="red-text"><?php //echo $errors->first('u_password', ':message');
                                                ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="designation">Designation</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="designation"
                                                id="designation" placeholder=""
                                                value="@if (old('designation')) {{ old('designation') }}@else{{ $user_data->designation }} @endif" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                            @if ($errors->has('designation'))
                                                <span class="red-text"><?php echo $errors->first('designation', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="number">Mobile Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="number" id="number"
                                                pattern="[789]{1}[0-9]{9}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                maxlength="10" minlength="10" placeholder=""
                                                value="@if(old('number')){{old('number')}}@else{{$user_data->number}}@endif"
                                                {{-- onkeyup="editvalidateMobileNumber(this.value)" --}}>
                                            <span id="edit-message" class="red-text"></span>
                                            @if ($errors->has('number'))
                                                <span class="red-text"><?php echo $errors->first('number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="user_profile"> Image</label>
                                            <input type="file" name="user_profile" class="form-control"
                                                 id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('user_profile'))
                                                <div class="red-text"><?php echo $errors->first('user_profile', ':message'); ?>
                                                </div>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.USER_PROFILE_VIEW') }}{{ $user_data->user_profile }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" class="form-check-input" name="edit_user_id"
                                            id="edit_user_id" value="{{ $user_data->id }}">

                                        <input type="hidden" class="form-check-input" name="old_number" id="old_number"
                                            value="{{ $user_data->number }}">

                                            <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                                Save &amp; Update
                                            </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-users') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register1").submit();
            }
        </script>
        <script>
            function editvalidateMobileNumber(number) {
                var mobileNumberPattern = /^\d*$/;
                var validationMessage = document.getElementById("edit-message");

                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Only numbers are allowed.";
                }
            }
        </script> --}}
        

       
<script>
    $(document).ready(function() {
        // Function to check if all input fields are filled with valid data
        function checkFormValidity() {
            // const u_email = $('#u_email').val();
            // const role_id = $('#role_id').val();
            // const u_password = $('#u_password').val();
            // const password_confirmation = $('#password_confirmation').val();
            const f_name = $('#f_name').val();
            const m_name = $('#m_name').val();
            const l_name = $('#l_name').val();
            const number = $('#number').val();
            const designation = $('#designation').val();
            // const address = $('#address').val();
            // const state = $('#state').val();
            // const city = $('#city').val();
            const english_image = $('#english_image').val();
            // const pincode = $('#pincode').val();

            // Enable the submit button if all fields are valid
            if (f_name && m_name && l_name && number && designation && english_image) {
                $('#submitButton').prop('disabled', false);
            } else {
                $('#submitButton').prop('disabled', true);
            }
        }

        // Call the checkFormValidity function on input change
        $('input, #english_image').on('input change',
            checkFormValidity);

        // Initialize the form validation
        $("#regForm").validate({
            rules: {
                // u_email: {
                //     required: true,
                // },
                // role_id: {
                //     required: true,
                // },
                // u_password: {
                //     required: true,
                // },
                // password_confirmation: {
                //     required: true,
                // },
                f_name: {
                    required: true,
                },
                m_name: {
                    required: true,
                },
                l_name: {
                    required: true,
                },
                number: {
                    required: true,
                },
                designation: {
                    required: true,
                },
                // address: {
                //     required: true,
                // },
                // state: {
                //     required: true,
                // },
                // city: {
                //     required: true,
                // },
                english_image: {
                    required: true,
                },
                // pincode: {
                //     required: true,
                // },

            },
            messages: {
                // u_email: {
                //     required: "Please Enter the Eamil",
                // },
                // role_id: {
                //     required: "Please Select Role Name",
                // },
                // u_password: {
                //     required: "Please Enter the Password",
                // },
                // password_confirmation: {
                //     required: "Please Enter the Confirmation Password",
                // },
                f_name: {
                    required: "Please Enter the First Name",
                },
                m_name: {
                    required: "Please Enter the Middle Name",
                },
                l_name: {
                    required: "Please Enter the Last Name",
                },
                number: {
                    required: "Please Enter the Number",
                },
                designation: {
                    required: "Please Enter the Designation",
                },
                // address: {
                //     required: "Please Enter the Address",
                // },

                // state: {
                //     required: "Please Select State",
                // },
                // city: {
                //     required: "Please Select State",
                // },
                user_profile: {
                    required: "Upload Media File",
                    accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                },
                // pincode: {
                //     required: "Please Enter the Pincode",
                // },
            },

        });
    });
</script>
    @endsection
