@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Marquee
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Marquee</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                                action="{{ route('add-marquee') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title"
                                                name="english_title"></textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi</label>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title"
                                                name="marathi_title"></textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Submit</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                        <span><a href="{{ route('list-marquee') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                  english_title: {
                        required: true,
                        charactersOnly: true // Use custom validation method
                    },
                    marathi_title: {
                        required: true,
                        // maxlength: 20,
                        charactersOnly: true // Use custom validation method
                    },
                   
                  },
                messages: {
                  english_title: {
                        required: "Title name is required",
                        charactersOnly: "Only characters are allowed." // Custom error message for custom validation method
                    },
                    marathi_title: {
                      required: "Title name is required",
                      charactersOnly: "Only characters are allowed." // Custom error message for custom validation method
                    },
                    
                   
                }
            });
        });
    </script> --}}


    @endsection