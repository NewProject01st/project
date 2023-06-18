    @extends('website.layout.master')

    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_HEADING') }}
                    @else
                        {{ Config::get('english.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_HEADING') }}
                    @endif
                </h2>
                <ul>
                    <li> <a href="{{ route('index') }}">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_MAIN_LINK') }}
                            @else
                                {{ Config::get('english.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_MAIN_LINK') }}
                            @endif
                        </a> </li>
                    <li>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_SUB_LINK3') }}
                        @else
                            {{ Config::get('english.EMERGENCY_RESPONSES.EMERGENCY_RESPONSES_SUB_LINK3') }}
                        @endif
                    </li>
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
                                        <img src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $item['marathi_image'] }}"
                                            class="d-block w-100 to_set_img" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    @else
                                        <h3><?php echo $item['english_title']; ?> </h3>
                                        <img src="{{ Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_VIEW') }}{{ $item['english_image'] }}"
                                            class="d-block w-100 to_set_img" alt="...">
                                        <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                    @endif
                                </div>
                            @empty
                                <h4>No Data Found For Emergency Contact Numbers</h4>
                            @endforelse
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
                            @include('website.pages.training-event.upcoming-events')
                        </div>
                        <!--Sidebar End-->
                    </div>
                </div>
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->
    @endsection
