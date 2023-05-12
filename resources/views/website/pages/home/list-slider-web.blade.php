    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <div>
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach ($data_output as $slider)
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                  @endforeach
                </ol>
                <div class="carousel-inner">
                  @foreach ($data_output as $slider)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/images/slides/' .  $slider['english_image']) }}" class="d-block w-100" >
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </a>
              </div>
              











            {{-- @foreach ($data_output as $item)
                <div class="container-fluid">
                    @if (session('language') == 'mar')
                        <div>
                                <img src="{{ asset('storage/images/slides/' . $item['marathi_image']) }}" />
                        </div>
                       
                    @else
                        <div>
                            <img src="{{ asset('storage/images/slides/' . $item['english_image']) }}" />
                            
                        </div>
                       
                    @endif
                </div>
            @endforeach --}}
        </div>
    @endsection
