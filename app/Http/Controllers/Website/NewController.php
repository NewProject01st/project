<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

class NewController extends Controller
{
    protected $menu;

    public function __construct()
    {
        // Uncomment the line below if LoginService is needed
        // $this->loginServe = new LoginService();
        
        $this->menu = $this->getMenuItems();
    }

    // public function changeLanguage(Request $request) 
    // {
    //     Session::put('language', $request->language);
    // }

    public function landing()
    {
        return view('website.pages.landing');
    }

    // You might want to make getMenuItems a private method if it's only used internally
    private function getMenuItems()
    {
        // Implement your getMenuItems logic here
    }
}
