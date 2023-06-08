@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-sub-header-info', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Sub Header Info
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ route('add-sub-header-info') }}" class="btn btn-sm btn-primary ml-3">+
                            Add</a>
                    @endif

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Sub Header Info </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Header Info </li>
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
                                                    {{-- <th>English Toll Free Title</th>
                                                <th>Marathi Toll Free Title</th> --}}
                                                    <th>English Toll Free No</th>
                                                    <th>Marathi Toll Free No</th>
                                                    {{-- <th>English City Title</th>
                                                <th>Marathi City Title</th> --}}
                                                    <th>English City </th>
                                                    <th>Marathi City </th>
                                                    <th>Logo</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subheader_info as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $item->english_tollfree_title }}</td>
                                                <td>{{ $item->marathi_tollfree_title }}</td> --}}
                                                        <td>{{ $item->english_tollfree_no }}</td>
                                                        <td>{{ $item->marathi_tollfree_no }}</td>
                                                        {{-- <td>{{ $item->english_city_title }}</td>
                                                <td>{{ $item->marathi_city_title }}</td> --}}
                                                        <td>{{ $item->english_city }}</td>
                                                        <td>{{ $item->marathi_city }}</td>
                                                        <td> <img
                                                                src="{{ asset('storage/images/header/sub-header/' . $item->logo) }}" />
                                                        </td>
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
                                                                        title="Delete Header Info"><i
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
        <form method="POST" action="{{ url('/delete-sub-header-info') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-sub-header-info') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/edit-sub-header-info') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->

    @endsection
