@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-district-disaster-management-plan', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    District Disaster Management Plan
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ route('add-district-disaster-management-plan') }}" class="btn btn-sm btn-primary ml-3">+
                            Add</a>
                    @endif

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Policies and Legislation</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> District Disaster Management Plan</li>
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
                                                    <th>Title</th>
                                                    <th>शीर्षक</th>
                                                    <th>Year</th>
                                                    <th>PDF</th>
                                                    <th>पीडीएफ</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($district_management as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ strip_tags($item->english_title) }}</td>
                                                        <td>{{ strip_tags($item->marathi_title) }}</td>
                                                        <td>{{ strip_tags($item->policies_year) }}</td>
                                                        <td> <a href="{{ Config::get('DocumentConstant.STATE_DISASTER_PLAN_VIEW') }}{{ $item->english_pdf }}"
                                                                target="_blank"
                                                                alt=" {{ strip_tags($item['english_title']) }} pdf"><img
                                                                    src="{{ asset('assets/images/pdf.png/') }}"
                                                                    width="35px" height="35px"></a></td>
                                                        <td> <a href="{{ Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_VIEW') }}{{ $item->marathi_pdf }}"
                                                                target="_blank"
                                                                alt=" {{ strip_tags($item['marathi_title']) }} pdf"><img
                                                                    class="pdf-size"
                                                                    src="{{ asset('assets/images/pdf.png/') }}"
                                                                    width="35px" height="35px"></a></td>
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
                                                        <td>
                                                            <div class="d-flex">
                                                                @if (in_array('per_update', $data_permission))
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="edit-btn btn btn-sm btn-outline-primary m-1"
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
        <form method="POST" action="{{ url('/delete-district-disaster-management-plan') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-district-disaster-management-plan') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="GET" action="{{ url('/edit-district-disaster-management-plan') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>
        <form method="POST" action="{{ url('/update-one-disaster') }}" id="activeform">
            @csrf
            <input type="hidden" name="active_id" id="active_id" value="">
        </form>


        <!-- content-wrapper ends -->
    @endsection
