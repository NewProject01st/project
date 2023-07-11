@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-incident-model-info', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Report an Incident
                    {{-- @if (in_array('per_add', $data_permission))
                <a href="{{ route('add-incident-model-info') }}" class="btn btn-sm btn-primary ml-3">+
                    Add</a>
                @endif --}}

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Citizen Action</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Report an Incident: Modal Information</li>
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
                                                    <th>Incident Type</th>
                                                    <th>Location</th>
                                                    <th>Datetime</th>
                                                    <th>Mobile Number</th>
                                                    <th>description</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($modal_data as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->english_title }}</td>
                                                        <td>{{ $item->location }}</td>
                                                        <td>{{ $item->datetime }}</td>
                                                        <td>{{ $item->mobile_number }}</td>
                                                        <td>{{ strip_tags($item->description) }}</td>
                                                        <td> <img class="img-size"
                                                                src="{{ Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_VIEW') }}{{ $item->media_upload }}" />
                                                        </td>


                                                        <td>
                                                            <div class="d-flex">
                                                                {{-- @if (in_array('per_update', $data_permission))
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                @endif

                                                                <a data-id="{{ $item->id }}"
                                                                    class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                        class="fas fa-eye"></i></a> --}}
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
        <form method="POST" action="{{ url('/delete-incident-modal-info') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        {{--
    <form method="POST" action="{{ url('/show-incident-model-info') }}" id="showform">
        @csrf
        <input type="hidden" name="show_id" id="show_id" value="">
    </form>
    <form method="POST" action="{{ url('/edit-incident-model-info') }}" id="editform">
        @csrf
        <input type="hidden" name="edit_id" id="edit_id" value="">
    </form> --}}

        <!-- content-wrapper ends -->
    @endsection
