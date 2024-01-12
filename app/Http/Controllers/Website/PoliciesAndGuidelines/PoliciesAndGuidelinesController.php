<?php

namespace App\Http\Controllers\Website\PoliciesAndGuidelines;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\PoliciesAndGuidelines\PoliciesAndGuidelinesServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

class PoliciesAndGuidelinesController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new PoliciesAndGuidelinesServices();
        $this->menu = getMenuItems();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllStateDisasterManagementPlan()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllStateDisasterManagementPlan();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.policies-and-guidelines.state-disaster-management-plan',compact('language','menu','data_output'));
    }  
    public function getAllDistrictDisasterManagementPlan()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllDistrictDisasterManagementPlan();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.policies-and-guidelines.district-disaster-management-plans',compact('language','menu', 'data_output'));
    }

    public function getAllStateDisasterManagementPolicy()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllStateDisasterManagementPolicy();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.policies-and-guidelines.disaster-management-policies',compact('language','menu', 'data_output'));
    }
    public function getAllRelevantLawsRegulation()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllRelevantLawsRegulation();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.policies-and-guidelines.relevant-laws-and-regulations',compact('language','menu', 'data_output'));
    }
    public function getAllDisasterManagementAct()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllDisasterManagementAct();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.policies-and-guidelines.disaster-management-act',compact('language','menu', 'data_output'));
    }
    public function getAllDisasterManagementGuidelines()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllDisasterManagementGuidelines();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.policies-and-guidelines.disaster-management-guidelines',compact('language','menu', 'data_output'));
    }
    
}
