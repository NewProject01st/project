@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Emergency Contact <a href="{{ route('add-emergency-contact') }}" class="btn btn-sm btn-primary ml-3">+
                    Add</a>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Emergency Contact </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Emergency Contact list </li>
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
                                                <th>English Address</th>
                                                <th>Marathi Address</th>
                                                <th>Email </th>
                                                <th>English No</th>
                                                <th>Marathi No</th>
                                                <th>English Landline No</th>
                                                <th>Marathi Landline No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emergency_contact as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><?php echo $item->english_name ?></td>
                                                <td><?php echo $item->marathi_name ?></td>
                                                <td><?php echo $item->english_address ?></td>
                                                <td><?php echo $item->marathi_address ?></td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->english_number }}</td>
                                                <td>{{ $item->marathi_number }}</td>
                                                <td>{{ $item->english_landline_no }}</td>
                                                <td>{{ $item->marathi_landline_no }}</td>

                                                <td class="d-flex">
                                                    <a data-id="{{ $item->id }}"
                                                        class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a data-id="{{ $item->id }}"
                                                        class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a data-id="{{ $item->id }}"
                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                        title="Delete Contact"><i class="fas fa-archive"></i></a>

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
    <form method="POST" action="{{ url('/delete-emergency-contact') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>
    <form method="POST" action="{{ url('/show-emergency-contact') }}" id="showform">
        @csrf
        <input type="hidden" name="show_id" id="show_id" value="">
    </form>
    <form method="POST" action="{{ url('/edit-emergency-contact') }}" id="editform">
        @csrf
        <input type="hidden" name="edit_id" id="edit_id" value="">
    </form>

    <!-- content-wrapper ends -->

    @endsection