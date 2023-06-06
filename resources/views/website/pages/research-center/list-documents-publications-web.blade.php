    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <!--Subheader Start-->
        <section class="wf100 subheader">
            <div class="container">
                <h2>Resource Center</h2>
                <ul>
                    <li> <a href="{{ route('index') }}">Home</a> </li>
                    <li> Documents Publications </li>
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
                        <table class="table table-striped table-hover table-bordered border-dark">
                            <thead class="" style="background-color: #47194a; color:#fff">
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Download File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_output as $item)
                                    <tr class="">
                                        @if (session('language') == 'mar')
                                        <td>{{ $loop->iteration }}</td>
                                        <td><?php echo $item['marathi_title']; ?></td>
                                        <td> <a href="{{ asset('/storage/pdf/research-center/documents/' . $item['marathi_pdf']) }}"
                                                target="_blank"><img src="{{ asset('storage/pdf/pdf.png/') }}"
                                                    width="35px" height="35px"></a></td>
                                        @else
                                            <td>{{ $loop->iteration }}</td>
                                            <td><?php echo $item['english_title']; ?></td>
                                            <td> <a href="{{ asset('/storage/pdf/research-center/documents/' . $item['english_pdf']) }}"
                                                    target="_blank"><img src="{{ asset('storage/pdf/pdf.png/') }}"
                                                        width="35px" height="35px"></a></td>
                                        @endif
                                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Department Details Page End-->
        </div>
        <!--Main Content End-->
    @endsection
