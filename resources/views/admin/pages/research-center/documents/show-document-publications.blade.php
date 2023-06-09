@extends('admin.layout.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row justify-content-center">
            <div class="col-7 grid-margin ">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                        <h3 class="page-title">
                            Documents And publications
                        </h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                        <div>
                            <a href="{{ route('list-document-publications') }}"
                                class="btn btn-sm btn-primary ml-3">Back</a>
                        </div>
                    </div>

                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Title English :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $documents_publications->english_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Title Marathi :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $documents_publications->marathi_title ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Description English :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $documents_publications->english_description; ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Description Marathi :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label><?php echo $documents_publications->marathi_description; ?></label>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>English Pdf :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <a href="{{ asset('/storage/pdf/research-center/documents' . $documents_publications->english_pdf) }}"
                                            target="_blank"><img
                                                src="public/storage/pdf/research-center/documents/pdf.png" width="50px"
                                                height="50px"></a>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>Marathi Pdf :</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <a href="{{ asset('/storage/pdf/research-center/documents' . $documents_publications->marathi_pdf) }}"
                                            target="_blank"><img
                                                src="public/storage/pdf/research-center/documents/pdf.png" width="50px"
                                                height="50px"></a>
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