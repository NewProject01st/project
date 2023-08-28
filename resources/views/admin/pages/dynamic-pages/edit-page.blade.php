@extends('admin.layout.master')
@section('content')
<style>
    .modal-title {
    margin-bottom: -20px !important;
    margin-top: -24px !important;
    }
    .modal-header .close {
    padding: 0rem !important;
    margin: -1rem -13rem -1rem 0px !important;
    }
</style>
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Dynamic Page
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-dynamic-page') }}">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Dynamic Page</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('update-dynamic-page') }}' method="post"
                                id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label for="menu_name_english">Main Menu</label>&nbsp<span
                                                    class="red-text">*</span>
                                                <select class="form-select form-control" name="menu_data" id="menu_data"
                                                    aria-label="Default select example" value="{{ old('menu_data') }}"
                                                    readonly>
                                                    <option value="">Select Name</option>
                                                    @foreach ($main_menu_data as $key => $data)
                                                        <option value="{{ $data['menu_id'] }}_{{ $data['main_sub'] }}"
                                                            @if ($menu_selected == $data['menu_id'] . '_' . $data['main_sub']) <?php echo 'selected'; ?> @endif>
                                                            {{ $data['menu_name_english'] }}({{ $data['menu_name_marathi'] }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('menu_data'))
                                                    <span class="red-text"><?php echo $errors->first('menu_data', ':message'); ?></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="english_title">Title</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="english_title"
                                                        id="english_title" placeholder="Enter the Tilte"
                                                        value="@if (old('english_title'))
                                                        {{ old('english_title') }}@else{{ $dynamic_page->english_title }}
                                                        @endif"/>
                                                    @if ($errors->has('english_title'))
                                                        <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="marathi_title">शीर्षक</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="marathi_title"
                                                        id="marathi_title" placeholder="शीर्षक प्रविष्ट करा"
                                                        value="@if (old('marathi_title'))
                                                        {{ old('marathi_title') }}@else{{ $dynamic_page->marathi_title }}
                                                        @endif"/>
                                                    @if ($errors->has('marathi_title'))
                                                        <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group" id="summernote_new_id">
                                            <label for="english_description">Page Content</label>&nbsp<span
                                                class="red-text">*</span>
                                                <span class="summernote1">
                                            <textarea class="form-control" name="english_description" id="summernote1" placeholder="Enter the Description">
                                             @if (old('english_description')){{ old('english_description') }}@else{{ $html_english }}@endif 
                                        </textarea>
                                                </span>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group" id="summernote_marathi_new_id">
                                            <label for="marathi_description">पृष्ठ सामग्री</label>&nbsp<span
                                                class="red-text">*</span>
                                                <span class="summernote2">
                                            <textarea class="form-control" name="marathi_description" id="summernote2" placeholder="पृष्ठ सामग्री प्रविष्ट करा">
                                                @if (old('marathi_description')){{ old('marathi_description') }}@else{{ $html_marathi }}@endif 
                                        </textarea>
                                                </span>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="meta_data">Page Meta Data</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control mb-2" name="meta_data" id="meta_data"
                                                        placeholder="Enter Page Meta Data"
                                                        value="@if (old('meta_data')) {{ old('meta_data') }}@else{{ $dynamic_page->meta_data }} @endif" />
                                                    @if ($errors->has('meta_data'))
                                                        <span class="red-text"><?php echo $errors->first('meta_data', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="publish_date">Publish Date</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD"
                                                      value="{{$get_publish_date}}"
                                                        value="@if (old('publish_date')) {{ old('publish_date') }}@else{{ $get_publish_date }} @endif" 
                                                        name="publish_date" id="publish_date">
                                                    @if ($errors->has('publish_date'))
                                                        <span class="red-text"><?php echo $errors->first('publish_date', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="hidden" name="edit_id" id="edit_id" class="form-control"
                                            value="{{ $edit_data_id }}">
                                            <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                                Save &amp; Update
                                            </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-dynamic-page') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        
        <script>
            var summernoteInstance1 = $('#summernote1').summernote({
                placeholder: 'Enter Content',
                tabsize: 2,
                height: 100
            });
    
            summernoteInstance1.summernote('disable');
    
            $('#summernote_new_id .note-editable').on('click', function() {
                summernoteInstance1.summernote('enable');
                summernoteInstance1.summernote('toolbar', [
                    ['style', ['bold', 'italic', 'underline']],
                    ['insert', ['link', 'picture']]
                ]);
            });
    
            var summernoteInstance2 = $('#summernote2').summernote({
                placeholder: 'Enter Content',
                tabsize: 2,
                height: 100
            });
    
            summernoteInstance2.summernote('disable');
    
            $('#summernote_marathi_new_id .note-editable').on('click', function() {
                summernoteInstance2.summernote('enable');
                summernoteInstance2.summernote('toolbar', [
                    ['style', ['bold', 'italic', 'underline']],
                    ['insert', ['link', 'picture']]
                ]);
            });
    </script>
        <!-- Summernote Editor End -->
            
<script>
    $(document).ready(function() {
        function checkFormValidity() {
            const menu_data = $('#menu_data').val();
             const english_title = $('#english_title').val();
             const marathi_title = $('#marathi_title').val();
             const summernote1 = $('#summernote1').val();
             const summernote2 = $('#summernote2').val();
             const meta_data = $('#meta_data').val();
             const publish_date = $('#publish_date').val();
        }
        // Call the checkFormValidity function on file input change
        $('input').on('change', function() {
            checkFormValidity();
            validator.element(this); // Revalidate the file input
        });
        // Initialize the form validation
        var form = $("#regForm");
        var validator = form.validate({
            rules: {
                 english_title: {
                     required: true,
                 },
                 marathi_title: {
                     required: true,
                 },
                 summernote1: {
                     required: true,
                 },
                 summernote2: {
                     required: true,
                 },
                 meta_data: {
                     required: true,
                 },
                 publish_date: {
                     required: true,
                 },
                 
             },
             messages: {
                 english_title: {
                     required: "Please Enter the Title",
                 },
                 marathi_title: {
                     required: "कृपया शीर्षक प्रविष्ट करा",
                 },
                 summernote1: {
                     required: "Please Enter the Description",
                 },
                 summernote2: {
                     required: "कृपया वर्णन प्रविष्ट करा",
                 },
                 meta_data: {
                     required: "Please Enter the URL",
                 },
                 publish_date: {
                    required: "Please Select Date",
                 },
             },
            submitHandler: function(form) {
                form.submit();
            }
        });
        // Submit the form when the "Update" button is clicked
        $("#submitButton").click(function() {
            // Validate the form
            if (form.valid()) {
                form.submit();
            }
        });
    });
</script>
    @endsection
