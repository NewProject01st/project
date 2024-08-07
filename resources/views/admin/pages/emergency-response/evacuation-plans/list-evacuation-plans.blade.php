 @extends('admin.layout.master')

 @section('content')
     <?php $data_permission = getPermissionForCRUDPresentOrNot('list-evacuation-plans', session('permissions'));
     ?>
     <div class="main-panel">
         <div class="content-wrapper mt-7">
             <div class="page-header">
                 <h3 class="page-title">
                     Evacuation Plans List
                     {{-- @if (in_array('per_add', $data_permission))
                         <a href="{{ route('add-evacuation-plans') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                     @endif --}}

                 </h3>
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ route('list-evacuation-plans') }}">Emergency Response</a></li>
                         <li class="breadcrumb-item active" aria-current="page"> Evacuation Plans</li>
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
                                                     <th>शीर्षक </th>
                                                     <th>Description </th>
                                                     <th>वर्णन </th>
                                                     <th>Image </th>
                                                     <th>छायाचित्र </th>
                                                     <!-- <th>Status</th> -->
                                                     <th>Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach ($evacuationplans as $item)
                                                     <tr>
                                                         <td>{{ $loop->iteration }}</td>
                                                         <td>{{ strip_tags($item->english_title) }}</td>
                                                         <td>{{ strip_tags($item->marathi_title) }}</td>
                                                         <td>{{ strip_tags($item->english_description) }}</td>
                                                         <td>{{ strip_tags($item->marathi_description) }}</td>
                                                         <td> <img class="img-size"
                                                                 src="{{ Config::get('DocumentConstant.EVACUATION_PLAN_VIEW') }}{{ $item->english_image }}"
                                                                 alt=" {{ strip_tags($item['english_title']) }} Image" />
                                                         </td>
                                                         <td> <img class="img-size"
                                                                 src="{{ Config::get('DocumentConstant.EVACUATION_PLAN_VIEW') }}{{ $item->marathi_image }}"
                                                                 alt=" {{ strip_tags($item['marathi_title']) }} छायाचित्र" />
                                                         </td>
                                                         <!-- <td>
                                                                                            <span class="badge badge-success">Active</span>
                                                                                        </td> -->
                                                         <td>
                                                             <div class="d-flex">
                                                                 @if (in_array('per_update', $data_permission))
                                                                     <a href="{{ route('edit-evacuation-plans', base64_encode($item->id)) }}"
                                                                         class="btn btn-sm btn-outline-primary m-1"><i
                                                                             class="fas fa-pencil-alt"
                                                                             title="Edit"></i></a>
                                                                 @endif

                                                                 <a data-id="{{ $item->id }}"
                                                                     class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                     title="Show"><i class="fas fa-eye"></i></a>
                                                                 {{-- @if (in_array('per_delete', $data_permission))
                                                                     <a data-id="{{ $item->id }}"
                                                                         class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                         title="Delete"><i class="fas fa-archive"></i></a>
                                                                 @endif --}}

                                                             </div>
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
         <form method="POST" action="{{ url('/delete-evacuation-plans') }}" id="deleteform">
             @csrf
             <input type="hidden" name="delete_id" id="delete_id" value="">
         </form>
         <form method="POST" action="{{ url('/show-evacuation-plans') }}" id="showform">
             @csrf
             <input type="hidden" name="show_id" id="show_id" value="">
         </form>
         <!-- content-wrapper ends -->
     @endsection
