@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-dynamic-page', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Dynamic List
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ route('add-dynamic-page') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                    @endif

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dynamic Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Dynamic List</li>
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
                                                    <th>Page Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dynamic_page as $key => $item)
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td>{{ $item['menu_name'] }}</td>
                                                        <td class="d-flex">
                                                            @if (in_array('per_update', $data_permission))
                                                                <a data-id="{{ $item['id'] }}"
                                                                    class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                            @endif

                                                            {{-- <a data-id="{{ $item['id'] }}"
                                                        class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-eye"></i></a> --}}
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
        <form method="POST" action="{{ url('/delete-dynamic-page') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-dynamic-page') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="GET" action="{{ url('/edit-dynamic-page') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->
    @endsection
