<?php

namespace App\Http\Controllers\Website\NewsAndEvents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\NewsAndEvents\NewsEventsServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class NewsEventsController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new NewsEventsServices();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllDisasterManagementNews()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllDisasterManagementNews();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.news-events.list-disaster-management-news-web',compact('language','menu','socialicon', 'data_output'));
    }  
    public function getAllSuccessStories()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllSuccessStories();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.news-events.list-success-stories-web',compact('language','menu','socialicon', 'data_output'));
    }  
}
