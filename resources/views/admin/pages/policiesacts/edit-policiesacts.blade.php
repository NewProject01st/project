@extends('admin.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Budget
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Constitution & History</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('list-policiesacts') }}' method="post"
                                id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>
                                            <input type="text" name="english_title" id="english_title"
                                                class="form-control" value="{{ $policiesacts->english_title }}"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi</label>
                                            <input type="text" name="marathi_title" id="marathi_title"
                                                class="form-control" value="{{ $policiesacts->marathi_title }}"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_description">Description English</label>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description">{{ $policiesacts->english_description }}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Description Marathi</label>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">{{ $policiesacts->marathi_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-success">Save &amp; Update</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            ClassicEditor
                .create(document.querySelector('.english_description'))
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('.marathi_description'))
                .catch(error => {
                    console.error(error);
                });
        </script>

    @endsection
