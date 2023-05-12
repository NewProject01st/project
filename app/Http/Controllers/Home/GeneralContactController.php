<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralContact;
use App\Http\Services\Home\GeneralContactServices;
use Validator;
class GeneralContactController extends Controller
{

   public function __construct()
    {
        $this->service = new GeneralContactServices();
    }
    public function index()
    {
        try {
            $general_contact = $this->service->getAll();
            return view('admin.pages.home.general_contact.list-contact', compact('general_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.general_contact.add-contact');
    }

    public function store(Request $request) {
        $rules = [
            'english_name' => 'required',
            'marathi_name' => 'required',           
            'english_number' => 'required',
            'marathi_number' => 'required',
            'english_icon' => 'required',
            'marathi_icon' => 'required',
            
         ];
    $messages = [   
        'english_name' => 'required',
        'marathi_name' => 'required',
        'english_number' => 'required',
        'marathi_number' => 'required',
        'english_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-general-contact')
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
                    return redirect('list-general-contact')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-general-contact')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-general-contact')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $general_contact = $this->service->getById($edit_data_id);
        return view('admin.pages.home.general_contact.edit-contact', compact('general_contact'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_name' => 'required',
        'marathi_name' => 'required',           
        'english_number' => 'required',
        'marathi_number' => 'required',
        'english_icon' => 'required',
        'marathi_icon' => 'required',
        
     ];
    $messages = [   
        'english_name' => 'required',
        'marathi_name' => 'required',
        'english_number' => 'required',
        'marathi_number' => 'required',
        'english_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        
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
                    return redirect('list-general-contact')->with(compact('msg', 'status'));
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
            $general_contacts = $this->service->getById($request->show_id);
            return view('admin.pages.home.general_contact.show-contact', compact('general_contacts'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $contact = $this->service->deleteById($request->delete_id);
            return redirect('list-general-contact')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}