<?php

namespace App\Http\Controllers\Website\EmergencyResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\EmergencyResponse\EmergencyResponseServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

class EmergencyResponseController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new EmergencyResponseServices();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllStateEmergencyOperationsCenter()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllStateEmergencyOperationsCenter();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.emergency-response.list-state-emergency-operations-center-web',compact('language','menu','socialicon','data_output'));
    }  
    public function getAllDistrictEmergencyOperationsCenter()
    {
        try {
            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllDistrictEmergencyOperationsCenter();
            
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.emergency-response.list-district-emergency-operations-center-web',compact('language','menu','socialicon', 'data_output'));
    }

    public function getAllEmergencyContactNumbers()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllEmergencyContactNumbers();
            $data_output_new = $data_output['data_output'];
            $data_output_array = $data_output['data_output_array'];
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.emergency-response.list-emergency-contact-numbers-web',compact('language','menu','socialicon', 'data_output_new','data_output_array'));
    }
    public function getAllSearchRescueTeams()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllSearchRescueTeams();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.emergency-response.list-search-rescue-teams-web',compact('language','menu','socialicon', 'data_output'));
    }
    public function getAllReliefMeasuresResources()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllReliefMeasuresResources();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.emergency-response.list-relief-measures-resources-web',compact('language','menu','socialicon', 'data_output'));
    }
    public function getAllEvacuationPlans()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllEvacuationPlans();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.emergency-response.list-evacuation-plans-web',compact('language','menu','socialicon', 'data_output'));
    }

    
}
