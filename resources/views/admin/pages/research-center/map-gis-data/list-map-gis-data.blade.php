@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-map-lot-lons', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    MAP Lat Data List
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ url('add-map-lot-lons') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                    @endif
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Resource Center</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> MAP Lat Data List</li>
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
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Location Name</th>
                                                    <th>स्थानाचे नाव </th>
                                                    <th>Location Address</th>
                                                    <th>स्थान पत्ता</th>
                                                    {{-- <th>Data For</th> --}}
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($map_gis as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ strip_tags($item->lat) }}</td>
                                                        <td>{{ strip_tags($item->lon) }}</td>
                                                        <td>{{ strip_tags($item->location_name_english) }}</td>
                                                        <td>{{ strip_tags($item->location_name_marathi) }}</td>
                                                        <td>{{ strip_tags($item->location_address_english) }}</td>
                                                        <td>{{ strip_tags($item->location_address_marathi) }}</td>
                                                        {{-- <td>{{ strip_tags($item->data_for) }}</td> --}}
                                                        <td>
                                                            <div class="d-flex">
                                                                @if (in_array('per_update', $data_permission))
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                @endif
                                                                <a data-id="{{ $item->id }}"
                                                                    class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                        class="fas fa-eye"></i></a>
                                                                @if (in_array('per_delete', $data_permission))
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                        title="Delete Tender"><i
                                                                            class="fas fa-archive"></i></a>
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
        <form method="POST" action="{{ route('delete-map-lot-lons') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ route('show-map-lot-lons') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="GET" action="{{ route('edit-map-lot-lons') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->
    @endsection
