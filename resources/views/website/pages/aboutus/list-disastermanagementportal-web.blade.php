    @extends('website.layout.master')
    @section('title', 'Applicant\'s Form')
    @section('content')
      <!--Subheader Start-->
      <section class="wf100 subheader">
        <div class="container">
           <h2>About Us </h2>
           <ul>
              <li> <a href="index.html">Home</a> </li>
              <li> About Us </li>
           </ul>
        </div>
     </section>
     <!--Subheader End--> 
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
                            <img src="{{ asset('storage/images/disaster-management-portal/' . $item['marathi_image']) }}" />

                        </div>
                    @else
                        <div>
                            <?php echo $item['english_title']; ?>
                        </div>
                        <div>
                            <?php echo $item['english_description']; ?>
                        </div>
                        <div>
                            <img src="{{ asset('storage/images/disaster-management-portal/' . $item['english_image']) }}" />
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endsection
