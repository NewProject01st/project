 @extends('admin.layout.master')

 @section('content')
     <?php $data_permission = getPermissionForCRUDPresentOrNot('list-emergency-contact-numbers', session('permissions'));
     ?>
     <div class="main-panel">
         <div class="content-wrapper">
             <div class="page-header">
                 <h3 class="page-title">
                     Emergency Contact Numbers List
                     {{-- @if (in_array('per_add', $data_permission))
                         <a href="{{ route('add-emergency-contact-numbers') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                     @endif --}}

                 </h3>
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="#">Emergency Response</a></li>
                         <li class="breadcrumb-item active" aria-current="page"> Emergency Contact Numbers</li>
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
                                                     <th>Sr. No.</th>
                                                     <th>Title </th>
                                                     <th>शीर्षक </th>
                                                     <th>Description </th>
                                                     <th>वर्णन </th>
                                                     <th>Image </th>
                                                     <th>प्रतिमा </th>
                                                     <!-- <th>Status</th> -->
                                                     <th>Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>

                                                 @foreach ($data_output_new as $item)
                                                     <tr>
                                                         <td>{{ $loop->iteration }}</td>
                                                         <td>{{ strip_tags($item->english_title) }}</td>
                                                         <td>{{ strip_tags($item->marathi_title) }}</td>
                                                         <td>{{ strip_tags($item->english_description) }}</td>
                                                         <td>{{ strip_tags($item->marathi_description) }}</td>
                                                         <td> <img class="img-size"
                                                                 src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $item->english_image }}" />
                                                         </td>
                                                         <td> <img class="img-size"
                                                                 src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $item->marathi_image }}" />
                                                         </td>
                                                         <!-- <td>
                                                                            <span class="badge badge-success">Active</span>
                                                                        </td> -->


                                                         <td>
                                                             <div class="d-flex">
                                                                 @if (in_array('per_update', $data_permission))
                                                                     <a data-id="{{ $item->id }}"
                                                                         class="edit-btn btn btn-sm btn-outline-primary m-1"
                                                                         title="Edit "><i
                                                                             class="fas fa-pencil-alt"></i></a>
                                                                 @endif

                                                                 <a data-id="{{ $item->id }}"
                                                                     class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                     title="Show "><i class="fas fa-eye"></i></a>
                                                                 {{-- @if (in_array('per_delete', $data_permission))
                                                                     <a data-id="{{ $item->id }}"
                                                                         class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                         title="Delete "><i class="fas fa-archive"></i></a>
                                                                 @endif --}}

                                                             </div>
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
         <form method="POST" action="{{ url('/delete-emergency-contact-numbers') }}" id="deleteform">
             @csrf
             <input type="hidden" name="delete_id" id="delete_id" value="">
         </form>
         <form method="POST" action="{{ url('/show-emergency-contact-numbers') }}" id="showform">
             @csrf
             <input type="hidden" name="show_id" id="show_id" value="">
         </form>
         <form method="GET" action="{{ url('/edit-emergency-contact-numbers') }}" id="editform">
             @csrf
             <input type="hidden" name="edit_id" id="edit_id" value="">
         </form>

         <!-- content-wrapper ends -->
     @endsection
