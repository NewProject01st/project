@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-social-icon', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Social Icon
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ route('add-social-icon') }}" class="btn btn-sm btn-primary ml-3">+
                            Add</a>
                    @endif

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Social Icon</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Social Icon</li>
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
                                                    <th>Icon</th>
                                                    <th>Url</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($social_icon as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>

                                                        <td> <img
                                                                src="{{ asset('storage/images/header/social-icon/' . $item->icon) }}" />
                                                        </td>

                                                        <td>{{ $item->url }}</td>
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
                                                                        title="Delete Disaster News"><i
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
        <form method="POST" action="{{ url('/delete-social-icon') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-social-icon') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/edit-social-icon') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->

    @endsection
