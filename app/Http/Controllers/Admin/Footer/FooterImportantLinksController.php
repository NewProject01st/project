<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterImportantLinks;
use App\Http\Services\Admin\Footer\FooterImportantLinksServices;
use Validator;
use Illuminate\Validation\Rule;
class FooterImportantLinksController extends Controller
{

   public function __construct()
    {
        $this->service = new FooterImportantLinksServices();
    }
    public function index()
    {
        try {
            $links = $this->service->getAll();
            return view('admin.pages.footer.important-links.list-important-link', compact('links'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.footer.important-links.add-important-link');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'url' => 'required',
         ];
    $messages = [ 

        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'url.required'=>'Please enter url.',
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-important-link')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_link = $this->service->add($request);
            if($add_link)
            {
                $msg = $add_link['msg'];
                $status = $add_link['status'];
                if($status=='success') {
                    return redirect('list-important-link')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-important-link')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-important-link')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $links = $this->service->getById($request->show_id);
            return view('admin.pages.footer.important-links.show-important-link', compact('links'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $edit_data_id = base64_decode($request->edit_id);
        $links = $this->service->getById($edit_data_id);
        return view('admin.pages.footer.important-links.edit-important-link', compact('links'));
    }

    public function update(Request $request) {
    $rules = [
        'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
        'marathi_title' => 'required|max:255',
        'url' => 'required',
    ];

    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'url.required'=>'Please enter url.',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_link = $this->service->update($request);
            if ($update_link) {
                $msg = $update_link['msg'];
                $status = $update_link['status'];
                if ($status == 'success') {
                    return redirect('list-important-link')->with(compact('msg', 'status'));
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
public function updateOne(Request $request)
{
    try {
        $active_id = $request->active_id;
    $result = $this->service->updateOne($active_id);
        return redirect('list-important-link')->with('flash_message', 'Updated!');  
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
                return redirect('list-important-link')->with(compact('msg', 'status'));
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