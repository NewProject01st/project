        {{-- Start Slider --}}
        <section>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($data_output_slider as $slider)
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($data_output_slider as $slider)
                        @if (session('language') == 'mar')
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                                <img src="{{ asset('storage/images/slides/' . $slider['marathi_image']) }}"
                                    class="d-block w-100" alt="No Image">
                                    <div class="carousel-caption">
                                        <h1><?php echo $slider['marathi_title']; ?></h1>
                                        <p><?php echo $slider['marathi_description']; ?> </p>
                                        <div class="slide-content-box pt-3"> <a href="{{ $slider['url'] }}" class="con"
                                                target="_blank">Read More</a> </div>
                                    </div>
                            </div>
                        @elseif (array_key_exists('english_title', $slider))
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                                <img src="{{ asset('storage/images/slides/' . $slider['english_image']) }}"
                                    class="d-block w-100" alt="No Image">
                                <div class="carousel-caption">
                                    <h1><?php echo $slider['english_title']; ?></h1>
                                    <p><?php echo $slider['english_description']; ?> </p>
                                    <div class="slide-content-box pt-3"> <a href="{{ $slider['url'] }}" class="con"
                                            target="_blank">Read More</a> </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        {{-- End Slider --}}


        
