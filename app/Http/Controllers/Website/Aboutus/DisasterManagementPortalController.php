<?php

namespace App\Http\Controllers\Website\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementPortal;
use App\Http\Services\Website\AboutUs\DisasterManagementPortalServices;
use Session;
class DisasterManagementPortalController extends Controller
{
   public static $loginServe,$masterApi;
   public function __construct()
    {
        $this->service = new DisasterManagementPortalServices();
        $this->menu = getMenuItems();
    }
    public function index() {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAll();
            // dd($data_output);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_image');
                $language = Session::get('language');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
                $language = 'en';
            }
            $data_output = $data_output->get()
                    ->toarray();
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.aboutus.list-disastermanagementportal-web',compact('data_output','language','menu'));
    }

}

