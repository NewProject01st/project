    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>Citizen Action </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li> Volunteer Citizen Support </li>
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
                            @foreach ($data_output as $item)
                                <div class="deprt-txt">
                                    @if (session('language') == 'mar')
                                        <h3><?php echo $item['marathi_title']; ?> </h3>
                                        <img src="{{ asset('storage/images/citizen-action/crowdsourcing/' . $item['marathi_image']) }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    @else
                                        <h3><?php echo $item['english_title']; ?> </h3>
                                        <img src="{{ asset('storage/images/citizen-action/crowdsourcing/' . $item['english_image']) }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                    @endif
                                </div>
                            @endforeach
                            <!--Department Details Txt End-->
                        </div>
                        <!--Sidebar Start-->
                        <div class="col-md-3">
                            <div class="sidebar">
                                <div class="pb-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn modal-btn-color" data-bs-toggle="modal"
                                        data-bs-target="#exampleVolunteerModal">
                                        Citizen Volunteer
                                    </button>
                                </div>
                                <!--Widget Start-->
                                <div class="widget">
                                    <h4>Upcoming Events</h4>
                                    <div class="upcoming-events inner">
                                        <ul>
                                            <li>
                                                <div class="edate"> <strong>01</strong> May <span
                                                        class="year">2023</span>
                                                </div>
                                                <h6> <a href="#">Maharashtra battles forest fires</a> </h6>
                                                <span class="loc">Maharashtra, India</span>
                                            </li>
                                            <li>
                                                <div class="edate"> <strong>03</strong> May <span
                                                        class="year">2023</span>
                                                </div>
                                                <h6> <a href="#">Kerala floods displace thousands</a> </h6>
                                                <span class="loc">Maharashtra, India</span>
                                            </li>
                                            <li>
                                                <div class="edate"> <strong>06</strong> May <span
                                                        class="year">2023</span>
                                                </div>
                                                <h6> <a href="#">Odisha prepares for Cyclone Yaas.</a>
                                                </h6>
                                                <span class="loc">Maharashtra, India</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Widget End-->
                                <!--Widget Start-->
                                <div class="widget">
                                    <h4>Important Links</h4>
                                    <div class="archives inner">
                                        <ul>
                                            <li><a href="#">Emergency Services</a></li>
                                            <li><a href="#">Environmental Conditions</a></li>
                                            <li><a href="#">Disaster Preparedness</a></li>
                                            <li><a href="#">Disaster Response</a></li>
                                            <li><a href="#">Disaster Recovery</a></li>
                                            <li><a href="#">Volunteer Opportunities</a></li>
                                            <li><a href="#">Donations and Aid</a></li>
                                            <li><a href="#">Local Resources</a></li>
                                        </ul>
                                    </div>
                                </div>
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
        <div class="modal fade" id="exampleVolunteerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="background: #000000ad !important;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Be a Volunteer : Citizen Support</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="{{ url('volunteer-modal') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label modal_lable">Volunteer Type:</label>
                                        <select class="form-control" name="volunteer" id="volunteer">
                                            <option value="">Select Volunteer Type</option>
                                            <option value="fires">fires</option>
                                            <option value="crimes">crimes</option>
                                            <option value="natural">natural</option>
                                            <option value="disasters">disasters</option>
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
