@extends('website.layout.master')
@section('title', 'Applicant\'s Form')
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
                    @foreach ($department_information as $item)
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
                    @endforeach

                    <!--Department Details Txt End-->
                </div>
                <!--Sidebar Start-->
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="pb-3">
                            <button type="button" class="btn back-btn-color"><a href="{{ route('/') }}">
                                    Back</a>
                            </button>
                        </div>
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