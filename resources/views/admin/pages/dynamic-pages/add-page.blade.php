@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Dynamic Page
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Dynamic Page</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action='{{ route('add-dynamic-page') }}' method="post"
                            enctype="multipart/form-data" id="regForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="col-md-6">

                                        <label for="menu_name_english">Main Menu</label>&nbsp<span
                                            class="red-text">*</span>
                                        <select class="form-select form-control" name="menu_data" id="menu_data"
                                            aria-label="Default select example">
                                            <option selected>Select Name</option>
                                            @foreach ($main_menu_data as $key=>$data)
                                            <option value="{{ $data['menu_id']}}_{{ $data['main_sub']}}">
                                                {{ $data['menu_name_english'] }}({{ $data['menu_name_marathi'] }})
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--   <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>&nbsp<span
                                            class="red-text">*</span>
                                                <textarea class="form-control" name="english_title" id="summernote"
                                                placeholder="Enter the Tilte"></textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi</label>&nbsp<span
                                            class="red-text">*</span>
                                                <textarea class="form-control" name="marathi_title" id="summernote1"
                                                placeholder="Enter the Tilte"></textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_description">Description English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control" name="english_description" id="summernote2"
                                            placeholder="Enter the Description"></textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php //echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_description">Description Marathi</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control" name="marathi_description" id="summernote3"
                                            placeholder="Enter the Description"></textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php //echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="publish_date">Publish Date</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                            name="publish_date" id="publish_date">
                                        @if ($errors->has('publish_date'))
                                        <span
                                            class="red-text"><?php echo $errors->first('publish_date', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
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
    @endsection