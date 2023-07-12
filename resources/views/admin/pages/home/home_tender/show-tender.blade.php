@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                Tender List
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-home-tender') }}" class="btn btn-sm btn-primary ml-3">Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Title :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label><?php echo $tenders->english_title; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>शीर्षक :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label><?php echo $tenders->marathi_title; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Description :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label><?php echo $tenders->english_description; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> वर्णन :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label><?php echo $tenders->marathi_description; ?></label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Tenders Date :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>{{ $tenders->tenders_date }}</label>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> URL :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label><?php echo $tenders->url; ?></label>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> Pdf :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a href="{{ asset('/storage/pdf/home-tenders/' . $tenders->english_pdf) }}"
                                                target="_blank"><img src="public/storage/pdf/home-tenders/pdf.png"
                                                    width="50px" height="50px"></a>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> पीडीएफ :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a href="{{ asset('/storage/pdf/home-tenders/' . $tenders->marathi_pdf) }}"
                                                target="_blank"><img src="public/storage/pdf/home-tenders/pdf.png"
                                                    width="50px" height="50px"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    @endsection
