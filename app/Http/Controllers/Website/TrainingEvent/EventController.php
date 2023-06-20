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
        $this->socialicon = getSocialIcon();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllUpcomingEvent()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllUpcomingEvent();
            // dd($data_output);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.training-event.list-upcoming-training-event-web',compact('language','menu','socialicon', 'data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllPastEvent()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllPastEvent();
            // dd($data_output);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.training-event.list-past-training-event-web',compact('language','menu','socialicon', 'data_output'));
    } 

    public function show(Request $request)
    {
        try {
           
            //  dd($request->show_id);
              $menu = $this->menu;
              $socialicon = $this->socialicon;
            $event_data = $this->service->getById($request->show_id);
            //  dd($disaster_news);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.training-event.list-particular-event', compact('language','menu','socialicon','event_data'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
}
