    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
        <div>
            @foreach ($data_output as $item)
                <div class="container-fluid">
                    @if (session('language') == 'mar')
                        <div>
                            <?php echo $item['marathi_title']; ?>
                        </div>
                        <div>
                            <?php echo $item['marathi_description']; ?>
                        </div>
                        <div>
                            <img
                                src="{{ asset('storage/images/state-disaster-management-authority/' . $item['marathi_image']) }}" />
                        </div>
                    @else
                        <div>
                            <?php echo $item['english_title']; ?>
                        </div>
                        <div>
                            <?php echo $item['english_description']; ?>
                        </div>
                        <div>
                            <img
                                src="{{ asset('storage/images/state-disaster-management-authority/' . $item['english_image']) }}" />

                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endsection