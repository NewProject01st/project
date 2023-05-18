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
                                    class="d-block w-100" alt="...">

                                {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div> --}}
                            </div>
                        @elseif (array_key_exists('english_title', $item))
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                                <img src="{{ asset('storage/images/slides/' . $slider['english_image']) }}"
                                    class="d-block w-100" alt="...">
                                {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div> --}}
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