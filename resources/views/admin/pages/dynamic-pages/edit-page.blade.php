@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Dynamic Page
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
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
                                                    <option selected>Select Name</option>
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
                                                    <input type="text" class="form-control" name="english_title"
                                                        id="english_title" placeholder="Enter the Tilte"
                                                        value="@if (old('english_title')) {{ old('english_title') }}@else{{ $dynamic_page->english_title }} @endif" />
                                                    @if ($errors->has('english_title'))
                                                        <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="marathi_title">शीर्षक</label>&nbsp<span
                                                        class="red-text">*</span>
                                                    <input type="text" class="form-control" name="marathi_title"
                                                        id="marathi_title" placeholder="शीर्षक प्रविष्ट करा"
                                                        value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $dynamic_page->marathi_title }} @endif" />
                                                    @if ($errors->has('marathi_title'))
                                                        <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Page Content</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control" name="english_description" id="summernote2" placeholder="Enter the Description">
                                            {{-- {{ $html_english }} --}}
                                            @if (old('english_description'))
{{ old('english_description') }}@else{{ $html_marathi }}
@endif
                                        </textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="marathi_description">Page Content</label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control" name="marathi_description" id="summernote3" placeholder="Enter the Description">
                                            {{-- {{ $html_marathi }} --}}
                                            @if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $html_marathi }}
@endif
                                        </textarea>
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
                                                    <input type="text" class="form-control" name="meta_data"
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
                                                    <input type="date" class="form-control" placeholder="YYYY-MM-DD"
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
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-danger">Cancel</button> --}}
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
        <!-- Summernote Editor -->
        <script>
            $('#summernote').summernote({
                placeholder: 'Enter English Title',
                tabsize: 2,
                height: 100
            });
        </script>
        <!-- Summernote Editor End -->
        <!-- Summernote Editor -->
        <script>
            $('#summernote1').summernote({
                placeholder: 'Enter Marathi Title',
                tabsize: 2,
                height: 100
            });
        </script>
        <!-- Summernote Editor End -->
        <!-- Summernote Editor -->
        <script>
            $('#summernote2').summernote({
                placeholder: 'Enter English Title',
                tabsize: 2,
                height: 100
            });
        </script>
        <!-- Summernote Editor End -->
        <!-- Summernote Editor -->
        <script>
            $('#summernote3').summernote({
                placeholder: 'Enter Marathi Title',
                tabsize: 2,
                height: 100
            });
        </script>
        <!-- Summernote Editor End -->
        <!-- Summernote Editor -->

        <script>
            $('#summernote4').summernote({
                placeholder: 'Enter English Title',
                tabsize: 2,
                height: 100
            });
        </script>
        <!-- Summernote Editor End -->
        <!-- Summernote Editor -->
        <script>
            $('#summernote5').summernote({
                placeholder: 'Enter Marathi Title',
                tabsize: 2,
                height: 100
            });
        </script>
        <!-- Summernote Editor End -->

        <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register").submit();
            }
        </script>

        <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register").submit();
            }
        </script>
    @endsection
