@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.PARTICULAR_DEPARTMENT_INFORMATION.DEPARTMENT') }}
                @else
                    {{ Config::get('english.PARTICULAR_DEPARTMENT_INFORMATION.DEPARTMENT') }}
                @endif
            </h2>
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
                                    <h3><?php echo $item['marathi_title']; ?> </h3>
                                    <img src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $item['marathi_image_new'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['marathi_title']) }} प्रतिमा">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                    <ul><li><a href="{{ $item['url'] }}" target="_blank"><?php echo $item['url']; ?></a></li></ul>
                                @else
                                    <h3><?php echo $item['english_title']; ?> </h3>
                                    <img src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $item['english_image_new'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['english_title']) }} Image">
                                    <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                    <ul><li><a href="{{ $item['url'] }}" target="_blank"><?php echo $item['url']; ?></a></li></ul>
                                @endif
                            </div>
                        @empty
                            <p>
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.PARTICULAR_DEPARTMENT_INFORMATION.NO_DEPARTMENT_INFORMATION') }}
                                @else
                                    {{ Config::get('english.PARTICULAR_DEPARTMENT_INFORMATION.NO_DEPARTMENT_INFORMATION') }}
                                @endif
                            </p>
                        @endforelse

                        <!--Department Details Txt End-->
                    </div>
                    <!--Sidebar Start-->
                    <div class="col-md-3">
                        {{-- <div class="pb-3">
                            <button type="button" class="btn back-btn-color"><a href="{{ route('/') }}">
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.PARTICULAR_DEPARTMENT_INFORMATION.BACK') }}
                                    @else
                                        {{ Config::get('english.PARTICULAR_DEPARTMENT_INFORMATION.BACK') }}
                                    @endif
                                </a>
                            </button>
                        </div> --}}

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
