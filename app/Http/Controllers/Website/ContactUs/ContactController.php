<?php

namespace App\Http\Controllers\Website\ContactUs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\ContactUs\ContactServices;
use App\Http\Services\Website\ContactUs\CapacityTrainingServices;
use Validator;
use Session;


class ContactController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();
        $this->service = new ContactServices();
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    } 
    public function add()
    {
        try {
            $menu = $this->menu;
            $socialicon = $this->socialicon;
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.contact.feedback-suggestions',compact('language','menu','socialicon'));

        
    }

    public function store(Request $request) {
     
    $rules = [
        'full_name' => 'required',
        'email' => 'required|email',
        'mobile_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
        'contact_type' => 'required',
        'subject' => 'required',
        'suggestion' => 'required'
        ];
    $messages = [   
        'full_name.required' => 'Please Enter Full Name.',
        'email.required' => 'Please Enter Email.',
        'email.email' => 'Please Enter a Valid Email Address.',
        'mobile_number.required' => 'Please Enter Mobile Number.',
        'mobile_number.regex' => 'Please Enter a Valid Mobile Number.',
        'contact_type.required' => 'Please Enter Contact Type.',
        'subject.required' => 'Please Enter Subject.',
        'suggestion.required' => 'Please Enter Suggestion.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('feedback-suggestions')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_contact = $this->service->addAll($request);

            // dd($add_contact);
            if($add_contact)
            {

                $msg = $add_contact['msg'];
                $status = $add_contact['status'];
                if($status=='success') {
                    Session::flash('success_message', 'Form submitted successfully!');
                    return redirect('feedback-suggestions')->with(compact('msg','status'));
                }
                else {
                    return redirect('feedback-suggestions')->withInput()->with(compact('language','menu','msg','status'));

                }
            }

        }
    } catch (Exception $e) {
        return redirect('feedback-suggestions')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}

    public function getAllContactInformation()
    {
        try {
            $menu = $this->menu;
            $socialicon = $this->socialicon;
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.contact.contact-information',compact('language','menu', 'socialicon'));
    }



    // public function getFeedbackSuggestions()
    // {
    //     try {
    //         $menu = $this->menu;
    //         if (Session::get('language') == 'mar') {
    //             $language = Session::get('language');
    //         } else {
    //             $language = 'en';
    //         }
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.contact.feedback-suggestions',compact('language','menu'));
    // }
}
