<?php

namespace App\Http\Controllers\Website\Aboutus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\Aboutus\AboutusServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class AboutusController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new AboutusServices();
        $this->menu = getMenuItems();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllDisasterManagmentPortal()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllDisasterManagmentPortal();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.aboutus.list-disastermanagementportal-web',compact('language','menu','data_output'));
    }  
    public function getAllObjectiveGoals()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllObjectiveGoals();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.aboutus.list-objectivegoals-web',compact('language','menu','data_output'));
    }

    public function getAllStateDisasterManagementAuthority()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllStateDisasterManagementAuthority();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.aboutus.state-disaster-management-authority-web',compact('language','menu','data_output'));
    }

}
