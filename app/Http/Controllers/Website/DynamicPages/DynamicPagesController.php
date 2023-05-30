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
        $this->socialicon = getSocialIcon();
    }
    public function index(Request $request)
    {
        try { 
            $path = str_replace('pages/','',\Request::getPathInfo());
            $path_final = str_replace('/','',$path);
            $path_new = 'admin.pages.dynamic-pages-created.';

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $language = $this->language;
            $dynamic_web_page_name = DynamicWebPages::where('slug',$path_final)->first();
            if (Session::get('language') == 'mar') {
                $dynamic_page = $path_new.$dynamic_web_page_name->actual_page_name_marathi;
                $language = 'mar';
            } else {
                $dynamic_page = $path_new.$dynamic_web_page_name->actual_page_name_english;
                $language = 'en';


            }
            return view('website.pages.dynamic-page',compact('language','menu','dynamic_page'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
}
