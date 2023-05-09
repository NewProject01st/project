<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marquee;
use App\Http\Services\Website\Home\MarqueeServices;
use Session;
class MarqueeController extends Controller
{
    public static $loginServe,$masterApi;
   public function __construct()
    {
        $this->service = new MarqueeServices();
        $this->menu = getMenuItems();
    }
    public function index()
    {

        try {

            $menu = $this->menu;
            $data_output = $this->service->getAll();
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
        return view('website.pages.home.list-marquee-web',compact('data_output','language','menu'));
    }


}