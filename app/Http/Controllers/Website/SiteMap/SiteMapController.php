<?php

namespace App\Http\Controllers\Website\SiteMap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\IndexServices;
use App\Http\Repository\Website\TrainingEvent\EventRepository;
use Session;


class SiteMapController extends Controller
{
    public static $event_repository;
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
            return view('website.pages.site-map.site-map',compact('language','menu'));

        } catch (\Exception $e) {
            return $e;
        }
    }
   
}