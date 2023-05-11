    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <div>
            @foreach ($data_output as $item)
                <div class="container-fluid">
                    @if (session('language') == 'mar')
                        <div>
                            <h2>
                                <?php echo $item['marathi_title']; ?>
                            </h2>
                        </div>
                        <div>
                            <?php echo $item['marathi_description']; ?>
                        </div>
                    @else
                        <div>
                            <?php echo $item['english_title']; ?>
                        </div>
                        <div>
                            <?php echo $item['english_description']; ?>

                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endsection
