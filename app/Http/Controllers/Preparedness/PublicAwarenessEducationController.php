<?php

namespace App\Http\Controllers\Preparedness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicAwarenessEducation;
use App\Http\Services\Preparedness\PublicAwarenessEducationServices;
use Validator;
class PublicAwarenessEducationController extends Controller
{

   public function __construct()
    {
        $this->service = new PublicAwarenessEducationServices();
    }
    public function index()
    {
        try {
            $awareness_education = $this->service->getAll();
            return view('admin.pages.preparedness.awareness-education.list-awareness-education', compact('awareness_education'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.preparedness.awareness-education.add-awareness-education');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required',
            'marathi_image' => 'required',
            
         ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-public-awareness-and-education')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_awareness_education = $this->service->addAll($request);
            // print_r($add_awareness_education);
            // die();
            if($add_awareness_education)
            {

                $msg = $add_awareness_education['msg'];
                $status = $add_awareness_education['status'];
                if($status=='success') {
                    return redirect('list-public-awareness-and-education')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-public-awareness-and-education')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-public-awareness-and-education')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $awareness_education = $this->service->getById($edit_data_id);
        return view('admin.pages.preparedness.awareness-education.edit-awareness-education', compact('awareness_education'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        
     ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
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
            $update_awareness_education = $this->service->updateAll($request);
            if ($update_awareness_education) {
                $msg = $update_awareness_education['msg'];
                $status = $update_awareness_education['status'];
                if ($status == 'success') {
                    return redirect('list-public-awareness-and-education')->with(compact('msg', 'status'));
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
            $awareness_education = $this->service->getById($request->show_id);
            return view('admin.pages.preparedness.awareness-education.show-awareness-education', compact('awareness_education'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $awareness_education = $this->service->deleteById($request->delete_id);
            return redirect('list-public-awareness-and-education')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}