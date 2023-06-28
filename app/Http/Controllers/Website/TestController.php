<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class TestController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getTest()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
            return view('website.pages.index11',compact('language','menu','socialicon'));

        } catch (\Exception $e) {
            return $e;
        }
    }  
  
 

}
