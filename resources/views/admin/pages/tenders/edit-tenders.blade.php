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
                            <form class="forms-sample" action='{{ route('list-tenders') }}' method="post" id="regForm">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_title">Title English</label>
                                            <input type="text" name="english_title" id="english_title"
                                                class="form-control" value="{{ $tenders->english_title }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title Marathi</label>
                                            <input type="text" name="marathi_title" id="marathi_title"
                                                class="form-control" value="{{ $tenders->marathi_title }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="english_description">Description English</label>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description">{{ $tenders->english_description }}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Description Marathi</label>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">{{ $tenders->marathi_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Tender Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="tender_date" id="tender_date" value="{{ $tenders->tender_date }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="start_date" id="start_date" value="{{ $tenders->start_date }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="end_date" id="end_date" value="{{ $tenders->end_date }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="open_date">Open Date</label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="open_date" id="open_date" value="{{ $tenders->open_date }}"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tender_number">Tender Number</label>
                                            <input type="tel" class="form-control" placeholder="Tender Number"
                                                name="tender_number" id="tender_number"
                                                value="{{ $tenders->tender_number }}" required="">
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
