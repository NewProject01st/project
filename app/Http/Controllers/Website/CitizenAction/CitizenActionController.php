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

    public function storeIncidentModalInfo(Request $request) {
     
        $rules = [
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
            'media_upload' => 'required',
            'g-recaptcha-response' => 'required|captcha',

            'ngo_name' => 'required',
            'ngo_email' => 'required',
            'ngo_contact_number' => 'required',
            'ngo_photo' => 'required',

            ];
        $messages = [   
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
            'media_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('report-incident-crowdsourcing-web')
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
                        return redirect('report-incident-crowdsourcing-web')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('report-incident-crowdsourcing-web')->withInput()->with(compact('language','menu','msg','status'));
    
                    }
                }
    
            }
        } catch (Exception $e) {
            return redirect('report-incident-crowdsourcing-web')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    // public function storeVolunteerModalInfo(Request $request) {
     
    //     $rules = [
    //         'incident' => 'required',
    //         'location' => 'required',
    //         'datetime' => 'required',
    //         'mobile_number' => 'required',
    //         'description' => 'required',
    //         'media_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'g-recaptcha-response' => 'required|captcha',
            
    //         ];
    //     $messages = [   
    //         'incident' => 'required',
    //         'location' => 'required',
    //         'datetime' => 'required',
    //         'mobile_number' => 'required',
    //         'description' => 'required',
    //         'media_upload.required' => 'The image field is required.',
    //         'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
    //         'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
    //     ];
    //     if ($request->has('checkbox_field') && $request->input('checkbox_field') == 1) {
    //         $rules['ngo_name'] = 'required';
    //         $rules['ngo_email'] = 'required|email';
    //         $rules['ngo_address'] = 'required';
    //         $rules['ngo_contact_number'] = 'required';
    //         $rules['ngo_photo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            
    //         $messages['ngo_name.required'] = 'The NGO name field is required.';
    //         $messages['ngo_email.required'] = 'The NGO email field is required.';
    //         $messages['ngo_email.email'] = 'The NGO email must be a valid email address.';
    //         $messages['ngo_address.required'] = 'The NGO address field is required.';
    //         $messages['ngo_contact_number.required'] = 'The NGO number field is required.';
    //         $messages['ngo_photo.required'] = 'The NGO number field is required.';
    //     }
    
    
    //     try {
    //         $validation = Validator::make($request->all(),$rules,$messages);
    //         if($validation->fails() )
    //         {
    //             return redirect('add-volunteer-citizen-support-web')
    //                 ->withInput()
    //                 ->withErrors($validation);
    //         }
    //         else
    //         {
    //             $add_modal = $this->service->addVolunteerModalInfo($request);
    
    //             // dd($add_contact);
    //             if($add_modal)
    //             {
    
    //                 $msg = $add_modal['msg'];
    //                 $status = $add_modal['status'];
    //                 if($status=='success') {
    //                     Session::flash('success_message', 'Form submitted successfully!');
    //                     return redirect('add-volunteer-citizen-support-web')->with(compact('msg','status'));
    //                 }
    //                 else {
    //                     return redirect('add-volunteer-citizen-support-web')->withInput()->with(compact('language','menu','msg','status'));
    
    //                 }
    //             }
    
    //         }
    //     } catch (Exception $e) {
    //         return redirect('add-volunteer-citizen-support-web')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    //     }
    // }

    public function storeVolunteerModalInfo(Request $request)
{
    $rules = [
        'incident' => 'required',
        'location' => 'required',
        'datetime' => 'required',
        'mobile_number' => 'required',
        'description' => 'required',
        // 'media_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'g-recaptcha-response' => 'required|captcha',
    ];
    
    $messages = [
        'incident' => 'The incident field is required.',
        'location' => 'The location field is required.',
        'datetime' => 'The datetime field is required.',
        'mobile_number' => 'The mobile number field is required.',
        'description' => 'The description field is required.',
        // 'media_upload.required' => 'The image field is required.',
        'g-recaptcha-response.captcha' => 'Captcha error! Please try again later or contact the site admin.',
        'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
    ];
    
    if ($request->has('checkbox_field') && $request->input('checkbox_field') == 1) {
        $rules['ngo_name'] = 'required';
        $rules['ngo_email'] = 'required|email';
        $rules['ngo_address'] = 'required';
        $rules['ngo_contact_number'] = 'required';
        // $rules['ngo_photo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        
        $messages['ngo_name.required'] = 'The NGO name field is required.';
        $messages['ngo_email.required'] = 'The NGO email field is required.';
        $messages['ngo_email.email'] = 'The NGO email must be a valid email address.';
        $messages['ngo_address.required'] = 'The NGO address field is required.';
        $messages['ngo_contact_number.required'] = 'The NGO number field is required.';
        // $messages['ngo_photo.required'] = 'The NGO photo field is required.';
    }

    $validation = Validator::make($request->all(), $rules, $messages);

    if ($validation->fails()) {
        return redirect('add-volunteer-citizen-support-web')
            ->withInput()
            ->withErrors($validation);
    }

    try {
        $add_modal = $this->service->addVolunteerModalInfo($request);

        if ($add_modal && $add_modal['status'] == 'success') {
            Session::flash('success_message', 'Form submitted successfully!');
            return redirect('add-volunteer-citizen-support-web')->with(compact('msg', 'status'));
        } else {
            return redirect('add-volunteer-citizen-support-web')->withInput()->with(compact('language', 'menu', 'msg', 'status'));
        }
    } catch (Exception $e) {
        return redirect('add-volunteer-citizen-support-web')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}


    public function getAllIncidentType()
    {
        try {
            $menu = $this->menu;
            $socialicon = $this->socialicon;
             $data_output = $this->service->getAllIncidentType();
            // dd($data_output);
        $data_output_incident = $data_output['data_output_incident'];
        if (Session::get('language') == 'mar') {
            $language = Session::get('language');
        } else {
            $language = 'en';
        }
        } catch (\Exception $e) {
        return $e;
        }
        return view('website.pages.citizen-action.report-incident-crowdsourcing-web',compact('language','menu','socialicon', 'data_output_incident'));
    }  


    public function getAddVolunteerCitizenSupport()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
             $data_output = $this->service->getAllVolunteerCitizenSupport();
            // dd($data_output);
             $data_output_incident = $data_output['data_output_incident'];
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.citizen-action.volunteer-citizen-support-web',compact('language','menu','socialicon', 'data_output_incident'));
    }
    
    
}