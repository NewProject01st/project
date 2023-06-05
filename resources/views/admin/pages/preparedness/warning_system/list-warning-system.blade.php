@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<?php  $data_permission = getPermissionForCRUDPresentOrNot('list-early-warning-system',session('permissions')); 
                                            ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Early Warning System
                @if (in_array("per_add", $data_permission))
                <a href="{{ route('add-early-warning-system') }}" class="btn btn-sm btn-primary ml-3">+
                    Add</a>
                @endif

            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Early Warning System</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Early Warning System</li>
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
                                                <th>Title English</th>
                                                <th>Title Marathi</th>
                                                <th>Description English</th>
                                                <th>Description Marathi</th>
                                                <th>English Image</th>
                                                <th>Marathi Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($warning_system as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><?php echo $item->english_title; ?></td>
                                                <td><?php echo $item->marathi_title; ?></td>
                                                <td><?php echo $item->english_description; ?></td>
                                                <td><?php echo $item->marathi_description; ?></td>

                                                <td> <img
                                                        src="{{ asset('storage/images/preparedness/early-warning/' . $item->english_image) }}" />
                                                </td>
                                                <td> <img
                                                        src="{{ asset('storage/images/preparedness/early-warning/' . $item->marathi_image) }}" />
                                                </td>

                                                <td class="d-flex">
                                                    @if (in_array("per_update", $data_permission))
                                                    <a data-id="{{ $item->id }}"
                                                        class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    <a data-id="{{ $item->id }}"
                                                        class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-eye"></i></a>
                                                    @if (in_array("per_delete", $data_permission))
                                                    <a data-id="{{ $item->id }}"
                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                        title="Delete Early Warning System"><i
                                                            class="fas fa-archive"></i></a>
                                                    @endif

                                                </td>
                                            </tr>
                                            @endforeach

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
    <form method="POST" action="{{ url('/delete-early-warning-system') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>
    <form method="POST" action="{{ url('/show-early-warning-system') }}" id="showform">
        @csrf
        <input type="hidden" name="show_id" id="show_id" value="">
    </form>
    <form method="POST" action="{{ url('/edit-early-warning-system') }}" id="editform">
        @csrf
        <input type="hidden" name="edit_id" id="edit_id" value="">
    </form>

    <!-- content-wrapper ends -->

    @endsection