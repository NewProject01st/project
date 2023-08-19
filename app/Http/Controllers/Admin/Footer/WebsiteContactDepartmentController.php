<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteContact;
use App\Http\Services\Admin\Footer\WebsiteContactDepartmentServices;
use Validator;
class WebsiteContactDepartmentController extends Controller
{

   public function __construct()
    {
        $this->service = new WebsiteContactDepartmentServices();
    }
    public function index()
    {
        try {
            $website_contact_department = $this->service->getAll();
            return view('admin.pages.footer.website-contact-department.list-contact-department', compact('website_contact_department'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.footer.website-contact-department.add-contact-department');
    }

    public function store(Request $request) {
        $rules = [
            'department_english_name' => 'required|max:25',
            'department_marathi_name' => 'required|max:25',
            'department_english_address' => 'required|max:255',
            'department_marathi_address' => 'required|max:255',
            'department_email' => 'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'department_english_contact_number' => 'required',
            'department_marathi_contact_number' => 'required',
            
         ];
    $messages = [  
        'department_english_name.required' => 'Please enter name.',
        'department_marathi_name.required' => 'कृपया नाव प्रविष्ट करा',
        'department_english_address.required' => 'Please enter address.',
        'department_english_address.max'   => 'Please  enter address length upto 255 character only.',
        'department_marathi_address.required' => 'कृपया पत्ता प्रविष्ट करा.',
        'department_marathi_address.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
        'department_email.required' => 'required',
        'department_email.regex' => 'Enter valid email.',
        'department_english_contact_number.required' => 'Please enter mobile number.',
        'department_marathi_contact_number.required' => 'कृपया मोबाईल नंबर टाका',
 
    ];  

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-contact-department')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_general_contact = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_general_contact)
            {

                $msg = $add_general_contact['msg'];
                $status = $add_general_contact['status'];
                if($status=='success') {
                    return redirect('list-contact-department')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-contact-department')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-contact-department')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $website_contact_department = $this->service->getById($edit_data_id);
        return view('admin.pages.footer.website-contact-department.edit-contact-department', compact('website_contact_department'));
    }
    public function update(Request $request)
{
    $rules = [
        'department_english_name' => 'required|max:25',
        'department_marathi_name' => 'required|max:25',
        'department_english_address' => 'required|max:255',
        'department_marathi_address' => 'required|max:255',
        'department_email' => 'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
        'department_english_contact_number' => 'required',
        'department_marathi_contact_number' => 'required',
        
     ];
    $messages = [   
        'department_english_name.required' => 'Please enter name.',
        'department_marathi_name.required' => 'कृपया नाव प्रविष्ट करा',
        'department_english_address.required' => 'Please enter address.',
        'department_english_address.max'   => 'Please  enter address length upto 255 character only.',
        'department_marathi_address.required' => 'कृपया पत्ता प्रविष्ट करा.',
        'department_marathi_address.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
        'department_email.required' => 'required',
        'department_email.regex' => 'Enter valid email.',
        'department_english_contact_number.required' => 'Please enter mobile number.',
        'department_marathi_contact_number.required' => 'कृपया मोबाईल नंबर टाका',
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
                    return redirect('list-contact-department')->with(compact('msg', 'status'));
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
            $website_contact_department = $this->service->getById($request->show_id);
            return view('admin.pages.footer.website-contact-department.show-contact-department', compact('website_contact_department'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    
public function updateOne(Request $request)
{
    try {
        $active_id = $request->active_id;
        
    $result = $this->service->updateOne($active_id);
 
        return redirect('list-contact-department')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}


public function destroy(Request $request){
    try {
        $contact = $this->service->deleteById($request->delete_id);
        if ($contact) {
            $msg = $contact['msg'];
            $status = $contact['status'];
            if ($status == 'success') {
                return redirect('list-contact-department')->with(compact('msg', 'status'));
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