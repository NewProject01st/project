@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-metadata', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                {{-- <h3 class="page-title">
                    Policies Acts 
                    @if (in_array('per_add', $data_permission))
                    <a href="{{ route('add-metadata') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
            @endif
            </h3> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-metadata') }}">Metadata</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Metadata</li>
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
                                                    <th>Name</th>
                                                    <th>Keywords</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $metadata->id; ?></td>
                                                    <td><?php echo $metadata->english_name; ?></td>
                                                    <td><?php echo $metadata->keywords; ?></td>
                                                    <td class="d-flex">
                                                        @if (in_array('per_update', $data_permission))
                                                            <a  href="{{ route('edit-metadata', base64_encode($item->id)) }}"
                                                                class="btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                        @endif
                                                        <a data-id="{{ $metadata->id }}"
                                                            class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                class="fas fa-eye"></i></a>
                                                        @if (in_array('per_delete', $data_permission))
                                                            <a data-id="{{ $metadata->id }}"
                                                                class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                title="Delete Tender"><i class="fas fa-archive"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>


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
        <form method="POST" action="{{ url('/delete-metadata') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-metadata') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <!-- content-wrapper ends -->
    @endsection
