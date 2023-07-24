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

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  

    public function storeIncidentModalInfo(Request $request) {
     
      
        $rules = [
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required|unique:report_incident_modals,mobile_number',
            'description' => 'required',
            'media_upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'g-recaptcha-response' => 'required|captcha',

            ];
        $messages = [   
            'incident.required' => 'Please select Incident Type',
            'location.required' => 'Please enter Location',
            'datetime.required' => 'Please select Date Time',
            'mobile_number.required' => 'Please enter Contact Number',
            'mobile_number.unique' => 'Your Contact Number is already exist.',
            'description.required' => 'Please enter Description',
            'media_upload.required' => 'The image is required.',
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


    public function storeVolunteerModalInfo(Request $request) {

        $rules = [
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required|unique:citizen_volunteer_modals,mobile_number',
            'description' => 'required',
            'media_upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'g-recaptcha-response' => 'required|captcha',

        ];
        
        $messages = [
            'incident' => 'The incident field is required.',
            'location' => 'The location field is required.',
            'datetime' => 'The datetime field is required.',
            'mobile_number.required' => 'Please enter Contact Number',
            'mobile_number.unique' => 'Your Contact Number is already exist.',
            'description' => 'The description field is required.',
            'media_upload.required' => 'The image field is required.',
            'g-recaptcha-response.captcha' => 'Captcha error! Please try again later or contact the site admin.',
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
        ];

        if($request->is_ngo == 'on') {
            $rules['ngo_name'] = 'required|regex:/^[a-zA-Z\s]+$/u';
            $rules['ngo_email'] = 'required|unique:citizen_volunteer_modals,ngo_email';
            $rules['ngo_contact_number'] = 'required|unique:citizen_volunteer_modals,ngo_contact_number';
            $rules['ngo_photo'] = 'required|image|mimes:jpeg,png,jpg|max:2048'; 

            $messages['ngo_name'] = 'Ngo name is required';
            $messages['ngo_name.regex'] = 'Please  enter text only..';
            $messages['ngo_email.required'] = 'Please Enter Ngo Email Id';
            $messages['ngo_email.unique'] = 'Your Email Id is already exist';
            $messages['ngo_contact_number.required'] = 'Please Enter Ngo Contact Number';
            $messages['ngo_contact_number.unique'] = 'Your Ngo Contact Number is already exist';
            $messages['ngo_photo'] = 'Ngo photo required';
        }

        
        if ($request->has('checkbox_field') && $request->input('checkbox_field') == 1) {
            $rules['ngo_name'] = 'required|regex:/^[a-zA-Z\s]+$/u';
            $rules['ngo_email'] = 'required|unique:citizen_volunteer_modals,ngo_email';
            $rules['ngo_contact_number'] = 'required|unique:citizen_volunteer_modals,ngo_contact_number';
            $rules['ngo_address'] = 'required';
            $rules['ngo_photo'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
            
            $messages['ngo_name.required'] = 'The NGO name field is required.';
            $messages['ngo_name.regex'] = 'Please  enter text only..';
            $messages['ngo_email.required'] = 'The NGO email field is required.';
            $messages['ngo_address.required'] = 'The NGO address field is required.';
            $messages['ngo_email.required'] = 'Please Enter Ngo Email Id';
            $messages['ngo_email.unique'] = 'Your Email Id is already exist';
            $messages['ngo_contact_number.required'] = 'Please Enter Ngo Contact Number';
            $messages['ngo_contact_number.unique'] = 'Your Ngo Contact Number is already exist';
            $messages['ngo_photo.required'] = 'The NGO photo field is required.';
        }

        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            return redirect('add-volunteer-citizen-support-web')
                ->withInput()
                ->withErrors($validation);
        }

        try {
            $add_modal = $this->service->addVolunteerModalInfo($request);
        // dd($add_modal);
            $msg = $add_modal['msg'];
            $status = $add_modal['status'];
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
             $data_output = $this->service->getAllIncidentType();
        $data_output_incident = $data_output['data_output_incident'];
        if (Session::get('language') == 'mar') {
            $language = Session::get('language');
        } else {
            $language = 'en';
        }
        } catch (\Exception $e) {
        return $e;
        }
        return view('website.pages.citizen-action.report-incident-crowdsourcing-web',compact('language','menu', 'data_output_incident'));
    }  


    public function getAddVolunteerCitizenSupport()
    {
        try {

            $menu = $this->menu;
             $data_output = $this->service->getAllVolunteerCitizenSupport();
             $data_output_incident = $data_output['data_output_incident'];
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.citizen-action.volunteer-citizen-support-web',compact('language','menu','data_output_incident'));
    }
    
    
}