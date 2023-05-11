<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Services\Contact\ContactServices;
use Validator;
class ContactController extends Controller
{

   public function __construct()
    {
        $this->service = new ContactServices();
    }
    public function index()
    {
        try {
            $contact = $this->service->getAll();
            return view('admin.pages.contact.list-contact', compact('contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.contact.add-contact');
    }

    public function store(Request $request) {
        $rules = [
            'english_number' => 'required',
            'marathi_number' => 'required',
            
         ];
    $messages = [   
        'english_number'=>'required',
        'marathi_number'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-contact')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_contact = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_contact)
            {

                $msg = $add_contact['msg'];
                $status = $add_contact['status'];
                if($status=='success') {
                    return redirect('list-contact')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-contact')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-contact')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $contact = Contact::find($request->edit_id);
        return view('admin.pages.contact.edit-contact', compact('contact'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_number' => 'required',
        'marathi_number' => 'required',
        
     ];
    $messages = [   
        'english_number'=>'required',
        'english_number'=>'required',
        
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
                    return redirect('list-contact')->with(compact('msg', 'status'));
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
            $contacts = $this->service->getById($request->show_id);
            return view('admin.pages.contact.show-contact', compact('contacts'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $contact = $this->service->deleteById($request->delete_id);
            return redirect('list-contact')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}