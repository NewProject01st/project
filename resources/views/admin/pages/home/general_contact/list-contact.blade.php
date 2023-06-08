@extends('admin.layout.master')

@section('content')
<?php  $data_permission = getPermissionForCRUDPresentOrNot('list-general-contact',session('permissions')); 
                                            ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                General Contact
                @if (in_array("per_add", $data_permission))
                <a href="{{ route('add-general-contact') }}" class="btn btn-sm btn-primary ml-3">+
                    Add</a>
                @endif

            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> General Contact </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Contact list </li>
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
                                                <th>English Name</th>
                                                <th>Marathi Name</th>
                                                <th>English No</th>
                                                <th>Marathi No</th>
                                                <th>English Icon</th>
                                                <th>Marathi Icon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($general_contact as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><?php echo $item->english_name ?></td>
                                                <td><?php echo $item->marathi_name ?></td>
                                                <td>{{ $item->english_number }}</td>
                                                <td>{{ $item->marathi_number }}</td>
                                                <td> <img
                                                        src="{{ asset('storage/images/general_contact/' . $item->english_icon) }}" />
                                                </td>
                                                <td> <img
                                                        src="{{ asset('storage/images/general_contact/' . $item->marathi_icon) }}" />
                                                </td>
                                                <td>
                                                    <label class="switch">
                                                        <input data-id="{{ $item->id }}" type="checkbox"
                                                            {{ $item->is_active ? 'checked' : '' }}
                                                            class="active-btn btn btn-sm btn-outline-primary m-1"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ $item->is_active ? 'Active' : 'Inactive' }}">
                                                        <span class="slider round "></span>
                                                    </label>

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
                                                        title="Delete  Contact"><i class="fas fa-archive"></i></a>
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
    <form method="POST" action="{{ url('/delete-general-contact') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>
    <form method="POST" action="{{ url('/show-general-contact') }}" id="showform">
        @csrf
        <input type="hidden" name="show_id" id="show_id" value="">
    </form>
    <form method="POST" action="{{ url('/edit-general-contact') }}" id="editform">
        @csrf
        <input type="hidden" name="edit_id" id="edit_id" value="">
    </form>
    <form method="POST" action="{{ url('/update-one-general-contact') }}" id="activeform">
        @csrf
        <input type="hidden" name="active_id" id="active_id" value="">
    </form>

    <!-- content-wrapper ends -->

    @endsection