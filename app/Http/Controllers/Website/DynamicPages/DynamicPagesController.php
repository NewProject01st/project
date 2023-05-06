<?php

namespace App\Http\Controllers\Website\DynamicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Services\DynamicPages\DynamicPagesServices;
use Validator;
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
    public function index(Request $request)
    {
        try { 
            $path = str_replace('pages/','',\Request::getPathInfo());
            $path_final = str_replace('/','',$path);
            $path_new = '/resources/views/admin/pages/dynamic-pages-created/';
            dd($path_final);
            $menu = $this->menu;
            $language = $this->language;
            $dynamic_web_page_name = DynamicWebPages::where('name_of_page',$path_final)->first();
            $dynamic_page = $path_new.$path_final;
            return view('website.pages.dynamic-page',compact('language','menu','dynamic_page'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
}
