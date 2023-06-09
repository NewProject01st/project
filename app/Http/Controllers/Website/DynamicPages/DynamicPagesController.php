<?php

namespace App\Http\Controllers\Website\DynamicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Services\DynamicPages\DynamicPagesServices;
use Validator;
use Session;
// use App\Models\MainMenus;
use App\Models\ {
    DynamicWebPages
};

class DynamicPagesController extends Controller
{

   public function __construct()
    {
        // $this->service = new DynamicPagesServices();
        $this->menu = getMenuItems();
        $this->language = getLanguageSelected();
    }
    public function index(Request $request) {
        try { 
            $date_now = date("Y-m-d");
            $path = str_replace('pages/','',\Request::getPathInfo());
            $path_final = str_replace('/','',$path);

            $menu = $this->menu;
            $language = $this->language;
            $dynamic_web_page_name = DynamicWebPages::where('slug','=', $path_final)
                ->where('publish_date','<=', $date_now)->first();
           
            if($dynamic_web_page_name==null) {
                return view('website.pages.dynamic-page-error' ,compact('language','menu'));

            } else {
                if (Session::get('language') == 'mar') {
                    $dynamic_page = $dynamic_web_page_name->page_content_marathi;
                    $page_title = $dynamic_web_page_name->marathi_title;
                    $dynamic_meta_data = $dynamic_web_page_name->meta_data;
                    $language = 'mar';
                } else {
                    $dynamic_page = $dynamic_web_page_name->page_content_english;
                    $page_title = $dynamic_web_page_name->english_title;
                    $dynamic_meta_data =$dynamic_web_page_name->meta_data;
                    $language = 'en';
                }
                return view('website.pages.dynamic-page',compact('language','menu','dynamic_page','page_title','dynamic_meta_data'));
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
   
}
