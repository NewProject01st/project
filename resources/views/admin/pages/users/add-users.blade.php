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
                            action='{{ route('add-users') }}' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="u_email">Email ID</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="u_email" id="u_email"
                                            placeholder="">
                                        @if ($errors->has('u_email'))
                                        <span
                                            class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="u_uname">User Name</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="u_uname" id="u_uname"
                                            placeholder="">
                                        @if ($errors->has('u_uname'))
                                        <span
                                            class="red-text"><?php echo $errors->first('u_uname', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="u_password">Password</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="u_password" id="u_password"
                                            placeholder="">
                                        @if ($errors->has('u_password'))
                                        <span
                                            class="red-text"><?php echo $errors->first('u_password', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Role Type</label>&nbsp<span class="red-text">*</span>
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option>Select</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role_id'))
                                        <span
                                            class="red-text"><?php echo $errors->first('role_id', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="f_name">First Name</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="f_name" id="f_name"
                                            placeholder="">
                                        @if ($errors->has('f_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('f_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="m_name">Middle Name</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="m_name" id="m_name"
                                            placeholder="">
                                        @if ($errors->has('m_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('m_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="l_name">Last Name</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="l_name" id="l_name"
                                            placeholder="">
                                        @if ($errors->has('l_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('l_name', ':message'); ?></span>
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
                                                            <input type="checkbox" class="form-check-input"
                                                                name="per_add_{{ $permission['id'] }}"
                                                                id="per_add_{{ $permission['id'] }}"
                                                                value="add_{{ $permission['id'] }}"
                                                                data-parsley-multiple="per_add">

                                                            <i class="input-helper"></i><i
                                                                class="input-helper"></i></label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="per_update_{{ $permission['id'] }}"
                                                                id="per_update_{{ $permission['id'] }}"
                                                                value="update_{{ $permission['id'] }}"
                                                                data-parsley-multiple="per_update">

                                                            <i class="input-helper"></i><i
                                                                class="input-helper"></i></label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="per_delete_{{ $permission['id'] }}"
                                                                id="per_delete_{{ $permission['id'] }}"
                                                                value="delete_{{ $permission['id'] }}"
                                                                data-parsley-multiple="per_delete">

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
                                                id="is_active" value="y" data-parsley-multiple="is_active">
                                            Is Active
                                            <i class="input-helper"></i><i class="input-helper"></i></label>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save
                                        &amp; Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
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