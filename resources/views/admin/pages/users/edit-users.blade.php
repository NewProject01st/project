@extends('admin.layout.master')
@section('content')
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
                                action="{{ route('update-users') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="u_email">Email ID</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="u_email" id="u_email"
                                            placeholder="" value="{{$user_data['data_users']['u_email']}}">
                                        @if ($errors->has('u_email'))
                                        <span
                                            class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="u_uname">User Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="u_uname" id="u_uname"
                                                placeholder="" value="{{ $user_data['data_users']['u_uname'] }}">
                                            @if ($errors->has('u_uname'))
                                                <span class="red-text"><?php echo $errors->first('u_uname', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="u_password">Password</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="u_password" id="u_password"
                                            placeholder="" value="{{decrypt($user_data['data_users']['u_password'])}}">
                                        @if ($errors->has('u_password'))
                                        <span
                                            class="red-text"><?php echo $errors->first('u_password', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div> --}}

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role_id">Role Type</label>&nbsp<span class="red-text">*</span>
                                            <select class="form-control" id="role_id" name="role_id">
                                                <option>Select</option>
                                                @foreach ($user_data['roles'] as $role)
                                                    <option value="{{ $role['id'] }}"
                                                        @if ($role['id'] == $user_data['data_users']['role_id']) <?php echo 'selected'; ?> @endif>
                                                        {{ $role['role_name'] }}</option>
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
                                                placeholder="" value="{{ $user_data['data_users']['f_name'] }}">
                                            @if ($errors->has('f_name'))
                                                <span class="red-text"><?php echo $errors->first('f_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="m_name">Middle Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="m_name" id="m_name"
                                                placeholder="" value="{{ $user_data['data_users']['m_name'] }}">
                                            @if ($errors->has('m_name'))
                                                <span class="red-text"><?php echo $errors->first('m_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="l_name">Last Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="l_name" id="l_name"
                                                placeholder="" value="{{ $user_data['data_users']['l_name'] }}">
                                            @if ($errors->has('l_name'))
                                                <span class="red-text"><?php echo $errors->first('l_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="number">Number</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="number" id="number"
                                                placeholder="" value="{{ $user_data['data_users']['number'] }}">
                                            @if ($errors->has('number'))
                                                <span class="red-text"><?php echo $errors->first('number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation">Designation</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="designation" id="designation"
                                                placeholder="" value="{{ $user_data['data_users']['designation'] }}">
                                            @if ($errors->has('designation'))
                                                <span class="red-text"><?php echo $errors->first('designation', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="" value="{{ $user_data['data_users']['address'] }}">
                                            @if ($errors->has('address'))
                                                <span class="red-text"><?php echo $errors->first('address', ':message'); ?></span>
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
                                                    @foreach ($user_data['permissions'] as $key => $permission)
                                                        <?php
                                                        $permissions_id = '';
                                                        $per_add = '';
                                                        $per_update = '';
                                                        $per_delete = '';
                                                        $data_all = $user_data['permissions_user'];
                                                        foreach ($data_all as $key_new => $permissions_data) {
                                                            if ($permissions_data['permissions_id'] == $permission['id']) {
                                                                $permissions_id = $permissions_data['permissions_id'];
                                                                $per_add = $permissions_data['per_add'];
                                                                $per_update = $permissions_data['per_update'];
                                                                $per_delete = $permissions_data['per_delete'];
                                                            }
                                                        }
                                                        ?>
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
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="per_add_{{ $permission['id'] }}"
                                                                        id="per_add_{{ $permission['id'] }}"
                                                                        value="add_{{ $permission['id'] }}"
                                                                        data-parsley-multiple="per_add"
                                                                        @if ($per_add) <?php echo 'checked'; ?> @endif>

                                                                    <i class="input-helper"></i><i
                                                                        class="input-helper"></i></label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="per_update_{{ $permission['id'] }}"
                                                                        id="per_update_{{ $permission['id'] }}"
                                                                        value="update_{{ $permission['id'] }}"
                                                                        data-parsley-multiple="per_update"
                                                                        @if ($per_update) <?php echo 'checked'; ?> @endif>

                                                                    <i class="input-helper"></i><i
                                                                        class="input-helper"></i></label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="per_delete_{{ $permission['id'] }}"
                                                                        id="per_delete_{{ $permission['id'] }}"
                                                                        value="delete_{{ $permission['id'] }}"
                                                                        data-parsley-multiple="per_delete"
                                                                        @if ($per_delete) <?php echo 'checked'; ?> @endif>

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
                                                    @if ($user_data['data_users']['is_active']) <?php echo 'checked'; ?> @endif>
                                                Is Active
                                                <i class="input-helper"></i><i class="input-helper"></i></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" class="form-check-input" name="edit_id" id="edit_id"
                                            value="{{ $user_data['data_users']['id'] }}">
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
    @endsection
