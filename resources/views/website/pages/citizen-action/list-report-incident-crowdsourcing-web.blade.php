    @extends('website.layout.master')

    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>Citizen Action </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li> Report Incident Crowdsourcing </li>
                </ul>
            </div>
        </section>
        <!--Subheader End-->
        <!--Main Content Start-->
        <div class="main-content p60">
            <!--Department Details Page Start-->
            <div class="department-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <!--Department Details Txt Start-->
                            @forelse ($data_output_new as $item)
                                <div class="deprt-txt">
                                    @if (session('language') == 'mar')
                                        <h3><?php echo $item['marathi_title']; ?> </h3>
                                        <img src="{{ Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_VIEW') }}{{ $item['marathi_image'] }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    @else
                                        <h3><?php echo $item['english_title']; ?> </h3>
                                        <img src="{{ Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_VIEW') }}{{ $item['english_image'] }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                    @endif
                                </div>
                            @empty
                                <h4>No Data Found For Report Incident Crowdsourcing</h4>
                            @endforelse
                            <!--Department Details Txt End-->
                            <!-- Button trigger modal -->
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn modal-btn-color" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Report an Incident
                                </button>
                            </div>
                        </div>
                        <!--Sidebar Start-->
                        <div class="col-md-3">
                            <div class="sidebar">
                                <!--Widget Start-->
                                @include('website.pages.training-event.upcoming-events')
                                <!--Widget End-->
                            </div>
                        </div>
                        <!--Sidebar End-->
                    </div>
                </div>
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="background: #000000ad !important;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Report an Incident : Crowdsorcing</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="{{ url('report-modal') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label modal_lable">Incident Type:</label>
                                        <select class="form-control" id="incident" name="incident">
                                            <option>Select</option>
                                            @foreach ($data_output_incident as $incidenttype)
                                                @if (session('language') == 'mar')
                                                    <option value="{{ $incidenttype['id'] }}" selected>
                                                        {{ $incidenttype['marathi_title'] }}</option>
                                                @else
                                                    <option value="{{ $incidenttype['id'] }}">
                                                        {{ $incidenttype['english_title'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label modal_lable">Location:</label>
                                        <input type="input" class="form-control" name="location" id="location" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label modal_lable">Date and Time:</label>
                                        <input type="datetime-local" class="form-control" name="datetime" id="datetime"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label modal_lable">Mobile Number:</label>
                                        <input type="input" class="form-control" name="mobile_number" id="mobile_number"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label modal_lable">Media Upload:</label><br>
                                        <input type="file" name="media_upload" id="media_upload" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label modal_lable">Description:</label>
                                        <textarea class="form-control" name="description" id="description" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endsection
