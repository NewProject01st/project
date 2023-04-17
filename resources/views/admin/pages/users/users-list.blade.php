@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Users Master List <a href="{{route('add-users')}}" class="btn btn-sm btn-primary ml-3">+ Add</a>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Users </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">



                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>XYZ Company Ltd.</td>
                                                <td>Technical</td>
                                                
                                                <td>
                                                    <a href="designation_master.php"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="fas fa-pencil-alt"></i></a>

                                                    <!--                                <button class="btn btn-sm btn-outline-info"><i class="fas fa-pencil-alt"></i></button>-->
                                                    <button class="btn btn-sm btn-outline-primary"><i
                                                            class="fa fa-eye"></i></button>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- content-wrapper ends -->

    @endsection
