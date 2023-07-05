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

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllDisasterManagementNews()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllDisasterManagementNews();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.news-events.list-disaster-management-news-web',compact('language','menu', 'data_output'));
    }  
    public function getAllSuccessStories()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllSuccessStories();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.news-events.list-success-stories-web',compact('language','menu', 'data_output'));
    }
    public function show(Request $request)
    {
        try {
           
              $menu = $this->menu;
            $success_storage_data = $this->service->getById($request->show_id);
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.news-events.list-particular-success-stories-web', compact('language','menu','success_storage_data'));

        } catch (\Exception $e) {
            return $e;
        }
    }   
}
