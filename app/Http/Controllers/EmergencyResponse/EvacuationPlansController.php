<?php

namespace App\Http\Controllers\EmergencyResponse;
use App\Http\Services\EmergencyResponse\EvacuationPlansServices;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvacuationPlansController extends Controller
{
    public function __construct()
    {
        $this->service = new EvacuationPlansServices();
    }
    public function index()
    {
        try {
            $evacuationplans = $this->service->getAll();
            return view('admin.pages.emergency-response.evacuation-plans.list-evacuation-plans', compact('evacuationplans'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.emergency-response.evacuation-plans.add-evacuation-plans');
    }

    public function store(Request $request) {
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ];
    $messages = [   
           'english_title.required' => 'Please enter title.',
            'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
            'english_description.required' => 'Please enter description.',
            'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
            'english_image.required' => 'The image field is required.',
            'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-evacuation-plans')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_evacuationplans = $this->service->addAll($request);
            if($add_evacuationplans)
            {

                $msg = $add_evacuationplans['msg'];
                $status = $add_evacuationplans['status'];
                if($status=='success') {
                    return redirect('list-evacuation-plans')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-evacuation-plans')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-evacuation-plans')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $evacuationplans = $this->service->getById($request->show_id);
            return view('admin.pages.emergency-response.evacuation-plans.show-evacuation-plans', compact('evacuationplans'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $evacuationplans = $this->service->getById($edit_data_id);
        return view('admin.pages.emergency-response.evacuation-plans.edit-evacuation-plans', compact('evacuationplans'));
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
            $update_evacuationplans = $this->service->updateAll($request);
            if ($update_evacuationplans) {
                $msg = $update_evacuationplans['msg'];
                $status = $update_evacuationplans['status'];
                if ($status == 'success') {
                    return redirect('list-evacuation-plans')->with(compact('msg', 'status'));
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
    public function destroy(Request $request)
    {
        try {
            $evacuationplans = $this->service->deleteById($request->delete_id);
            return redirect('list-evacuation-plans')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   
}