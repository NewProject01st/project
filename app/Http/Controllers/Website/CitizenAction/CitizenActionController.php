<?php

namespace App\Http\Controllers\Website\CitizenAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\CitizenAction\CitizenActionServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;
use Validator;


// use App\Models\ {
// };

class CitizenActionController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new CitizenActionServices();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllReportIncidentCrowdsourcing()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllReportIncidentCrowdsourcing();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.citizen-action.list-report-incident-crowdsourcing-web',compact('language','menu','socialicon', 'data_output'));
    }  
    public function getAllVolunteerCitizenSupport()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllVolunteerCitizenSupport();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.citizen-action.list-volunteer-citizen-support-web',compact('language','menu','socialicon', 'data_output'));
    }

    public function getAllCitizenFeedbackSuggestions()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllCitizenFeedbackSuggestions();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.citizen-action.list-citizen-feedback-suggestions-web',compact('language','menu','socialicon', 'data_output'));
    }

    // public function add()
    // {
    //     try {
    //         $menu = $this->menu;
    //         $socialicon = $this->socialicon;
    //         if (Session::get('language') == 'mar') {
    //             $language = Session::get('language');
    //         } else {
    //             $language = 'en';
    //         }
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.citizen-action.list-report-incident-crowdsourcing-web',compact('language','menu','socialicon'));

        
    // }

    public function store(Request $request) {
     
        $rules = [
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
            'media_upload' => 'required',
            ];
        $messages = [   
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
            'media_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('report-modal')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_modal = $this->service->addIncidentModalInfo($request);
    
                // dd($add_contact);
                if($add_modal)
                {
    
                    $msg = $add_modal['msg'];
                    $status = $add_modal['status'];
                    if($status=='success') {
                        Session::flash('success_message', 'Form submitted successfully!');
                        return redirect('list-report-incident-crowdsourcing-web')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('list-report-incident-crowdsourcing-web')->withInput()->with(compact('language','menu','msg','status'));
    
                    }
                }
    
            }
        } catch (Exception $e) {
            return redirect('list-report-incident-crowdsourcing-web')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function VolunteerModalInfo(Request $request) {
     
        $rules = [
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
            'media_upload' => 'required',
            ];
        $messages = [   
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
            'media_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('report-modal')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_modal = $this->service->addIncidentModalInfo($request);
    
                // dd($add_contact);
                if($add_modal)
                {
    
                    $msg = $add_modal['msg'];
                    $status = $add_modal['status'];
                    if($status=='success') {
                        Session::flash('success_message', 'Form submitted successfully!');
                        return redirect('list-report-incident-crowdsourcing-web')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('list-report-incident-crowdsourcing-web')->withInput()->with(compact('language','menu','msg','status'));
    
                    }
                }
    
            }
        } catch (Exception $e) {
            return redirect('list-report-incident-crowdsourcing-web')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    
    // public function getAllPublicAwarenessEducation()
    // {
    //     try {

    //         $menu = $this->menu;
    //         $data_output = $this->service->getAllPublicAwarenessEducation();
    //         if (Session::get('language') == 'mar') {
    //             $language = Session::get('language');
    //         } else {
    //             $language = 'en';
    //         }

    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.citizen-action.list-capacity-training-web',compact('language','menu', 'data_output'));
    // }

}