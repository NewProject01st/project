@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            Constitution History List <a href="{{ url('/constitutionHistory/create') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">  Constitution History List</li>
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
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($constitutionHistoryModels as $item)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->english_title }}</td>
                                        <td>{{ $item->marathi_title }}</td>
                                        <td>{{ $item->english_description }}</td>       
                                        <td>{{ $item->marathi_description }}</td>    
                                                                            
                                                <!-- <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td> -->
                                                <td class="d-flex">
                                                    <a 
                                                    href="{{ url('/constitutionHistory/' . $item->id . '/edit') }}"
                                                        class="btn btn-sm btn-outline-info m-1"><i
                                                            class="fas fa-pencil-alt"></i></a>

                                                    <!-- <button class="btn btn-sm btn-outline-info"><i class="fas fa-pencil-alt"></i></button>-->
                                                    <a 
                                                    href="{{ url('/constitutionHistory/' . $item->id . '/show') }}"
                                                        class="btn btn-sm btn-outline-primary m-1"><i
                                                            class="fas fa-eye"></i></a>
                                                            
                                                            <form method="POST" action="{{ url('/constitutionHistory' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-sm btn-outline-danger m-1" type="submit" title="Delete Tender" onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fas fa-archive"></i></button>

                                                <!-- <button type="submit" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px"><path d="M 10 2 L 9 3 L 3 3 L 3 5 L 4.109375 5 L 5.8925781 20.255859 L 5.8925781 20.263672 C 6.023602 21.250335 6.8803207 22 7.875 22 L 16.123047 22 C 17.117726 22 17.974445 21.250322 18.105469 20.263672 L 18.107422 20.255859 L 19.890625 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 6.125 5 L 17.875 5 L 16.123047 20 L 7.875 20 L 6.125 5 z"/></svg></button> -->
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


    <!-- content-wrapper ends -->

    @endsection

