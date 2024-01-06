@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <style>
        .magnifying-glass-container {
            position: relative;
        }
    
        .magnifying-glass {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 1px solid #000;
            overflow: hidden;
        }
    
        .magnifying-glass-zoomed-text {
            font-size: 20px;
            font-weight: bold;
            line-height: 1.5;
            text-align: center;
            width: 100%;
            height: 100%;
        }
    
        .original-text {
            margin-top: 200px; /* Adjust this value based on your needs */
        }
    </style>
    <section class="wf100 subheader">
        <div class="container">
            <h2>Event </h2>
        </div>
        <div class="container">
                <h1>Magnifying Glass for Text</h1>
                <div class="magnifying-glass-container">
                    <div class="magnifying-glass">
                        <div class="magnifying-glass-zoomed-text"></div>
                    </div>
                    <div class="original-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum accumsan aliquet luctus.</p>
                    </div>
                </div>
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
                                    <img src="{{ Config::get('DocumentConstant.TRAINING_EVENT_VIEW') }}{{ $item['marathi_image'] }}"
                                        class="d-block w-100" alt="{{ strip_tags($item['marathi_title']) }} छायाचित्र">
                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> </h3>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const magnifyingGlass = document.querySelector(".magnifying-glass");
            const zoomedText = document.querySelector(".magnifying-glass-zoomed-text");
            const originalText = document.querySelector(".original-text p");
    
            originalText.addEventListener("mousemove", function (event) {
                const rect = originalText.getBoundingClientRect();
                const offsetX = event.clientX - rect.left;
                const offsetY = event.clientY - rect.top;
    
                const zoomRatio = 1.5; // Adjust the zoom level as needed
                const zoomedX = offsetX * zoomRatio;
                const zoomedY = offsetY * zoomRatio;
    
                magnifyingGlass.style.backgroundPosition = `-${zoomedX}px -${zoomedY}px`;
                zoomedText.textContent = originalText.textContent;
            });
    
            originalText.addEventListener("mouseout", function () {
                magnifyingGlass.style.backgroundPosition = "0 0";
                zoomedText.textContent = "";
            });
        });
    </script>
    <!--Main Content End-->
@endsection
