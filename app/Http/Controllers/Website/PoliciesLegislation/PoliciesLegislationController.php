<?php

namespace App\Http\Controllers\Website\PoliciesLegislation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\PoliciesLegislation\PoliciesLegislationServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

class PoliciesLegislationController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new PoliciesLegislationServices();
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
        return view('website.pages.policies-legislation.list-state-disaster-managementplan-web',compact('language','menu','data_output'));
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
        return view('website.pages.policies-legislation.list-district-disaster-managementplan-web',compact('language','menu', 'data_output'));
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
        return view('website.pages.policies-legislation.list-state-management-policy-web',compact('language','menu', 'data_output'));
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
        return view('website.pages.policies-legislation.list-relevant-laws-web',compact('language','menu', 'data_output'));
    }
    
}
