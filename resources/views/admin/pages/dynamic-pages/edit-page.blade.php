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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_description">Description English</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control" name="english_description" id="summernote2"
                                            placeholder="Enter the Description">
                                            {{ $html_english }}
                                        </textarea>
                                        @if ($errors->has('english_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_description">Description Marathi</label>&nbsp<span
                                            class="red-text">*</span>
                                        <textarea class="form-control" name="marathi_description" id="summernote3"
                                            placeholder="Enter the Description">
                                            {{ $html_marathi }}
                                        </textarea>
                                        @if ($errors->has('marathi_description'))
                                        <span
                                            class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="publish_date">Publish Date</label>&nbsp<span
                                            class="red-text">*</span>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                            value="{{ $get_publish_date }}" name="publish_date" id="publish_date">
                                        @if ($errors->has('publish_date'))
                                        <span
                                            class="red-text"><?php echo $errors->first('publish_date', ':message'); ?></span>
                                        @endif
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