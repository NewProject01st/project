<?php

namespace App\Http\Controllers\Website\Preparedness;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\Preparedness\PreparednessServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class PreparednessController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new PreparednessServices();
        $this->menu = getMenuItems();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
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
    public function getAllEarlyWarningSystem()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllEarlyWarningSystem();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.preparedness.early-warning-systems',compact('language','menu','data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getAllCapacityTraining()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllCapacityTraining();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.preparedness.capacity-building-and-training',compact('language','menu', 'data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getAllPublicAwarenessEducation()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllPublicAwarenessEducation();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.preparedness.public-awareness-and-education',compact('language','menu', 'data_output'));
        } catch (\Exception $e) {
            return $e;
        }
        
    }
    public function getAllGovtHospitals()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllGovtHospitals();
            
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.preparedness.government-hospitals',compact('language','menu', 'data_output'));
        } catch (\Exception $e) {
            return $e;
        }
        
    }

}
