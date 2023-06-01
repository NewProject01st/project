<?php

namespace App\Http\Controllers\Website\ResearchCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\ResearchCenter\ResearchCenterServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class ResearchCenterController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new ResearchCenterServices();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllDocumentspublications()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllDocumentspublications();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.research-center.list-documents-publications-web',compact('language','menu','socialicon', 'data_output'));
    }  
    public function getAllMapsGISData()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            // $data_output = $this->service->getAllDocumentspublications();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.research-center.list-maps-gis-data-web',compact('language','menu','socialicon'));
    }  
    public function getAllMultimedia()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            // $data_output = $this->service->getAllDocumentspublications();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.research-center.list-multimedia-web',compact('language','menu','socialicon'));
    }  


    
}
