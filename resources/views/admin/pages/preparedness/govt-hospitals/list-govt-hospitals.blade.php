@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-govt-hospitals', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Government Hospitals
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ route('add-govt-hospitals') }}" class="btn btn-sm btn-primary ml-3">+
                            Add</a>
                    @endif

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-govt-hospitals') }}">Preparedness</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Government Hospitals</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @include('admin.layout.alert')
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Hospital Type </th>
                                                    <th>Name </th>
                                                    <th>नाव </th>
                                                    <th>Area </th>
                                                    <th>क्षेत्रफळ </th>
                                                    <th>Address</th>
                                                    <th>पत्ता</th>
                                                    {{-- <th>Phone </th>
                                                    <th>फोन</th>
                                                    <th>Email</th>
                                                    <th>Pincode</th>
                                                    <th>पिन कोड</th> --}}
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($govt_hospitals as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($item->hospital_english_type == '1')
                                                                Govt Hospitals in Nashik
                                                            @elseif ($item->hospital_english_type == '2')
                                                                Primary Health Centre Information
                                                            @else
                                                                Unknown Type
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ strip_tags($item->hospital_english_type) }}</td> --}}
                                                        <td>{{ strip_tags($item->english_name) }}</td>
                                                        <td>{{ strip_tags($item->marathi_name) }}</td>
                                                        <td>{{ strip_tags($item->english_area) }}</td>
                                                        <td>{{ strip_tags($item->marathi_area) }}</td>
                                                        <td>{{ strip_tags($item->english_address) }}</td>
                                                        <td>{{ strip_tags($item->marathi_address) }}</td>
                                                        {{-- <td>{{ strip_tags($item->marathi_phone) }}</td>
                                                        <td>{{ strip_tags($item->english_phone) }}</td>
                                                        <td>{{ strip_tags($item->email) }}</td>
                                                        <td>{{ strip_tags($item->marathi_pincode) }}</td>
                                                        <td>{{ strip_tags($item->english_pincode) }}</td> --}}
                                                        <td>
                                                            <div class="d-flex">
                                                                @if (in_array('per_update', $data_permission))
                                                                    <a href="{{ route('edit-govt-hospitals', base64_encode($item->id)) }}"
                                                                        class="btn btn-sm btn-outline-primary m-1"
                                                                        title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                                @endif

                                                                <a data-id="{{ $item->id }}"
                                                                    class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                    title="Show"><i class="fas fa-eye"></i></a>
                                                                @if (in_array('per_delete', $data_permission))
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                        title="Delete"><i class="fas fa-archive"></i></a>
                                                                @endif
                                                            </div>
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
        <form method="POST" action="{{ url('/delete-govt-hospitals') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-govt-hospitals') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/edit-govt-hospitals') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>
        <!-- content-wrapper ends -->
    @endsection
