<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\IndexServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class IndexController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new IndexServices();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();
        // $this->subheaderinfo = getSubHeaderInfo();
       
    }
    public function index()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            // $subheaderinfo = $this->subheaderinfo;
            $data_output_slider = $this->service->getAllSlider();
            $data_output_marquee = $this->service->getAllMarquee();
            $data_output_disastermangwebportal = $this->service->getAllDisasterManagementWebPortal();
            $data_output_disastermanagementnews = $this->service->getAllDisasterManagementNews();
            $data_output_emergencycontact = $this->service->getAllEmergencyContact();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.index',compact('language','menu','socialicon','data_output_marquee', 'data_output_slider', 'data_output_disastermangwebportal', 'data_output_disastermanagementnews', 'data_output_emergencycontact'));
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
    


    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }    
}
