<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PolicyPrivacy;
use App\Http\Services\Admin\Footer\PolicyPrivacyServices;
use Validator;
class PolicyPrivacyController extends Controller
{

   public function __construct()
    {
        $this->service = new PolicyPrivacyServices();
    }
    public function index()
    {
        try {
            $privacy_policy = $this->service->getAll();
            return view('admin.pages.footer.privacy-policy.list-privacy-policy', compact('privacy_policy'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.footer.privacy-policy.add-privacy-policy');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            
         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',    
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-privacy-policy')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_privacy_policy = $this->service->add($request);
            if($add_privacy_policy)
            {
                $msg = $add_privacy_policy['msg'];
                $status = $add_privacy_policy['status'];
                if($status=='success') {
                    return redirect('list-privacy-policy')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-privacy-policy')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-privacy-policy')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $privacy_policy = $this->service->getById($request->show_id);
            return view('admin.pages.footer.privacy-policy.show-privacy-policy', compact('privacy_policy'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $privacy_policy = PolicyPrivacy::find($request->edit_id);

        return view('admin.pages.footer.privacy-policy.edit-privacy-policy', compact('privacy_policy'));
    }

    public function update(Request $request) {
    $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',  
        
     ];

    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',    
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_privacy_policy = $this->service->update($request);
            if ($update_privacy_policy) {
                $msg = $update_privacy_policy['msg'];
                $status = $update_privacy_policy['status'];
                if ($status == 'success') {
                    return redirect('list-privacy-policy')->with(compact('msg', 'status'));
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
// public function updateOne(Request $request)
// {
//     try {
//         $active_id = $request->active_id;
//     $result = $this->service->updateOne($active_id);
//         return redirect('list-important-link')->with('flash_message', 'Updated!');  
//     } catch (\Exception $e) {
//         return $e;
//     }
// }
    public function destroy(Request $request)
    {
        try {
            $privacy_policy = $this->service->deleteById($request->delete_id);
            return redirect('list-privacy-policy')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}