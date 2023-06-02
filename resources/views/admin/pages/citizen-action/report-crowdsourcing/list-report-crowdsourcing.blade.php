@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<?php  $data_permission = getPermissionForCRUDPresentOrNot('list-main-menu',session('permissions')); 
                                            ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Report a Incident: Crowdsourcing
                @if (in_array("per_add", $data_permission))
                <a href="{{ route('add-report-crowdsourcing') }}" class="btn btn-sm btn-primary ml-3">+
                    Add</a>
                @endif

            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Report a Incident: Crowdsourcing</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Report a Incident: Crowdsourcing</li>
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
                                            @foreach ($crowdsourcing as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><?php echo $item->english_title; ?></td>
                                                <td><?php echo $item->marathi_title; ?></td>
                                                <td><?php echo $item->english_description; ?></td>
                                                <td><?php echo $item->marathi_description; ?></td>

                                                <td> <img
                                                        src="{{ asset('storage/images/citizen-action/crowdsourcing/' . $item->english_image) }}" />
                                                </td>
                                                <td> <img
                                                        src="{{ asset('storage/images/citizen-action/crowdsourcing/' . $item->marathi_image) }}" />
                                                </td>

                                                <td class="d-flex">
                                                    @if (in_array("per_add", $data_permission))
                                                    <a data-id="{{ $item->id }}"
                                                        class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    @endif

                                                    <a data-id="{{ $item->id }}"
                                                        class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-eye"></i></a>
                                                    @if (in_array("per_add", $data_permission))

                                                    <a data-id="{{ $item->id }}"
                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                        title="Delete Disaster News"><i class="fas fa-archive"></i></a>
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
    <form method="POST" action="{{ url('/delete-report-crowdsourcing') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>
    <form method="POST" action="{{ url('/show-report-crowdsourcing') }}" id="showform">
        @csrf
        <input type="hidden" name="show_id" id="show_id" value="">
    </form>
    <form method="POST" action="{{ url('/edit-report-crowdsourcing') }}" id="editform">
        @csrf
        <input type="hidden" name="edit_id" id="edit_id" value="">
    </form>

    <!-- content-wrapper ends -->

    @endsection