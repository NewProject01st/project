@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Disaster Management Web Portal List
                    {{-- <a href="{{ route('add-disaster-management-web-portal') }}"
                    class="btn btn-sm btn-primary ml-3">+ Add</a> --}}
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Disaster Management Web Portal</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Disaster Management Web Portal List</li>
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
                                                    <th>Name English</th>
                                                    <th>Name Marathi</th>
                                                    <th>Title English</th>
                                                    <th>Title Marathi</th>
                                                    <th>Description English</th>
                                                    <th>Description Marathi</th>
                                                    <th>Designation English</th>
                                                    <th>Designation Marathi</th>
                                                    <th>English Image</th>
                                                    <th>Marathi Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($disaster_web_portal as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><?php echo $item->english_name; ?></td>
                                                        <td><?php echo $item->marathi_name; ?></td>
                                                        <td><?php echo $item->english_title; ?></td>
                                                        <td><?php echo $item->marathi_title; ?></td>
                                                        <td><?php echo $item->english_description; ?></td>
                                                        <td><?php echo $item->marathi_description; ?></td>
                                                        <td><?php echo $item->english_designation; ?></td>
                                                        <td><?php echo $item->marathi_designation; ?></td>
                                                        <td> <img
                                                                src="{{ asset('storage/images/disaster-webportal/' . $item->english_image) }}" />
                                                        </td>
                                                        <td> <img
                                                                src="{{ asset('storage/images/disaster-webportal/' . $item->marathi_image) }}" />
                                                        </td>

                                                        <td class="d-flex">
                                                            <a data-id="{{ $item->id }}"
                                                                class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                title="Delete Disaster Web Portal"><i
                                                                    class="fas fa-archive"></i></a>

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
        <form method="POST" action="{{ url('/delete-disaster-management-web-portal') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-disaster-management-web-portal') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/edit-disaster-management-web-portal') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->

    @endsection