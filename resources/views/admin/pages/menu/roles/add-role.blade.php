@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Role
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="roleformid" name="roleformid" method="post" role="form"
                                action="{{ route('add-role') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="role_name">Role Name</label>&nbsp<span class="red-text">*</span>
                                                <input type="text" class="form-control role_name" name="role_name"
                                                    id="role_name" value="{{ old('role_name') }}"
                                                    placeholder="Enter the Role Name">
                                                @if ($errors->has('role_name'))
                                                    <span class="red-text"><?php echo $errors->first('role_name', ':message'); ?></span>
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
                                        <div class="col-md-12 col-sm-12 text-center pt-3">
                                            <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                            {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
                                            <span><a href="{{ route('list-role') }}"
                                                    class="btn btn-sm btn-primary ">Back</a></span>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                  role_name: {
                        required: true,
                        charactersOnly: true // Use custom validation method
                    },
                  
                  },
                messages: {
                    role_name: {
                        required: "Title name is required",
                        charactersOnly: "Only characters are allowed." // Custom error message for custom validation method
                    },
                   
                   
                }
            });
        });
    </script> --}}

        <script>
            $(document).ready(function() {
                myFunction($("#role_id").val());
            });

            function myFunction(role_id) {
                $("#data_for_role").empty();
                $.ajax({
                    url: "{{ route('list-role-wise-permission') }}",
                    method: "POST",
                    data: {
                        "role_id": role_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $("#data_for_role").empty();
                        $("#data_for_role").append(data);
                    },
                    error: function(data) {}
                });
            }
        </script>

        <script>
            $(document).ready(function() {
                $.extend($.validator.methods, {
                    spcenotallow: function(b, c, d) {
                        if (!this.depend(d, c)) return "dependency-mismatch";
                        if ("select" === c.nodeName.toLowerCase()) {
                            var e = a(c).val();
                            return e && e.length > 0
                        }
                        return this.checkable(c) ? this.getLength(b, c) > 0 : b.trim().length > 0
                    }
                });
               
                $.validator.addMethod("alphanumericwithspace", function(value, element) {
                    var reg = /[0-9]/;
                    if (reg.test(value)) {
                        return false;
                    } else {
                        return true;
                    }
                }, "Number is not permitted");


                $("#roleformid").validate({
                    rules: {
                        user_type_id: {
                            required: true,
                        },
                        role_name: {
                            required: true,
                            spcenotallow: true,
                            alphanumericwithspace: true
                        }

                    },
                    messages: {
                        user_type_id: {
                            required: "Select User Type",
                        },
                        role_name: {
                            required: "Enter Role Name",
                            spcenotallow: "Enter Some Text",
                            alphanumericwithspace: "Enter Valid Input"

                        },

                    }
                });
            });
        </script>
    @endsection
