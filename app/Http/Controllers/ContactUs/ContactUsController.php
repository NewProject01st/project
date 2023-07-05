<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Services\ContactUs\ContactUsServives;
use Validator;
class ContactUsController extends Controller
{

   public function __construct()
    {
        $this->service = new ContactUsServives();
    }
    public function index()
    {
        try {
            $contact_data = $this->service->getAll();
            return view('admin.pages.contact-us.feedback-suggestion.list-contact-suggestion', compact('contact_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.contact-us.feedback-suggestion.add-contact-suggestion');
    }

    public function store(Request $request) {
        $rules = [
            'full_name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'mobile_number' => 'regex:/^\d{10}$/',
            'contact_type' => 'required',
            'subject' => 'required',
            'suggestion' => 'required',
            
         ];
    $messages = [   
        'full_name' => 'required',
        'email' => 'required',
        'mobile_number' => 'required',
        // 'mobile_number.regex' => 'Please enter 10 digit number.',
        'contact_type' => 'required',
        'subject' => 'required',
        'suggestion' => 'required',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-contact-suggestion')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_contact_data = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_contact_data)
            {

                $msg = $add_contact_data['msg'];
                $status = $add_contact_data['status'];
                if($status=='success') {
                    return redirect('list-contact-suggestion')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-contact-suggestion')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-contact-suggestion')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $contact_data = $this->service->getById($edit_data_id);
        return view('admin.pages.contact-us.feedback-suggestion.edit-contact-suggestion', compact('contact_data'));
    }
    public function update(Request $request)
{
    $rules = [
            'full_name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'contact_type' => 'required',
            'subject' => 'required',
            'suggestion' => 'required',
        
     ];
    $messages = [   
        'full_name' => 'required',
        'email' => 'required',
        'mobile_number' => 'required',
        'contact_type' => 'required',
        'subject' => 'required',
        'suggestion' => 'required',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_contact_data = $this->service->updateAll($request);
            if ($update_contact_data) {
                $msg = $update_contact_data['msg'];
                $status = $update_contact_data['status'];
                if ($status == 'success') {
                    return redirect('list-contact-suggestion')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        }
    } catch (Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
 }
public function show(Request $request)
    {
        try {
            $contact_suggestion = $this->service->getById($request->show_id);
            return view('admin.pages.contact-us.feedback-suggestion.show-contact-suggestion', compact('contact_suggestion'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $delete = $this->service->deleteById($request->delete_id);
            if ($delete) {
                $msg = $delete['msg'];
                $status = $delete['status'];
                if ($status == 'success') {
                    return redirect('list-contact-suggestion')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        } catch (\Exception $e) {
            return $e;
        }
    } 

}