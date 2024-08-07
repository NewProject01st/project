@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Event </h2>
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
                        @forelse ($event_data as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $item['marathi_title']; ?> </h3>
                                  <b><i class="fas fa-calendar-alt"></i><?php echo $item['start_date']; ?> - <?php echo $item['end_date']; ?></b>
                                    <img src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $item['marathi_image'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['marathi_title']) }} छायाचित्र">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> </h3>
                                    <b><i class="fas fa-calendar-alt"></i><?php echo $item['start_date']; ?> - <?php echo $item['end_date']; ?></b>
                                    <img src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $item['english_image'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['english_title']) }} Image">

                                    <p style="text-align: justify;"> <?php echo $item['english_description']; ?></p>
                                @endif
                            </div>
                        @empty
                            <p>No Disaster News</p>
                        @endforelse

                        <!--Department Details Txt End-->
                    </div>
                      <!--Sidebar Start-->
                      <div class="col-md-3">
                        {{-- <div class="pb-3">
                            <button type="button" class="btn back-btn-color"><a href="{{ route('upcoming-events-and-trainings') }}">
                                    Back</a>
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
