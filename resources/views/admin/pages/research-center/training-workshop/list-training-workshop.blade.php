@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-training-workshop', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Training Materials And Workshops List
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ url('add-training-workshop') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                    @endif
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Training Materials And Workshops</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Training Materials And Workshops List</li>
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
                                                    <th>Title English</th>
                                                    <th>Title Marathi</th>
                                                    {{-- <th>URL</th> --}}
                                                    <th>English Pdf</th>
                                                    <th>Marathi Pdf</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($training_workshop as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><?php echo $item->english_title; ?></td>
                                                        <td><?php echo $item->marathi_title; ?></td>
                                                        <td> <a href="{{ asset('/storage/pdf/research-center/training/' . $item['english_pdf']) }}"
                                                                target="_blank"><img
                                                                    src="{{ asset('storage/pdf/pdf.png/') }}" width="35px"
                                                                    height="35px"></a></td>
                                                        <td> <a href="{{ asset('/storage/pdf/research-center/training/' . $item['marathi_pdf']) }}"
                                                                target="_blank"><img
                                                                    src="{{ asset('storage/pdf/pdf.png/') }}" width="35px"
                                                                    height="35px"></a></td>
                                                        <td class="d-flex">
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
                                                                    title="Delete Tender"><i class="fas fa-archive"></i></a>
                                                            @endif


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
        <form method="POST" action="{{ route('delete-training-workshop') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ route('show-training-workshop') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ route('edit-training-workshop') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->

    @endsection
