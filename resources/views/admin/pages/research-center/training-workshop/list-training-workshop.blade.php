@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-training-workshop', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Training Materials List
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ url('add-training-workshop') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                    @endif
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-training-workshop') }}">Training Materials</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Training Materials</li>
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
                                                    <th>Title </th>
                                                    <th>शीर्षक</th>
                                                    {{-- <th>URL</th> --}}
                                                    <th> Pdf</th>
                                                    <th> पीडीएफ </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($training_workshop as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ strip_tags($item->english_title) }}</td>
                                                        <td>{{ strip_tags($item->marathi_title) }}</td>
                                                        <td> <a href="{{ Config::get('DocumentConstant.TRAINING_MATERIAL_VIEW') }}{{ $item->english_pdf }}"
                                                                target="_blank"
                                                                alt=" {{ strip_tags($item['english_title']) }} pdf"><img
                                                                    src="{{ asset('assets/images/pdf.png/') }}"
                                                                    width="35px" height="35px"></a></td>
                                                        <td> <a href="{{ Config::get('DocumentConstant.TRAINING_MATERIAL_VIEW') }}{{ $item->marathi_pdf }}"
                                                                target="_blank"
                                                                alt=" {{ strip_tags($item['marathi_title']) }} pdf"><img
                                                                    src="{{ asset('assets/images/pdf.png/') }}"
                                                                    width="35px" height="35px"></a></td>
                                                                    <div class="d-flex">
                                                        <td>
                                                            @if (in_array('per_update', $data_permission))
                                                                <a href="{{ route('edit-training-workshop', base64_encode($item->id)) }}"
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


                                                        </td>
                                                                    </div>
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
        <form method="POST" action="{{ route('delete-training-workshop') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ route('show-training-workshop') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <!-- content-wrapper ends -->

    @endsection
