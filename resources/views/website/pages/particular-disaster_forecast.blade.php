@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>
                @if (session('language') == 'mar')
                {{ Config::get('marathi.HOME_PAGE.DISASTER_FORCAST') }}
            @else
                {{ Config::get('english.HOME_PAGE.DISASTER_FORCAST') }}
            @endif

            </h2>
            <ul>
                <li> <a href="{{ route('index') }}">
                        @if (session('language') == 'mar')
                            {{ Config::get('marathi.NEW_PARTICULAR_DATA_WEB.HOME') }}
                        @else
                            {{ Config::get('english.NEW_PARTICULAR_DATA_WEB.HOME') }}
                        @endif
                    </a> </li>

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
                        @forelse ($disaster_forecast as $item)
                            <div class="deprt-txt">
                                @if (session('language') == 'mar')
                                    <h3><?php echo $item['marathi_title']; ?> </h3>

                                    <p style="text-align: justify;"> <?php echo $item['marathi_description']; ?></p>
                                @else
                                    <h3><?php echo $item['english_title']; ?> </h3>
                                  
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
                    
                </div>
            </div>
        </div>
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
