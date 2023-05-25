<?php

namespace App\Http\Controllers\Website\TrainingEvent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\TrainingEvent\EventServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class EventController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new EventServices();
        $this->menu = getMenuItems();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllEvent()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllEvent();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.training-event.list-event-web',compact('language','menu', 'data_output'));
    }  
}