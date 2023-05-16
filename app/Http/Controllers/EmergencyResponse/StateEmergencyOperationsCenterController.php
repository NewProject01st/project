<?php

namespace App\Http\Controllers\EmergencyResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\EmergencyResponse\StateEmergencyOperationsCenterServices;
use Validator;
class StateEmergencyOperationsCenterController extends Controller
{
    public function __construct()
    {
        $this->service = new StateEmergencyOperationsCenterServices();
    }
    public function index()
    {
        try {
            $stateemergencyoperationscenter = $this->service->getAll();
            return view('admin.pages.emergency-response.state-emergency-operations-center.list-state-emergency-operations-center', compact('stateemergencyoperationscenter'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.emergency-response.state-emergency-operations-center.add-state-emergency-operations-center');
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
        'english_title.required' => 'Please  enter english title.',
        'marathi_title.required' => 'Please enter marathi title.',
        'english_description.required' => 'Please  enter english description.',
        'marathi_description.required' => 'Please enter marathi description.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-state-emergency-operations-center')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_stateemergencyoperationscenter = $this->service->addAll($request);
            dd($add_stateemergencyoperationscenter);
            die();
            if($add_stateemergencyoperationscenter)
            {

                $msg = $add_stateemergencyoperationscenter['msg'];
                $status = $add_stateemergencyoperationscenter['status'];
                if($status=='success') {
                    return redirect('list-state-emergency-operations-center')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-state-emergency-operations-center')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-state-emergency-operations-center')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $stateemergencyoperationscenter = $this->service->getById($request->show_id);
            return view('admin.pages.emergency-response.state-emergency-operations-center.show-state-emergency-operations-center', compact('stateemergencyoperationscenter'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $stateemergencyoperationscenter = $this->service->getById($edit_data_id);
        return view('admin.pages.emergency-response.state-emergency-operations-center.edit-state-emergency-operations-center', compact('stateemergencyoperationscenter'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required'
        
     ];

    $messages = [   
        'english_title.required' => 'Please enter English title.',
        'marathi_title.required' => 'Please enter Marathi title.',
        'english_description.required' => 'Please  enter english description.',
        'marathi_description.required' => 'Please enter marathi description.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_stateemergencyoperationscenter = $this->service->updateAll($request);
            if ($update_stateemergencyoperationscenter) {
                $msg = $update_stateemergencyoperationscenter['msg'];
                $status = $update_stateemergencyoperationscenter['status'];
                if ($status == 'success') {
                    return redirect('list-state-emergency-operations-center')->with(compact('msg', 'status'));
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
            $stateemergencyoperationscenter = $this->service->deleteById($request->delete_id);
            return redirect('list-state-emergency-operations-center')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
}
