{{-- @extends('website.layout.master')
@section('title', 'Applicant\'s Form')
@section('content')

    <div>

        @foreach ($data_output_marquee as $item)
        <div class="container-fluid">
            @if (session('language') == 'mar')
                <div>
                    <marquee behavior="scroll" direction="left" scrollamount="10">
                        {{ $item['marathi_title'] }}
                    </marquee>
                </div>
            @elseif (array_key_exists('english_title', $item))
                <div>
                    <marquee behavior="scroll" direction="left" scrollamount="10">
                        <?php //echo $item['english_title']; ?>
                    </marquee>
                </div>
            @endif
        </div>
    @endforeach
    

        
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          @foreach ($data_output_slider as $slider)
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">
          @foreach ($data_output_slider as $slider)
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


       
@endsection
        --}}


@extends('website.layout.footer')
@section('content')


@endsection
@extends('website.layout.navbar')
@extends('website.layout.header')
