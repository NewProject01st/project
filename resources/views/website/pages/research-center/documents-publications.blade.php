    @extends('website.layout.master')

    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_HEADING') }}
                    @else
                        {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_HEADING') }}
                    @endif
                </h2>
                <ul>
                    <li> <a href="{{ route('documents-publications') }}">
                            @if (session('language') == 'mar')
                                {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                            @else
                                {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_MAIN_LINK') }}
                            @endif
                        </a> </li>
                    <li>
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK1') }}
                        @else
                            {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_SUB_LINK1') }}
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
                                {{ Config::get('marathi.HOME_PAGE.DOCUMENT_PUBLICATIONS') }}
                            @else
                                {{ Config::get('english.HOME_PAGE.DOCUMENT_PUBLICATIONS') }}
                            @endif
                        </h3>
                        <table id="example" class="dataTable table table-striped table-hover table-bordered border-dark">
                            <thead class="" style="background-color: #47194a; color:#fff">
                                <tr>
                                    <th scope="col">
                                        <div class="d-flex justify-content-center">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_SR_NO') }}
                                            @else
                                                {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_SR_NO') }}
                                            @endif
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-center">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_TITLE') }}
                                            @else
                                                {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_TITLE') }}
                                            @endif
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-center">
                                            @if (session('language') == 'mar')
                                                {{ Config::get('marathi.RESOURCE_CENTER.RESOURCE_CENTER_DOWNLOAD_FIL') }}
                                            @else
                                                {{ Config::get('english.RESOURCE_CENTER.RESOURCE_CENTER_DOWNLOAD_FIL') }}
                                            @endif
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_output as $item)
                                    <tr class="">
                                        @if (session('language') == 'mar')
                                            <td class="set_tbl_td">{{ $loop->iteration }}</td>
                                            <td><?php echo $item['marathi_title']; ?></td>
                                            <td class="set_tbl_td"> <a
                                                    href="{{ Config::get('DocumentConstant.DOCUMENT_PUBLICATION_VIEW') }}{{ $item['marathi_pdf'] }}"
                                                    target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}"
                                                        width="35px" height="35px"></a>
                    </div>
                    </td>
                @else
                    <td class="set_tbl_td">{{ $loop->iteration }}</td>
                    <td><?php echo $item['english_title']; ?></td>
                    <td class="set_tbl_td"> <a
                            href="{{ Config::get('DocumentConstant.DOCUMENT_PUBLICATION_VIEW') }}{{ $item['english_pdf'] }}"
                            target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}" width="35px"
                                height="35px"></a>
                </div>
                </td>
                @endif
                </tr>
            @empty
                <h4>No Data Found For Documents Publications</h4>
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
