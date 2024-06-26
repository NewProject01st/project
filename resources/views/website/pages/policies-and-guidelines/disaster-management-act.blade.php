@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_HEADING') }}
                @else
                    {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('disaster-management-act') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_SUB_LINK5') }}
                    @else
                        {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_SUB_LINK5') }}
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
                            {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_SUB_LINK5') }}
                        @else
                            {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_SUB_LINK5') }}
                        @endif
                    </h3>
                    <table id="example" class="table table-striped table-hover table-bordered border-dark">
                        <thead class="" style="background-color: #47194a; color:#fff">
                            <tr>
                                <th scope="col" class="d-flex justify-content-center">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_SR_NO') }}
                                    @else
                                        {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_SR_NO') }}
                                    @endif
                                </th>
                                <th scope="col" class="">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_YEAR') }}
                                    @else
                                        {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_YEAR') }}
                                    @endif
                                </th>
                                <th scope="col">
                                    <div class="d-flex justify-content-center">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_TITLE') }}
                                        @else
                                            {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_TITLE') }}
                                        @endif
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex justify-content-center">
                                        @if (session('language') == 'mar')
                                            {{ Config::get('marathi.POLICIES_LEGISLATION.POLICIES_LEGISLATION_DOWNLOAD_FILE') }}
                                        @else
                                            {{ Config::get('english.POLICIES_LEGISLATION.POLICIES_LEGISLATION_DOWNLOAD_FILE') }}
                                        @endif
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_output as $item)
                                <tr class="">
                                    @if (session('language') == 'mar')
                                        <td>
                                            <div class="d-flex justify-content-center">{{ $loop->iteration }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">{{ $item['policies_year'] }}
                                            </div>
                                        </td>
                                        <td><?php echo $item['marathi_title']; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center"> <a
                                                    href="{{ Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_VIEW') }}{{ $item['marathi_pdf'] }}"
                                                    target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}"
                                                        width="35px" height="35px"></a></div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-flex justify-content-center">{{ $loop->iteration }}</div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">{{ $item['policies_year'] }}
                                            </div>
                                        </td>
                                        <td><?php echo $item['english_title']; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center"> <a
                                                    href="{{ Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_VIEW') }}{{ $item['english_pdf'] }}"
                                                    target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}"
                                                        width="35px" height="35px"></a>
                                                <div class="d-flex justify-content-center">
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                {{-- <h4>No Data Found For District Disaster Management Plan</h4> --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
