    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
    <style>
        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            animation: marquee 15s linear infinite;
        }
        
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        </style>
        <div>
           
                <div>
            
                    @foreach ($data_output as $item)
                    <div class="container-fluid">
                        @if (session('language') == 'mar')
                            <div class="marquee">
                                {{ $item['marathi_title'] }}
                            </div>
                        @else
                            <div class="marquee">
                                {{ $item['english_title'] }}
                            </div> 
                        @endif
                    </div>
                @endforeach
