@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Projects List <a href="{{ route('add-projects') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tender</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Projects List</li>
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
                                                    <th>Link English</th>
                                                    <th>Link Marathi</th>
                                                    <th>English Pdf</th>
                                                    <th>Marathi Pdf</th>
                                                  <th>Status</th> 
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projects as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->english_title }}</td>
                                                        <td>{{ $item->marathi_title }}</td>
                                                        <td><?php echo $item->english_description; ?></td>
                                                        <td><?php echo $item->marathi_description; ?></td>
                                                        <td>{{ $item->marathi_link }}</td>
                                                        <td>{{ $item->marathi_link }}</td>
                                                        <td>{{ $item->english_pdf }}</td>
                                                        <td>{{ $item->marathi_pdf }}</td>
                                                        <td>{{ $item->status }}</td>


                                                        <!-- <td>
                                                                <span class="badge badge-success">Active</span>
                                                            </td> -->
                                                        <td class="d-flex">
                                                            <a data-id="{{ $item->id }}"
                                                                class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <a data-id="{{ $item->id }}"
                                                                class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                title="Delete Tender"><i class="fas fa-archive"></i></a>

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
        <form method="POST" action="{{ url('/delete-projects') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-projects') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ url('/edit-projects') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->

    @endsection