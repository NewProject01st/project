@extends('admin.layout.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Users Master
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                                                placeholder="" value="@if (old('f_name')) {{ old('f_name') }}@else{{ $user_data->f_name }} @endif">
                                            @if ($errors->has('f_name'))
                                                <span class="red-text"><?php echo $errors->first('f_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="m_name">Middle Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="m_name" id="m_name"
                                                placeholder="" value="@if (old('m_name')) {{ old('m_name') }}@else{{ $user_data->m_name }} @endif">
                                            @if ($errors->has('m_name'))
                                                <span class="red-text"><?php echo $errors->first('m_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name">Last Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="l_name" id="l_name"
                                                placeholder="" value="@if (old('l_name')) {{ old('l_name') }}@else{{ $user_data->l_name }} @endif">
                                            @if ($errors->has('l_name'))
                                                <span class="red-text"><?php echo $errors->first('l_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="designation">Designation</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="designation" id="designation"
                                                placeholder="" value="@if (old('designation')) {{ old('designation') }}@else{{ $user_data->designation }} @endif">
                                            @if ($errors->has('designation'))
                                                <span class="red-text"><?php echo $errors->first('designation', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_email">Email ID</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="u_email" id="u_email"
                                                placeholder="" readonly
                                                value="@if (old('u_email')) {{ old('u_email') }}@else{{$user_data->u_email }} @endif">

                                            @if ($errors->has('u_email'))
                                                <span class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_password">Password</label>&nbsp<span class="red-text">*</span>
                                            <input type="password" class="form-control" name="u_password" id="u_password"
                                                placeholder=""
                                                value="@if (old('u_password')) {{ old('u_password') }}@endif">
                                            @if ($errors->has('u_password'))
                                                <span class="red-text"><?php echo $errors->first('u_password', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="number">Mobile Number</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="number" id="number"
                                                placeholder=""
                                                value="@if(old('number')){{old('number')}}@else{{$user_data->number}}@endif"
                                                {{-- onkeyup="editvalidateMobileNumber(this.value)" --}}
                                                >
                                            <span id="edit-message" class="red-text"></span>
                                            @if ($errors->has('number'))
                                                <span class="red-text"><?php echo $errors->first('number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" class="form-check-input" name="edit_user_id" id="edit_user_id"
                                            value="{{ $user_data->id }}">

                                            {{-- <input type="hidden" class="form-check-input" name="f_name" id="f_name"
                                            value="{{ $user_data->f_name }}">

                                            <input type="hidden" class="form-check-input" name="m_name" id="m_name"
                                            value="{{ $user_data->m_name }}">

                                            <input type="hidden" class="form-check-input" name="l_name" id="l_name"
                                            value="{{ $user_data->l_name }}">

                                            <input type="hidden" class="form-check-input" name="designation" id="designation"
                                            value="{{ $user_data->designation }}">

                                            <input type="hidden" class="form-check-input" name="u_password" id="u_password"
                                            value="{{ $user_data->u_password }}"> --}}

                                            <input type="hidden" class="form-check-input" name="old_number" id="old_number"
                                            value="{{ $user_data->number }}">

                                        <button type="submit" class="btn btn-success">Save
                                            &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
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
    @endsection
