@extends('website.layout.master')

@section('content')
    <!--Subheader Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Terms and Conditions </h2>
        </div>
    </section>
    <!--Subheader End-->
    <!--Main Content Start-->
    <div class="main-content p60">
        <!--Department Details Page Start-->
        <div class="department-details">
            <div class="container">
                <div class="row">
                    <div class="deprt-txt">
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

                        {{-- 
                    <h3>Terms and Conditions </h3>
                    <p>
                        Please read these Terms and Conditions carefully before using our disaster management services. These Terms and Conditions govern your access to and use of our services, and by using our services, you agree to be bound by these Terms and Conditions. If you do not agree with any part of these Terms and Conditions, you may not use our services.
                    </p>
                       <b> Definitions</b>
                       <ul>
                        <li>a. "We," "us," "our" refers to the disaster management service provider.</li>
                        <li>b. "Services" refers to the disaster management services provided by us, including but not limited to emergency response, disaster recovery, risk assessment, and mitigation strategies.</li>
                        <li>c. "User," "you," "your" refers to any individual or entity using our services.</li>
                       </ul>
                        
                        <b>Service Description</b>
                        <ul>
                            <li>a. Our disaster management services aim to assist individuals, organizations, and communities in preparing for, responding to, and recovering from disasters, emergencies, and crises.</li>
                            <li> b. We provide resources, information, and guidance on disaster preparedness, response plans, evacuation procedures, and other related topics.</li>
                            <li>c. Our services may include the use of technology, software applications, and communication systems to facilitate effective disaster management.</li>
                        </ul>
                         <b> User Responsibilities</b>
                        <ul>
                            <li> a. You are responsible for providing accurate and up-to-date information when using our services.</li>
                            <li>b. You agree to use our services responsibly and in compliance with applicable laws and regulations.</li>
                            <li> c. You understand that our services are not a substitute for professional emergency services, and in case of a life-threatening situation, you should contact the appropriate emergency services immediately.</li>
                        </ul>
                       
                        <b>Limitations of Liability</b>
                        <ul>
                            <li>a. We strive to provide accurate and reliable information and resources. However, we do not guarantee the accuracy, completeness, or reliability of the information provided.</li>
                            <li>b. We are not responsible for any loss, damage, or injury arising from the use of our services or reliance on the information provided.</li>
                            <li>c. We shall not be liable for any indirect, incidental, consequential, or punitive damages arising out of or relating to the use of our services.</li>
                        </ul>
                        
                        <b>Intellectual Property</b>
                        <ul>
                            <li>  a. All intellectual property rights associated with our services, including but not limited to text, graphics, logos, and software, are owned by or licensed to us.</li>
                            <li>b. You may not reproduce, modify, distribute, or use any part of our services without our prior written consent.</li>
                           
                        </ul>
                        
                        <b>  Privacy and Data Protection</b>
                        <ul>
                            <li>a. We collect and process personal information in accordance with applicable data protection laws and our Privacy Policy.</li>
                            <li> b. By using our services, you consent to the collection, processing, and storage of your personal information as described in our Privacy Policy.</li>
                            
                        </ul>
                        <b>Termination</b>
                        <p>
                            We reserve the right to suspend or terminate your access to our services at any time without prior notice or liability.
                        </p>
                        
                        <b>Amendments</b>
                        <p>We may modify or update these Terms and Conditions from time to time, and the updated version will be effective upon posting on our website.</p>                    --}}
                    </div>
                </div>
            </div>
        </div>
        <!--Department Details Page End-->
    </div>
    <!--Main Content End-->
@endsection
