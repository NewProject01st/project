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


    public function getAllUpcomingEvent()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllUpcomingEvent();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.training-event.upcoming-events-and-trainings',compact('language','menu','data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllPastEvent()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllPastEvent();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.training-event.past-events-and-trainings',compact('language','menu','data_output'));
    } 

    public function show(Request $request)
    {
        try {
           
              $menu = $this->menu;
            $event_data = $this->service->getById($request->show_id);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.training-event.list-particular-event', compact('language','menu','event_data'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
}
