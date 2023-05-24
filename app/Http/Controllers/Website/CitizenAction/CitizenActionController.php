<?php

namespace App\Http\Controllers\Website\CitizenAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\CitizenAction\CitizenActionServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class CitizenActionController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new CitizenActionServices();
        $this->menu = getMenuItems();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllReportIncidentCrowdsourcing()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllReportIncidentCrowdsourcing();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.citizen-action.list-report-incident-crowdsourcing-web',compact('language','menu', 'data_output'));
    }  
    public function getAllVolunteerCitizenSupport()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllVolunteerCitizenSupport();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.preparedness.list-warning-system-web',compact('language','menu', 'data_output'));
    }

    public function getAllCitizenFeedbackSuggestions()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllCitizenFeedbackSuggestions();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.preparedness.list-capacity-training-web',compact('language','menu', 'data_output'));
    }

    // public function getAllPublicAwarenessEducation()
    // {
    //     try {

    //         $menu = $this->menu;
    //         $data_output = $this->service->getAllPublicAwarenessEducation();
    //         if (Session::get('language') == 'mar') {
    //             $language = Session::get('language');
    //         } else {
    //             $language = 'en';
    //         }

    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.preparedness.list-capacity-training-web',compact('language','menu', 'data_output'));
    // }

}
