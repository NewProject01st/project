<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\IndexServices;
use App\Http\Repository\Website\TrainingEvent\EventRepository;
use Session;

use App\Models\ {
    WebsiteContact,
    DepartmentInformation,
    FooterImportantLinks,
    Event,
    Tollfree,
    WebsiteLogo
};

class IndexController extends Controller
{
    public static $event_repository;
    public function __construct()
    {
        self::$event_repository = new EventRepository();  
        $this->service = new IndexServices();  
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();
        // $this->websitecontact = getWebsiteContact();
        
        // $this->subheaderinfo = getSubHeaderInfo();
       
    }

    static function getCommonWebData() {
        try {
            $retun_data = [];
            $date_now = date("Y-m-d");
             
            $upcoming_event = Event::where('is_active','=', true)
                        // ->where('start_date','<=', $date_now)
                        ->where('end_date','>', $date_now);
            // dd($upcoming_event);
            if (Session::get('language') == 'mar') {
                $upcoming_event =  $upcoming_event->select('marathi_title', 'marathi_description','marathi_image','start_date', 'end_date');
            } else {
                $upcoming_event = $upcoming_event->select('english_title', 'english_description','english_image','start_date', 'end_date');
            }
            $upcoming_event =  $upcoming_event->get()
                            ->toArray();
            //self::$event_repository->getAllUpcomingEvent();
            $retun_data['upcoming_event']  = $upcoming_event;
            return $retun_data ;
        } catch (\Exception $e) {
            return $e;
        }

                   
    }

    static function getWebsiteContact() {
        try {
            $websitecontact_data = array();
            $websitecontact_data =  WebsiteContact::where('is_active', '=',true)
                            ->select( 
                                'website_contacts.marathi_address',
                                'website_contacts.english_address',
                                'website_contacts.email',
                                'website_contacts.marathi_number',
                                'website_contacts.english_number',
                                'website_contacts.id',
                            )
                            ->get()
                            ->toArray();
    
            return $websitecontact_data ;
        } catch (\Exception $e) {
            return $e;
        }
                            
    }
    Static function getWebAllDepartment() {
        try {
        $weballdepartment_data = array();
        $weballdepartment_data =  DepartmentInformation::where('is_active', '=',true)
                            ->select( 
                                'department_information.english_title', 
                                'department_information.marathi_title',
                                'department_information.english_description',
                                'department_information.marathi_description',
                                'department_information.english_image',
                                'department_information.marathi_image',
                                'department_information.id',
                            )
                            ->get()
                            ->toArray();
    
            return $weballdepartment_data ;
        } catch (\Exception $e) {
            return $e;
        }
                            
    }

    Static function getWebAllFooterLink() {
        try {
        $weballfooterlink_data = array();
        $weballfooterlink_data =  FooterImportantLinks::where('is_active', '=',true)
                            ->select( 
                                'footer_important_links.english_title', 
                                'footer_important_links.marathi_title',
                                'footer_important_links.url',
                                'footer_important_links.id',
                            )
                            ->get()
                            ->toArray();
    
            return $weballfooterlink_data ;
        } catch (\Exception $e) {
            return $e;
        }
                            
    }
    Static function getWebTollFreeNumber() {
        try {
        $webtollfree_data = array();
        $webtollfree_data =  Tollfree::where('is_active', '=',true)
                            ->select( 
                                'tollfrees.english_tollfree_no', 
                                'tollfrees.marathi_tollfree_no',
                                'tollfrees.id',
                            )
                            ->get()
                            ->toArray();
  
            return $webtollfree_data ;
        } catch (\Exception $e) {
            return $e;
        }
                            
    }
    Static function getWebsiteLogo() {
        try {
        $weballdepartment_data = array();
        $weballdepartment_data =  WebsiteLogo::where('is_active', '=',true)
                            ->select( 
                                'website_logos.logo', 
                                'website_logos.id',
                            )
                            ->get()
                            ->toArray();
    
            return $weballdepartment_data ;
        } catch (\Exception $e) {
            return $e;
        }
                            
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
            $data_output_disasterforcast = $this->service->getAllDisaterForcast();
            $data_output_departmentinformation = $this->service->getAllDepartmentInformation();
            // $data_output_contact = $this->service->getWebContact();
            // dd(  $data_output_contact);

            // $data_output_vacancies = $this->service->getAllVacancies();            
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.index',compact('language','menu','socialicon','data_output_marquee', 'data_output_slider', 'data_output_disastermangwebportal', 'data_output_disastermanagementnews', 'data_output_emergencycontact', 'data_output_departmentinformation','data_output_disasterforcast'));

        } catch (\Exception $e) {
            return $e;
        }
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
            return view('website.pages.new-paricular-data-web', compact('language','menu','socialicon','disaster_news'));

        } catch (\Exception $e) {
            return $e;
        }
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
            return view('website.pages.particular-department-information', compact('language','menu','socialicon','department_information'));
        } catch (\Exception $e) {
            return $e;
        }
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
            return view('website.pages.home.list-rti',compact('language','menu','socialicon', 'data_output'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
        
    

    public function getPrivacyPolicy(Request $request)
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.privacy-policy',compact('language','menu','socialicon'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getTermConditions(Request $request)
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.terms_condition',compact('language','menu','socialicon'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }    
}