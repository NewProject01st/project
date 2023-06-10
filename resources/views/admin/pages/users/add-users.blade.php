@extends('admin.layout.master')
@section('content')
<style>
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
                            <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                                action="{{ route('add-users') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_uname">User Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="u_uname" id="u_uname"
                                                placeholder="" value="{{ old('u_uname') }}">
                                            @if ($errors->has('u_uname'))
                                                <span class="red-text"><?php echo $errors->first('u_uname', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_email">Email ID</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="u_email" id="u_email"
                                                placeholder="" value="{{ old('u_email') }}">
                                            @if ($errors->has('u_email'))
                                                <span class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_password">Password</label>&nbsp<span class="red-text">*</span>
                                            <input type="password" class="form-control" name="u_password" id="u_password"
                                                placeholder="" value="{{ old('u_password') }}">
                                            <span id="togglePassword" class="password-toggle"
                                                onclick="togglePasswordVisibility()">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            @if ($errors->has('u_password'))
                                                <span class="red-text"><?php echo $errors->first('u_password', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_id">Role Type</label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" id="role_id" name="role_id">
                                                <option>Select</option>
                                                @foreach ($roles as $role)
                                                    @if (old('role_id') == $role['id'])
                                                        <option value="{{ $role['id'] }}" selected>
                                                            {{ $role['role_name'] }}</option>
                                                    @else
                                                        <option value="{{ $role['id'] }}">{{ $role['role_name'] }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="red-text"><?php echo $errors->first('role_id', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="f_name">First Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="f_name" id="f_name"
                                                placeholder="" value="{{ old('f_name') }}">
                                            @if ($errors->has('f_name'))
                                                <span class="red-text"><?php echo $errors->first('f_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="m_name">Middle Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="m_name" id="m_name"
                                                placeholder="" value="{{ old('m_name') }}">
                                            @if ($errors->has('m_name'))
                                                <span class="red-text"><?php echo $errors->first('m_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="l_name">Last Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="l_name" id="l_name"
                                                placeholder="" value="{{ old('l_name') }}">
                                            @if ($errors->has('l_name'))
                                                <span class="red-text"><?php echo $errors->first('l_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="number">Mobile Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="number" id="number"
                                                placeholder="" value="{{ old('number') }}"
                                                onkeyup="addvalidateMobileNumber(this.value)">
                                            <span id="validation-message" class="red-text"></span>
                                            @if ($errors->has('number'))
                                                <span class="red-text"><?php echo $errors->first('number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation">Designation</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="designation"
                                                id="designation" placeholder="" value="{{ old('designation') }}">
                                            @if ($errors->has('number'))
                                                <span class="red-text"><?php echo $errors->first('designation', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="" value="{{ old('address') }}">
                                            @if ($errors->has('address'))
                                                <span class="red-text"><?php echo $errors->first('address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="adhar_no">Adhar No</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="adhar_no" id="adhar_no"
                                                placeholder="" value="{{ old('adhar_no') }}">
                                            @if ($errors->has('adhar_no'))
                                                <span class="red-text"><?php echo $errors->first('adhar_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state">State</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="state" id="state"
                                                placeholder="" value="{{ old('state') }}">
                                            @if ($errors->has('state'))
                                                <span class="red-text"><?php echo $errors->first('state', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="city" id="city"
                                                placeholder="" value="{{ old('city') }}">
                                            @if ($errors->has('city'))
                                                <span class="red-text"><?php echo $errors->first('city', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pincode">Pincode</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="pincode" id="pincode"
                                                placeholder="" value="{{ old('pincode') }}"
                                                onkeyup="addvalidatePincode(this.value)">
                                            <span id="validation-message-pincode" class="red-text"></span>
                                            @if ($errors->has('pincode'))
                                                <span class="red-text"><?php echo $errors->first('pincode', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Functionality Name</th>
                                                        <th>Add</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permissions as $key => $permission)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>
                                                                <input type="hidden" class="form-check-input"
                                                                    name="permission_id_{{ $permission['id'] }}"
                                                                    id="permission_id_{{ $permission['id'] }}"
                                                                    value="{{ $permission['id'] }}"
                                                                    data-parsley-multiple="permission_id">
                                                                {{ $permission['permission_name'] }}
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label">
                                                                    <?php $add_name = 'per_add_' . $permission['id']; ?>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="per_add_{{ $permission['id'] }}"
                                                                        id="per_add_{{ $permission['id'] }}"
                                                                        value="add_{{ $permission['id'] }}"
                                                                        data-parsley-multiple="per_add"
                                                                        {{ old($add_name) ? 'checked' : '' }}>

                                                                    <i class="input-helper"></i><i
                                                                        class="input-helper"></i></label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label">
                                                                    <?php $per_update = 'per_update_' . $permission['id']; ?>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="per_update_{{ $permission['id'] }}"
                                                                        id="per_update_{{ $permission['id'] }}"
                                                                        value="update_{{ $permission['id'] }}"
                                                                        data-parsley-multiple="per_update"
                                                                        {{ old($per_update) ? 'checked' : '' }}>

                                                                    <i class="input-helper"></i><i
                                                                        class="input-helper"></i></label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label">
                                                                    <?php $per_delete = 'per_delete_' . $permission['id']; ?>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="per_delete_{{ $permission['id'] }}"
                                                                        id="per_delete_{{ $permission['id'] }}"
                                                                        value="delete_{{ $permission['id'] }}"
                                                                        data-parsley-multiple="per_delete"
                                                                        {{ old($per_delete) ? 'checked' : '' }}>

                                                                    <i class="input-helper"></i><i
                                                                        class="input-helper"></i></label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-md-6">
                                        <div class="form-group form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="is_active"
                                                    id="is_active" value="y" data-parsley-multiple="is_active"
                                                    {{ old('is_active') ? 'checked' : '' }}>
                                                Is Active
                                                <i class="input-helper"></i><i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
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

        <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register").submit();
            }
        </script>
        <script>
            function addvalidateMobileNumber(number) {
                var mobileNumberPattern = /^\d*$/;
                var validationMessage = document.getElementById("validation-message");

                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Only numbers are allowed.";
                }
            }
        </script>
        <script>
            function addvalidatePincode(number) {
                var pincodePattern = /^\d*$/;
                var validationMessage = document.getElementById("validation-message-pincode");

                if (pincodePattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Only numbers are allowed.";
                }
            }
        </script>
        <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById("u_password");
                var toggleIcon = document.getElementById("togglePassword").querySelector("i");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                }
            }
        </script>
    @endsection
