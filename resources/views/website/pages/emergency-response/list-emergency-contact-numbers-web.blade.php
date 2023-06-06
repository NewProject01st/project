    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>Emergency Response </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li> Emergency Contact Numbers </li>
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
                            @foreach ($data_output_new as $item)
                                <div class="deprt-txt">
                                    @if (session('language') == 'mar')
                                        <h3><?php echo $item['marathi_title']; ?> : </h3>
                                        <h3><?php echo $item['marathi_title']; ?> : </h3>
                                        <img src="{{ asset('storage/images/emergency-response/emergency-contact-numbers/' . $item['marathi_image']) }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    @else
                                        <h3><?php echo $item['english_title']; ?> : </h3>
                                        <img src="{{ asset('storage/images/emergency-response/emergency-contact-numbers/' . $item['english_image']) }}"
                                            class="d-block w-100" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                    @endif
                                </div>
                            @endforeach
                            <!--Department Details Txt End-->
                            <table class="table table-striped table-hover table-bordered border-dark">
                                <thead class="" style="background-color: #47194a; color:#fff">
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Contact Name</th>
                                        <th scope="col">Contact Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_output_array as $item)
                                        <tr class="">
                                            @if (session('language') == 'mar')
                                                <td>{{ $loop->iteration }}</td>
                                                <td><?php echo $item['marathi_emergency_contact_title']; ?></td>
                                                <td><?php echo $item['marathi_emergency_contact_number']; ?></td>
                                            @else
                                                <td>{{ $loop->iteration }}</td>
                                                <td><?php echo $item['english_emergency_contact_title']; ?></td>
                                                <td><?php echo $item['english_emergency_contact_number']; ?></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!--Sidebar Start-->
                        <div class="col-md-3">
                            <div class="sidebar">
                                <!--Widget Start-->
                                <div class="widget">
                                    <h4>Upcoming Events</h4>
                                    <div class="upcoming-events inner">
                                        <ul>
                                            <li>
                                                <div class="edate"> <strong>01</strong> May <span
                                                        class="year">2023</span> </div>
                                                <h6> <a href="#">Maharashtra battles forest fires</a> </h6>
                                                <span class="loc">Maharashtra, India</span>
                                            </li>
                                            <li>
                                                <div class="edate"> <strong>03</strong> May <span
                                                        class="year">2023</span> </div>
                                                <h6> <a href="#">Kerala floods displace thousands</a> </h6>
                                                <span class="loc">Maharashtra, India</span>
                                            </li>
                                            <li>
                                                <div class="edate"> <strong>06</strong> May <span
                                                        class="year">2023</span> </div>
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
    @endsection
