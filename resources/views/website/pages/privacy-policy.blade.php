@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Privacy Policy </h2>
            <ul>
                <li> <a href="{{ route('privacy-policy') }}">Home</a> </li>

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
                    @foreach ($data_output as $item)
                        <div class="deprt-txt">
                            @if (session('language') == 'mar')
                            <h3><?php echo $item['marathi_title']; ?></h3>
                            <p><?php echo $item['marathi_description']; ?></p>
                            @else
                            <h3><?php echo $item['english_title']; ?></h3>
                            <p><?php echo $item['english_description']; ?></p>
                            @endif
                        </div>
                    @endforeach

                    {{-- <div class="deprt-txt">
                        <h3>Privacy Policy</h3>
                        <p>At Disaster Management, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, and safeguard the data you provide to us in the context of our disaster management services. Please read this policy carefully to understand our practices regarding your personal information.
                        </p>
                            <b>Information Collection:</b>
                            
                            <p>We may collect personal information from individuals or organizations involved in disaster management activities. This information may include, but is not limited to:
                            Names, contact details, and addresses Demographic information Emergency contact information
                            Any other data necessary for providing disaster management services</p>
                           
                            <b>Use of Information:</b>
                            <p>
                            We use the collected information to:
                            Facilitate and coordinate disaster response and recovery efforts
                            Communicate with individuals or organizations involved in disaster management
                            Provide relevant updates, alerts, and notifications regarding disaster events
                            Conduct research and analysis to improve our disaster management services
                            Comply with legal and regulatory requirements</p>
                            <b>Data Sharing:</b>
                            <p>We may share your personal information in the following circumstances:</p>
                            
                            <p>With relevant government agencies, emergency services, and authorized partners involved in disaster management activities
                            With trusted third-party service providers who assist us in delivering our services (subject to strict confidentiality obligations)
                            When required by law or to protect our rights, property, or safety, or the rights, property, or safety of others
                            Data Security:</p>
                            
                            <p>We employ industry-standard security measures to protect your personal information from unauthorized access, alteration, or disclosure. However, please note that no method of transmission over the internet or electronic storage is entirely secure, and we cannot guarantee absolute security.</p>
                            
                            <b>Data Retention:</b>
                            <p>We will retain your personal information only for as long as necessary to fulfill the purposes for which it was collected and to comply with applicable laws and regulations.</p>
                            
                            <b>Your Rights:</b>
                            <p>You have the right to access, correct, or delete your personal information held by us. If you wish to exercise any of these rights or have any concerns regarding your data, please contact us using the information provided in the "Contact Us" section below.</p>
                            
                            <b>Updates to Privacy Policy:</b>
                            <p>We may update this Privacy Policy from time to time to reflect changes in our practices or legal obligations. We encourage you to review this policy periodically for any updates.</p>
                            
                            <b>Contact Us:</b>
                            <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, Please Mail and call us at official contact details given on the contact us page.</p>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
