<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmergencyContact;
use App\Http\Services\Admin\Home\EmergencyContactServices;
use Validator;
class EmergencyContactController extends Controller
{

   public function __construct()
    {
        $this->service = new EmergencyContactServices();
    }
    public function index()
    {
        try {
            $emergency_contact = $this->service->getAll();
            return view('admin.pages.home.emergency_contact.list-contact', compact('emergency_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.emergency_contact.add-contact');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_name' => 'required',
            'marathi_name' => 'required',
            'english_address' => 'required',
            'marathi_address' => 'required',
            'email' => 'required',   
            'english_number' => 'required',
            'marathi_number' => 'required',
            'english_landline_no' => 'required',
            'marathi_landline_no' => 'required',
            
         ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
         'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा.',
        'english_name.required' => 'Please enter name.',
        'marathi_name.required' => 'कृपया नाव प्रविष्ट करा.',
        'english_address.required' => 'Please enter address.',
        'marathi_address.required' => 'कृपया पत्ता प्रविष्ट करा.',
        'email.required' => 'Please enter email.',   
        'english_number.required' => 'Please enter number.',
        'marathi_number.required' => 'कृपया ईमेल प्रविष्ट करा.',
        'english_landline_no.required' => 'Please enter landline number.',
        'marathi_landline_no.required' => 'कृपया लँडलाइन नंबर प्रविष्ट करा.',
        
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-emergency-contact')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_emergency_contact = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_emergency_contact)
            {

                $msg = $add_emergency_contact['msg'];
                $status = $add_emergency_contact['status'];
                if($status=='success') {
                    return redirect('list-emergency-contact')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-emergency-contact')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-emergency-contact')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $emergency_contact = $this->service->getById($edit_data_id);
        return view('admin.pages.home.emergency_contact.edit-contact', compact('emergency_contact'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_name' => 'required',
        'marathi_name' => 'required',
        'english_address' => 'required',
        'marathi_address' => 'required',
        'email' => 'required',   
        'english_number' => 'required',
        'marathi_number' => 'required',
        'english_landline_no' => 'required',
        'marathi_landline_no' => 'required',
        
     ];
    $messages = [   
        'english_name' => 'required',
        'marathi_name' => 'required',
        'english_address' => 'required',
        'marathi_address' => 'required',
        'email' => 'required',   
        'english_number' => 'required',
        'marathi_number' => 'required',
        'english_landline_no' => 'required',
        'marathi_landline_no' => 'required',
            
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_contact = $this->service->updateAll($request);
            if ($update_contact) {
                $msg = $update_contact['msg'];
                $status = $update_contact['status'];
                if ($status == 'success') {
                    return redirect('list-emergency-contact')->with(compact('msg', 'status'));
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
            //  dd($request->show_id);
            $emergency_contacts = $this->service->getById($request->show_id);
            return view('admin.pages.home.emergency_contact.show-contact', compact('emergency_contacts'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-emergency-contact')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $contact = $this->service->deleteById($request->delete_id);
            return redirect('list-emergency-contact')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}