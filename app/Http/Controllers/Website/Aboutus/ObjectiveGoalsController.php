<?php

namespace App\Http\Controllers\Website\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObjectiveGoals;
use App\Http\Services\Website\AboutUs\ObjectiveGoalsServices;
use Session;

class ObjectiveGoalsController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new ObjectiveGoalsServices();
        $this->menu = getMenuItems();
    }
    public function index() {
        try {

            $menu = $this->menu;
            // $data_output = ObjectiveGoals::where('is_active','=',true);
            $data_output = $this->service->getAll();
            // dd($data_output);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description');
                $language = Session::get('language');
            } else {
                $data_output = $data_output->select('english_title', 'english_description');
                $language = 'en';
            }
            $data_output = $data_output->get()
                    ->toarray();
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.aboutus.list-objectivegoals-web',compact('data_output','language','menu'));
    }

    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }

}
