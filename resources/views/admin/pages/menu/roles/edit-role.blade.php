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
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Update Role</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('update-role') }}" method="post" id="regForm"
                            name="frm_register" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_name">Role Name</label>&nbsp<span class="red-text">*</span>
                                        <input class="form-control role_name" name="role_name" id="role_name"
                                            placeholder="Enter the Role Name" value="{{ $roles->role_name }}">
                                        @if ($errors->has('role_name'))
                                        <span
                                            class="red-text"><?php echo $errors->first('role_name', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <span><a href="{{ route('list-role') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $roles->id }}"
                                placeholder="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection