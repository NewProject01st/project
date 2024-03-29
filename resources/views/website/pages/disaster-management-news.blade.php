@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                    {{ Config::get('marathi.NEW_PARTICULAR_DATA_WEB.DISASTER_MANAGEMENT_NEWS') }}
                @else
                    {{ Config::get('english.NEW_PARTICULAR_DATA_WEB.DISASTER_MANAGEMENT_NEWS') }}
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
                        @forelse ($disaster_news as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $item['marathi_title']; ?> </h3>
                                    <img src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $item['marathi_image'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['marathi_title']) }} छायाचित्र">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> </h3>
                                    <img src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $item['english_image'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['english_title']) }} Image">
                                    <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                @endif
                            </div>
                        @empty
                            <p>
                                @if (session('language') == 'mar')
                                    {{ Config::get('marathi.NEW_PARTICULAR_DATA_WEB.NO_DISASTER_NEWS') }}
                                @else
                                    {{ Config::get('english.NEW_PARTICULAR_DATA_WEB.NO_DISASTER_NEWS') }}
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
                                        {{ Config::get('marathi.NEW_PARTICULAR_DATA_WEB.BACK') }}
                                    @else
                                        {{ Config::get('english.NEW_PARTICULAR_DATA_WEB.BACK') }}
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
