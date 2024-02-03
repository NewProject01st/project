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
    WebsiteLogo,
    PolicyPrivacy,
    TermsCondition,
    SocialIcon,
    TweeterFeed,
    WebsiteContactDepartment
};

class IndexController extends Controller
{
    public static $event_repository;
    public function __construct()
    {
        self::$event_repository = new EventRepository();  
        $this->service = new IndexServices();  
        $this->menu = getMenuItems();
        
        // $this->$menuDataSearch = getMenuForSearch();
        // $this->websitecontact = getWebsiteContact();
    }

   
    static function getCommonWebData() {
        try {
            $retun_data = [];
            $date_now = date("Y-m-d");
             
            $upcoming_event = Event::where('is_active','=', true)
                        // ->where('start_date','<=', $date_now)
                        ->where('end_date','>', $date_now);
            if (Session::get('language') == 'mar') {
                $upcoming_event =  $upcoming_event->select('marathi_title', 'marathi_description','marathi_image','start_date', 'end_date');
            } else {
                $upcoming_event = $upcoming_event->select('english_title', 'english_description','english_image','start_date', 'end_date');
            }
            $upcoming_event =  $upcoming_event->get()
                            ->toArray();
            //self::$event_repository->getAllUpcomingEvent();
            $retun_data['upcoming_event']  = $upcoming_event;

            $websitecontact_data =  WebsiteContact::where('is_active', '=',true)
            ->select( 
                'website_contacts.marathi_address',
                'website_contacts.english_address',
                'website_contacts.email',
                'website_contacts.marathi_number',
                'website_contacts.english_number',
                'website_contacts.id',
                // 'department_english_address',
                // 'department_marathi_address',
                // 'department_email',
                // 'department_english_contact_number',
                // 'department_marathi_contact_number'
            )
            ->get()
            ->toArray();

            info($websitecontact_data);

            $retun_data['website_contact_details']  = $websitecontact_data;

            $websitecontact_department_data =  WebsiteContactDepartment::where('is_active', '=',true)
            ->select( 
                'website_contact_department.department_english_name',
                'website_contact_department.department_marathi_name',
                'website_contact_department.department_english_address',
                'website_contact_department.department_marathi_address',
                'website_contact_department.department_email',
                'website_contact_department.department_english_contact_number',
                'website_contact_department.department_marathi_contact_number'
            )
            ->get()
            ->toArray();
            $retun_data['websitecontact_department_details']  = $websitecontact_department_data;
 
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
            $retun_data['web_department_data']  = $weballdepartment_data;


            $weballfooterlink_data =  FooterImportantLinks::where('is_active', '=',true)
            ->select( 
                'footer_important_links.english_title', 
                'footer_important_links.marathi_title',
                'footer_important_links.url',
                'footer_important_links.id',
            )
            ->get()
            ->toArray();
            $retun_data['weballfooterlink_data']  = $weballfooterlink_data;

            $data_output_privacypolicy =  PolicyPrivacy::where('is_active', '=',true)
            ->select( 
                'policy_privacies.english_title', 
                'policy_privacies.marathi_title',
                'policy_privacies.english_description', 
                'policy_privacies.marathi_description',
                'policy_privacies.id',
            )
            ->get()
            ->toArray();
            $retun_data['privacypolicy_data']  = $data_output_privacypolicy;

            $data_output_termcondition =  TermsCondition::where('is_active', '=',true)
            ->select( 
                'terms_conditions.english_title', 
                'terms_conditions.marathi_title',
                'terms_conditions.english_description', 
                'terms_conditions.marathi_description',
                'terms_conditions.id',
            )
            ->get()
            ->toArray();
            $retun_data['termcondition_data']  = $data_output_termcondition;

            $data_output_sociallink =  SocialIcon::where('is_active', '=',true)
            ->select( 
                'social_icons.url', 
                'social_icons.icon',
                'social_icons.id',
            )
            ->get()
            ->toArray();
            $retun_data['social_link']  = $data_output_sociallink;

            $data_output_twitter =  TweeterFeed::where('is_active', '=',true)
            ->select( 
                'tweeter_feeds.url', 
                'tweeter_feeds.id',
            )
            ->get()
            ->toArray();
            $retun_data['twitter_feed']  = $data_output_twitter;

            return $retun_data ;
        } catch (\Exception $e) {
             info("Satish");
             info($e->getMessage());
        }
                   
    }

    static function getCommonWebNavbarData() {
        try {
            $retun_data = [];
            $webtollfree_data =  Tollfree::where('is_active', '=',true)
            ->select( 
                'tollfrees.english_tollfree_no', 
                'tollfrees.marathi_tollfree_no',
                'tollfrees.id',
            )
            ->get()
            ->toArray();
        info($webtollfree_data);

            $retun_data['webtollfree_data']  = $webtollfree_data;     
            
            $website_logo =  WebsiteLogo::where('is_active', '=',true)
            ->select( 
                'website_logos.logo', 
                'website_logos.id',
            )
            ->get()
            ->toArray();

            $retun_data['website_logo']  = $website_logo;   
            info($retun_data);
            return $retun_data ;
        } catch (\Exception $e) {
            return $e;
        }
                   
    }    
    // public function index()
    // {
    //     return view('website.pages.index');
    // }
    public function index()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->index();
            $data_output_landing_content = $this->service->getAllLandingContent();
            return view('website.pages.index',compact('data_output', 'data_output_landing_content'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function home()
    {
        try {
            $menu = $this->menu;
            // $menuDataSearch = $this->menuDataSearch;
            // $websitecontact = $this->websitecontact;
            $data_output_slider = $this->service->getAllSlider();
            $data_output_marquee = $this->service->getAllMarquee();
            $data_output_disastermangwebportal = $this->service->getAllDisasterManagementWebPortal();
            $data_output_disastermanagementnews = $this->service->getAllDisasterManagementNews();
            $data_output_emergencycontact = $this->service->getAllEmergencyContact();
            $data_output_disasterforcast = $this->service->getAllDisaterForcast();
           
            $data_output_departmentinformation = $this->service->getLimitDepartmentInformation();
            $total_records = DepartmentInformation::where('is_active', '=', true)->count();
            // $data_output_contact = $this->service->getWebContact();
            // dd(  $data_output_contact);

            // $data_output_vacancies = $this->service->getAllVacancies();            
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.home',compact('language','menu','data_output_marquee', 'data_output_slider', 'data_output_disastermangwebportal', 'data_output_disastermanagementnews', 'data_output_emergencycontact', 'data_output_departmentinformation','data_output_disasterforcast', 'total_records'));

        } catch (\Exception $e) {
            return $e;
        }
    }

     public function getAllHazardVulnerability()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllHazardVulnerability();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.preparedness.hazard-and-vulnerability-assessment ',compact('language','menu', 'data_output'));

        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function show(Request $request)
    {
        try {
           
              $menu = $this->menu;
            $disaster_news = $this->service->getById($request->show_id);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.disaster-management-news', compact('language','menu','disaster_news'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    
    public function showDepartmentInformation(Request $request)
    {
        try {
            
                $menu = $this->menu;
            $department_information = $this->service->getByIdDepartmentInformation($request->department_show_id);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.department', compact('language','menu','department_information'));
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllWebDisaterForcast()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllWebDisaterForcast();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.disaster-forecast-web',compact('language','menu','data_output'));
    }

    public function getAllDepartmentInformation()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllDepartmentInformation();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.list-all-department',compact('language','menu','data_output'));
    }
    

    public function showDisasterForecast(Request $request)
    {
        try {
            
                $menu = $this->menu;
            $disaster_forecast = $this->service->getByIdDisasterForecast($request->disaster_show_id);

            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.particular-disaster_forecast', compact('language','menu','disaster_forecast'));
        } catch (\Exception $e) {
            return $e;
        }
    } 

    
    public function showVacancies(Request $request)
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllVacancies();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.home.list-vacancies',compact('language','menu','data_output'));
    } 

        

    public function showRTI(Request $request)
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllRTI();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.home.list-rti',compact('language','menu', 'data_output'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
        
    public function getPrivacyPolicy(Request $request)
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getPrivacyPolicy();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.privacy-policy',compact('language','menu', 'data_output'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getTermConditions(Request $request)
    {
        try {

            $menu = $this->menu;
            
            $data_output = $this->service->getTermCondition();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.terms_condition',compact('language','menu', 'data_output'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }        
}