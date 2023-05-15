<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\IndexServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class IndexController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new IndexServices();
        $this->menu = getMenuItems();

       
    }

    // public function index() {
    //     try {

    //         $menu = $this->menu;
    //         // $data_output = ObjectiveGoals::where('is_active','=',true);
    //         $data_output_marquee = $this->service->getAll();
            
    //         // dd($data_output);
    //         if (Session::get('language') == 'mar') {
    //             // $data_output =  $data_output->select('marathi_title');
    //             $language = Session::get('language');
    //             $data_output_marquee =  $data_output_marquee->select('marathi_title');
    //         } else {
    //             // $data_output = $data_output->select('english_title');
    //             $language = 'en';
    //             $data_output_marquee = $data_output_marquee->select('english_title');
    //         }
    //         $data_output = $data_output->get()
    //                 ->toarray();
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.index',compact('data_output','language','menu'));
    // }

    // public function changeLanguage(Request $request) {
    //     Session::put('language', $request->language);
    // }


    public function index()
    {
        try {

            $menu = $this->menu;
            $data_output_slider = $this->service->getAllSlider();
            // dd($data_output_slider);
            $data_output_marquee = $this->service->getAllMarquee();
            // dd($data_output_marquee);
            $data_output_disastermangwebportal = $this->service->getAllDisasterManagementWebPortal();
            $data_output_disastermanagementnews = $this->service->getAllDisasterManagementNews();
            $data_output_emergencycontact = $this->service->getAllEmergencyContact();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.index',compact('language','menu','data_output_marquee', 'data_output_slider', 'data_output_disastermangwebportal', 'data_output_disastermanagementnews', 'data_output_emergencycontact'));
    }

    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }    
}
