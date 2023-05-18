<?php

namespace App\Http\Controllers\Website\ContactUs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->menu = getMenuItems();
    }

 

    public function index()
    {
        try {
            $menu = $this->menu;
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.contact',compact('language','menu'));
    }
}
