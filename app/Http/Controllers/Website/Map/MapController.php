<?php

namespace App\Http\Controllers\Website\Map;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\NewsAndEvents\NewsEventsServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

use App\Models\ {
    MapLatLon
};

class MapController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new NewsEventsServices();
        $this->menu = getMenuItems();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function index()
    {
        try {

            $menu = $this->menu;
            $data_output = MapLatLon::where('is_active', true)->get();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        
        return view('website.pages.contact.map',compact('language','menu', 'data_output'));
    }   

    
    public function mapDataAjax()
    {
        try {

            $data_output = MapLatLon::where('is_active', true)->get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }   
}
