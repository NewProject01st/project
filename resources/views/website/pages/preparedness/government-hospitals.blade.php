@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_HEADING') }}
                @else
                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('disaster-management-act') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_SUB_LINK3') }}
                    @else
                        {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_SUB_LINK3') }}
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
                <div class="row deprt-txt">
                    <h3 class="stitle text-center d-flex justify-content-start">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_SUB_LINK3') }}
                        @else
                            {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_SUB_LINK3') }}
                        @endif
                    </h3>
                  
{{-- ============================================ --}}
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
            aria-selected="true">
            @if (session('language') == 'mar')
                {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_TAB1') }}
            @else
                {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_TAB1') }}
            @endif
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
            data-bs-target="#pills-profile" type="button" role="tab"
            aria-controls="pills-profile" aria-selected="false">
            @if (session('language') == 'mar')
                {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_TAB2') }}
            @else
                {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_TAB2') }}
            @endif
        </button>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        @if ($data_output && count($data_output) > 0)
            {{-- Display content for hospital_english_type = 1 --}}
            <table id="example" class="table table-striped table-hover table-bordered border-dark">
                <thead class="" style="background-color: #47194a; color:#fff">
                    <tr>
                        <th scope="col" class="d-flex justify-content-center">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_SR_NO') }}
                            @else
                                {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_SR_NO') }}
                            @endif
                        </th>
                        <th scope="col" class="">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_NAME') }}
                            @else
                                {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_NAME') }}
                            @endif
                        </th>
                        <th scope="col">
                            <div class="d-flex justify-content-center">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_AREA') }}
                                @else
                                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_AREA') }}
                                @endif
                            </div>
                        </th> 
                        <th scope="col">
                            <div class="d-flex justify-content-center">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_ADDRESS') }}
                                @else
                                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_ADDRESS') }}
                                @endif
                            </div>
                        </th>
                        <th scope="col">
                            <div class="d-flex justify-content-center">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_PINCODE') }}
                                @else
                                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_PINCODE') }}
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_output as $item)
                        @if ($item['hospital_english_type'] == 1)
                            <tr class="">
                                @if (session('language') == 'mar')
                                    <td><div class="d-flex justify-content-center">{{ $loop->iteration }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['marathi_name'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['marathi_area'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ strip_tags($item['marathi_address']) }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['marathi_pincode'] }}</div></td>                                        
                                @else
                                    <td><div class="d-flex justify-content-center">{{ $loop->iteration }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['english_name'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['english_area'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ strip_tags($item['english_address']) }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['english_pincode'] }}</div></td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            {{ 'No Data Available' }}
        @endif
    </div>

    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        @if ($data_output && count($data_output) > 0)
            {{-- Display content for hospital_english_type = 2 --}}
            <table id="example1" class="table table-striped table-hover table-bordered border-dark">
                <thead class="" style="background-color: #47194a; color:#fff">
                    <tr>
                        <th scope="col" class="justify-content-center">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_SR_NO') }}
                            @else
                                {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_SR_NO') }}
                            @endif
                        </th>
                        <th scope="col" class="">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_NAME') }}
                            @else
                                {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_NAME') }}
                            @endif
                        </th>
                        <th scope="col">
                            <div class="d-flex justify-content-center">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_AREA') }}
                                @else
                                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_AREA') }}
                                @endif
                            </div>
                        </th> 
                        <th scope="col">
                            <div class="d-flex justify-content-center">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_ADDRESS') }}
                                @else
                                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_ADDRESS') }}
                                @endif
                            </div>
                        </th>
                        <th scope="col">
                            <div class="d-flex justify-content-center">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_EMAIL') }}
                                @else
                                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_EMAIL') }}
                                @endif
                            </div>
                        </th>
                        <th scope="col">
                            <div class="d-flex justify-content-center">
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PREPAREDNESS.PREPAREDNESS_PINCODE') }}
                                @else
                                    {{ Config::get('english.PREPAREDNESS.PREPAREDNESS_PINCODE') }}
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_output as $item)
                        @if ($item['hospital_english_type'] == 2)
                            <tr class="">
                                @if (session('language') == 'mar')
                                    <td><div class="d-flex justify-content-center">{{ $loop->iteration }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['marathi_name'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['marathi_area'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ strip_tags($item['marathi_address']) }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['email'] }}</div></td>           
                                    <td><div class="d-flex justify-content-center">{{ $item['marathi_pincode'] }}</div></td>                               
                                @else
                                    <td><div class="d-flex justify-content-center">{{ $loop->iteration }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['english_name'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['english_area'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ strip_tags($item['english_address']) }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['email'] }}</div></td>
                                    <td><div class="d-flex justify-content-center">{{ $item['english_pincode'] }}</div></td>  
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            {{ 'No Data Available' }}
        @endif
    </div>
</div>



















                
                </div>
            </div>
        </div>
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
