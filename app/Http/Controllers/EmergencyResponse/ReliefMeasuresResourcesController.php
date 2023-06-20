<?php

namespace App\Http\Controllers\EmergencyResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\EmergencyResponse\ReliefMeasuresResourcesServices;
use Validator;

class ReliefMeasuresResourcesController extends Controller
{
    public function __construct()
    {
        $this->service = new ReliefMeasuresResourcesServices();
    }
    public function index()
    {
        try {
            $reliefmeasuresresources = $this->service->getAll();
            return view('admin.pages.emergency-response.relief-measures-resources.list-relief-measures-resources', compact('reliefmeasuresresources'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.emergency-response.relief-measures-resources.add-relief-measures-resources');
    }

    public function store(Request $request) {
        // dd($request);
    
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required'
        
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
            return redirect('add-relief-measures-resources')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_reliefmeasuresresources = $this->service->addAll($request);
            // print_r($add_reliefmeasuresresources);
            // die();
            if($add_reliefmeasuresresources)
            {

                $msg = $add_reliefmeasuresresources['msg'];
                $status = $add_reliefmeasuresresources['status'];
                if($status=='success') {
                    return redirect('list-relief-measures-resources')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-relief-measures-resources')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-relief-measures-resources')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $reliefmeasuresresources = $this->service->getById($request->show_id);
            return view('admin.pages.emergency-response.relief-measures-resources.show-relief-measures-resources', compact('reliefmeasuresresources'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $reliefmeasuresresources = $this->service->getById($edit_data_id);
        return view('admin.pages.emergency-response.relief-measures-resources.edit-relief-measures-resources', compact('reliefmeasuresresources'));
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
            $update_reliefmeasuresresources = $this->service->updateAll($request);
            if ($update_reliefmeasuresresources) {
                $msg = $update_reliefmeasuresresources['msg'];
                $status = $update_reliefmeasuresresources['status'];
                if ($status == 'success') {
                    return redirect('list-relief-measures-resources')->with(compact('msg', 'status'));
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
            // dd($request->delete_id);
            $reliefmeasuresresources = $this->service->deleteById($request->delete_id);
            return redirect('list-relief-measures-resources')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    } 
}