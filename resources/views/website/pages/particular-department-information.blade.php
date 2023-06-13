@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Department </h2>
            <ul>
                <li> <a href="{{ route('index') }}">Home</a> </li>

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
                        @forelse ($department_information as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $item['marathi_title']; ?> : </h3>
                                    <img src="{{ asset('storage/images/home/department-information/' . $item['marathi_image']) }}"
                                        class="d-block w-25" alt="...">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> : </h3>
                                    <img src="{{ asset('storage/images/home/department-information/' . $item['english_image_new']) }}"
                                        class="d-block w-25" alt="{{ $item['english_title'] }}">
                                    <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                @endif
                            </div>
                        @empty
                            <p>No Department Information</p>
                        @endforelse

                        <!--Department Details Txt End-->
                    </div>
                    <!--Sidebar Start-->
                    <div class="col-md-3">
                        <div class="pb-3">
                            <button type="button" class="btn back-btn-color"><a href="{{ route('/') }}">
                                    Back</a>
                            </button>
                        </div>

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
