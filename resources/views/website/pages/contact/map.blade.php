@extends('website.layout.master')
@section('content')
    <!--Sub Header Start-->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBciNFt_xYpjx_QaQZXKAyRJn7sLUwMPds"></script> --}}
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.CONTACT_US.CONTACT_US_HEADING') }}
                @else
                    {{ Config::get('english.CONTACT_US.CONTACT_US_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('index') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK2') }}
                    @else
                        {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK2') }}
                    @endif
                </li>
            </ul>
        </div>
    </section>
    <!--Sub Header End-->

    <!--Main Content Start-->
    <div class="main-content">

        <!-- Google Map with Contact Form -->
        <div class="map-form p80">
            <div class="container">
                <div class="row deprt-txt">
                    {{-- <h3 class="stitle text-center d-flex justify-content-start">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.MAPS_GIS_DATA') }}
                        @else
                            {{ Config::get('english.HOME_PAGE.MAPS_GIS_DATA') }}
                        @endif
                    </h3> --}}
                    <div class="col-md-12 col-lg-12 col-md-12">
                        {{-- <div id="mapa" style="height: 600px; width: 100%" class="deprt-txt"></div> --}}
                        {{-- <h3 class="stitle text-center d-flex justify-content-start mt-5">
                            @if (session('language') == 'mar')
                            {{ Config::get('marathi.HOME_PAGE.MAPS_GIS_DATA_DETAILS') }}
                            @else
                            {{ Config::get('english.HOME_PAGE.MAPS_GIS_DATA_DETAILS') }}
                            @endif
                        </h3> --}}
                     
                        <table id="order-listing" class="table table-striped table-hover table-bordered border-dark">
                            <thead class="" style="background-color: #47194a; color:#fff">
                                <tr>
                                    <th scope="col">
                                        <div class="d-flex justify-content-center">Sr. No.</div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-center">Name</div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-center">Location</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_output as $key=>$item)
                                    <tr class="">
                                        @if (session('language') == 'mar')
                                            <td class="set_tbl_td">{{ $key + 1 }}</td>
                                            <td><?php echo $item['location_name_marathi']; ?></td>
                                            <td><?php echo $item['location_address_marathi']; ?></td>
                                        @else
                                            <td class="set_tbl_td">{{ $key + 1 }}</td>
                                            <td><?php echo $item['location_name_english']; ?></td>
                                            <td><?php echo $item['location_address_english']; ?></td>
                                        @endif
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map with Contact Form End -->
    </div>
    <!--Main Content End-->
    <script>
        var map,
            infowindow = null;

        function initialize() {
            var latlng = new google.maps.LatLng(19.9975, 73.7898);

            var options = {
                zoom: 12,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("mapa"), options);
        }

        // Adds a marker to the map.
        function addMarker(location, map, address) {
            var marker = new google.maps.Marker({
                position: location,
                title: address,
                map: map
            });

            var infowindow = new google.maps.InfoWindow({
                content: '<h4>' + address + '</h5>'
            });
            infowindow.open(map, marker);
            // Show the infowindow with the content, and the close it after 2 seconds
            //google.maps.event.addListener(marker, 'click', function () {
            //	infowindow.open(map, marker);
            //setTimeout(function () { infowindow.close(); }, 2000);
            //});
        }

        // Initialize Map
        initialize();
        /// Add the markers based on the longitude and latitude
        $.ajax({
            url: "{{ route('information-map-ajax') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $.each(data, function(i, item) {
                    addMarker({
                        lat: parseFloat(item.lat),
                        lng: parseFloat(item.lon)
                    }, map, item.location_address_english);
                });
            },
            error: function(data) {}
        });
    </script>
@endsection
