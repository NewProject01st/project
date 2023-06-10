<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteContact;
use App\Http\Services\Admin\Home\WebsiteContactServices;
use Validator;
class WebsiteContactController extends Controller
{

   public function __construct()
    {
        $this->service = new WebsiteContactServices();
    }
    public function index()
    {
        try {
            $website_contact = $this->service->getAll();
            return view('admin.pages.home.website_contact.list-contact', compact('website_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.website_contact.add-contact');
    }

    public function store(Request $request) {
        $rules = [
            'english_address' => 'required',
            'marathi_address' => 'required',           
            'email' => 'required',
            'english_number' => 'required',
            'marathi_number' => 'required',
            // 'marathi_icon' => 'required',
            
         ];
    $messages = [   
        'english_address' => 'required',
            'marathi_address' => 'required',           
            'email' => 'required',
            'english_number' => 'required',
            'marathi_number' => 'required',
        
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-website-contact')
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
                    return redirect('list-website-contact')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-website-contact')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-website-contact')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $website_contact = $this->service->getById($edit_data_id);
        return view('admin.pages.home.website_contact.edit-contact', compact('website_contact'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_address' => 'required',
        'marathi_address' => 'required',           
        'email' => 'required',
        'english_number' => 'required',
        'marathi_number' => 'required',
        
     ];
    $messages = [   
        'english_address' => 'required',
        'marathi_address' => 'required',           
        'email' => 'required',
        'english_number' => 'required',
        'marathi_number' => 'required',
            
        
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
                    return redirect('list-website-contact')->with(compact('msg', 'status'));
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
            $website_contact = $this->service->getById($request->show_id);
            return view('admin.pages.home.website_contact.show-contact', compact('website_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    
public function updateOne(Request $request)
{
    try {
        $active_id = $request->active_id;
    $result = $this->service->updateOne($active_id);
        return redirect('list-website-contact')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}


    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $contact = $this->service->deleteById($request->delete_id);
            return redirect('list-website-contact')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}