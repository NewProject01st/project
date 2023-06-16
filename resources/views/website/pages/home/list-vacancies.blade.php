@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.VACANCIES.VACANCIES_HEADING') }}
                @else
                    {{ Config::get('english.VACANCIES.VACANCIES_HEADING') }}
                @endif
            </h2>
            <ul>
                <li> <a href="{{ route('index') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.VACANCIES.VACANCIES_MAIN_LINK') }}
                        @else
                            {{ Config::get('english.VACANCIES.VACANCIES_MAIN_LINK') }}
                        @endif
                    </a> </li>
                <li>
                    @if (session('language') == 'mar')
                        {{ Config::get('marathi.VACANCIES.VACANCIES_SUB_LINK') }}
                    @else
                        {{ Config::get('english.VACANCIES.VACANCIES_SUB_LINK') }}
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
                    <h3 class="stitle text-center d-flex justify-content-start">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.VACANCIES.VACANCIES_HEADER') }}
                        @else
                            {{ Config::get('english.VACANCIES.VACANCIES_HEADER') }}
                        @endif
                    </h3>
                    <table id="order-listing" class="table table-striped table-hover table-bordered border-dark">
                        <thead class="" style="background-color: #47194a; color:#fff">
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Download File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_output as $item)
                                <tr class="">
                                    @if (session('language') == 'mar')
                                        <td>{{ $loop->iteration }}</td>
                                        <td><?php echo $item['marathi_title']; ?></td>
                                        <td> <a href="{{ Config::get('DocumentConstant.VACANCIES_PDF_VIEW') }}{{ $item['marathi_pdf'] }}"
                                                target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}"
                                                    width="35px" height="35px"></a></td>
                                    @else
                                        <td>{{ $loop->iteration }}</td>
                                        <td><?php echo $item['english_title']; ?></td>
                                        <td> <a href="{{ Config::get('DocumentConstant.VACANCIES_PDF_VIEW') }}{{ $item['english_pdf'] }}"
                                                target="_blank"><img src="{{ asset('assets/images/pdf.png/') }}"
                                                    width="35px" height="35px"></a></td>
                                    @endif
                                </tr>
                            @empty
                                <h4>No Data Found For Vacancies</h4>
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
