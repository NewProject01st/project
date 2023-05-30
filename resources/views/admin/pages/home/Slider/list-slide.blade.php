@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    {{-- <style>
        .toggle-button {
            padding: 4px 8px;
            border-radius: 4px;
        }

        .toggle-button.active {
            background-color: green !important;
            color: white;
        }

        .toggle-button.inactive {
            background-color: red !important;
            color: white;
        }

        .toggle-button .status-icon {
            margin-right: 4px;
        }
    </style> --}}
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Slides List <a href="{{ route('add-slide') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Slides List</li>
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
                                                    <th>Description English</th>
                                                    <th>Description Marathi</th>
                                                    <th>URL</th>
                                                    <th>Image English</th>
                                                    <th>Image Marathi</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($slider as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><?php echo $item->english_title; ?></td>
                                                        <td><?php echo $item->marathi_title; ?></td>
                                                        <td><?php echo $item->english_description; ?></td>
                                                        <td><?php echo $item->marathi_description; ?></td>
                                                        <td><?php echo $item->url; ?></td>
                                                        <td> <img
                                                                src="{{ asset('storage/images/slides/' . $item->english_image) }}" />
                                                        </td>
                                                        <td> <img
                                                                src="{{ asset('storage/images/slides/' . $item->marathi_image) }}" />
                                                        </td>
                                                        <td>
                                                            <button data-id="{{ $item->id }}" type="submit"
                                                                class="active-btn btn btn-sm btn-outline-primary m-1"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="{{ $item->is_active ? 'Active' : 'Inactive' }}">
                                                                <span
                                                                    class="status-icon {{ $item->is_active ? '1' : '0' }}">
                                                                    <i
                                                                        class="fa {{ $item->is_active ? 'fa-thumbs-up' : 'fa-thumbs-down' }}"></i>
                                                                </span>
                                                            </button>
                                                            {{-- <button data-id="{{ $item->id }}" type="submit"
                                                                class="active-btn btn btn-sm btn-outline-primary m-1 toggle-button {{ $item->is_active ? 'active' : 'inactive' }}"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="{{ $item->is_active ? 'Active' : 'Inactive' }}">
                                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                                            </button> --}}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a data-id="{{ $item->id }}"
                                                                class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                title="Delete Slide"><i class="fas fa-archive"></i></a>
                                                            </form>
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
        <form method="POST" action="{{ url('/delete-slide') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-slide') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/edit-slide') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>
        <form method="POST" action="{{ url('/update-active-slide') }}" id="activeform">
            @csrf
            <input type="hidden" name="active_id" id="active_id" value="">
        </form>
    @endsection
