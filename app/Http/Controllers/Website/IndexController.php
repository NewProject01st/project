<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

use App\Models\ {
	Budget
};

class IndexController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->menu = getMenuItems();
    }

    public function index() {
        try {

            $menu = $this->menu;
            $data_output = Budget::where('is_active','=',true);
            // dd($data_output);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title');
                $language = Session::get('language');
            } else {
                $data_output = $data_output->select('english_title');
                $language = 'en';
            }
            $data_output = $data_output->get()
                    ->toarray();
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.index',compact('data_output','language','menu'));
    }

    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }

}
