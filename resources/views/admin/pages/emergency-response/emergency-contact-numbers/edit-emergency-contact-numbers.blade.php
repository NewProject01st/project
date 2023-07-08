@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Emergency Contact Numbers
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Emergency Response</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Emergency Contact Numbers</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.alert')
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-emergency-contact-numbers') }}"
                                method="post" id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title </label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title"
                                                name="english_title">
                                                    @if (old('english_title'))
{{ old('english_title') }}@else{{ $emergencycontact_data['emergencycontactnumbers']->english_title }}
@endif
                                                    </textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title"
                                                name="marathi_title">
                                                @if (old('marathi_title'))
{{ old('marathi_title') }}@else{{ $emergencycontact_data['emergencycontactnumbers']->marathi_title }}
@endif
                                                </textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="description">
                                                    @if (old('english_description'))
{{ old('english_description') }}@else{{ $emergencycontact_data['emergencycontactnumbers']->english_description }}
@endif
                                                    </textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="marathi_description">वर्णन </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">
                                                    @if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $emergencycontact_data['emergencycontactnumbers']->marathi_description }}
@endif
                                                    </textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image">Image </label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="english_image" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $emergencycontact_data['emergencycontactnumbers']->english_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image">प्रतिमा </label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                                class="form-control">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $emergencycontact_data['emergencycontactnumbers']->marathi_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 text-center">
                                    <input type="hidden" name="edit_id" id="edit_id"
                                        value="{{ $emergencycontact_data['emergencycontactnumbers']->id }}">
                                    <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                    <span><a href="{{ route('list-emergency-contact-numbers') }}"
                                            class="btn btn-sm btn-primary ">Back</a></span>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12 col-sm-12 text-center">

                            <div class="pt-3 d-flex justify-content-end" style="margin-bottom: 10px">
                                <a href="{{ route('add-more-emergency-contact-data') }}"
                                    class="btn btn-sm btn-primary ml-3">Add Contact
                                    Number</a>
                            </div>
                            <table class="table table-striped table-hover table-bordered border-dark">
                                <thead class="" style="background-color: #47194a; color:#fff">
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Emergency Contact Title</th>
                                        <th scope="col">आपत्कालीन संपर्क शीर्षक</th>
                                        <th scope="col">Emergency Contact Number</th>
                                        <th scope="col">आपत्कालीन संपर्क क्रमांक</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($add_more_contact_numbers as $key => $contact_data)
                                        <tr>
                                            <td scope="col">{{ $key + 1 }}</td>
                                            <td scope="col">{{ $contact_data['english_emergency_contact_title'] }}</td>
                                            <td scope="col">{{ $contact_data['marathi_emergency_contact_title'] }}</td>
                                            <td scope="col">{{ $contact_data['english_emergency_contact_number'] }}
                                            </td>
                                            <td scope="col">{{ $contact_data['marathi_emergency_contact_number'] }}
                                            </td>
                                            <td>
                                                <div class="d-flex">

                                                    <a data-id="{{ $contact_data['id'] }}"
                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                        title="Delete"><i class="fas fa-archive"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <h4 style="text-align: center">No Data Found For Emergency Contact</h4>
                                    @endforelse
                                </tbody>
                            </table>


                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <form method="POST" action="{{ url('/add-more-emergency-contact-data-delete') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>
@endsection
