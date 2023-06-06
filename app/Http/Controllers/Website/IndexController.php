<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\IndexServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

use App\Models\ {
    WebsiteContact
};

class IndexController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new IndexServices();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();
        // $this->websitecontact = getWebsiteContact();
        
        // $this->subheaderinfo = getSubHeaderInfo();
       
    }

    public function getWebsiteContact() {
        $websitecontact_data = array();
        $websitecontact_data =  WebsiteContact::where('is_active', '=',true)
                            ->select( 
                                'website_contacts.address_marathi_title', 
                                'website_contacts.address_english_title',
                                'website_contacts.marathi_address',
                                'website_contacts.english_address',
                                'website_contacts.email_title',
                                'website_contacts.email',
                                'website_contacts.contact_marathi_title',
                                'website_contacts.contact_english_title',
                                'website_contacts.marathi_contact',
                                'website_contacts.english_contact',
                                'website_contacts.id',
                            )
                            ->get()
                            ->toArray();
    
                            return $websitecontact_data ;
                            
    }

    public function index()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            // $websitecontact = $this->websitecontact;
            $data_output_slider = $this->service->getAllSlider();
            $data_output_marquee = $this->service->getAllMarquee();
            $data_output_disastermangwebportal = $this->service->getAllDisasterManagementWebPortal();
            $data_output_disastermanagementnews = $this->service->getAllDisasterManagementNews();
            $data_output_emergencycontact = $this->service->getAllEmergencyContact();
            $data_output_departmentinformation = $this->service->getAllDepartmentInformation();
            // $data_output_contact = $this->service->getWebContact();
            // dd(  $data_output_contact);

            // $data_output_vacancies = $this->service->getAllVacancies();            
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.index',compact('language','menu','socialicon','data_output_marquee', 'data_output_slider', 'data_output_disastermangwebportal', 'data_output_disastermanagementnews', 'data_output_emergencycontact', 'data_output_departmentinformation'));
    }
    public function show(Request $request)
    {
        try {
           
            //  dd($request->show_id);
              $menu = $this->menu;
              $socialicon = $this->socialicon;
            //   $subheaderinfo = $this->subheaderinfo;
            $disaster_news = $this->service->getById($request->show_id);
            //  dd($disaster_news);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
            return view('website.pages.new-paricular-data-web', compact('language','menu','socialicon','disaster_news'));
        } 

        public function showDepartmentInformation(Request $request)
        {
            try {
               
                // dd($request->department_show_id);
                  $menu = $this->menu;
                  $socialicon = $this->socialicon;
                //   $subheaderinfo = $this->subheaderinfo;
                $department_information = $this->service->getByIdDepartmentInformation($request->department_show_id);
                //  dd($department_information);
                if (Session::get('language') == 'mar') {
                    $language = Session::get('language');
                } else {
                    $language = 'en';
                }
    
            } catch (\Exception $e) {
                return $e;
            }
                return view('website.pages.particular-department-information', compact('language','menu','socialicon','department_information'));
            } 

            public function showVacancies(Request $request)
            {
                try {

                    $menu = $this->menu;
                    $socialicon = $this->socialicon;
                    $data_output = $this->service->getAllVacancies();
                    if (Session::get('language') == 'mar') {
                        $language = Session::get('language');
                    } else {
                        $language = 'en';
                    }
                } catch (\Exception $e) {
                    return $e;
                }
                return view('website.pages.home.list-vacancies',compact('language','menu','socialicon', 'data_output'));
                } 

                
    
                public function showRTI(Request $request)
                {
                    try {
    
                        $menu = $this->menu;
                        $socialicon = $this->socialicon;
                        $data_output = $this->service->getAllRTI();
                        if (Session::get('language') == 'mar') {
                            $language = Session::get('language');
                        } else {
                            $language = 'en';
                        }
                    } catch (\Exception $e) {
                        return $e;
                    }
                    return view('website.pages.home.list-rti',compact('language','menu','socialicon', 'data_output'));
                    } 
        
                    
              
        
    

                
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }    
}