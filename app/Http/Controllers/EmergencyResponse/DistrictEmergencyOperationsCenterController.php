<?php

namespace App\Http\Controllers\EmergencyResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\EmergencyResponse\DistrictEmergencyOperationsCenterServices;
use Validator;
class DistrictEmergencyOperationsCenterController extends Controller
{
        public function __construct()
        {
            $this->service = new DistrictEmergencyOperationsCenterServices();
        }
        public function index()
        {
            try {
                $districtemergencyoperationscenter = $this->service->getAll();
                return view('admin.pages.emergency-response.district-emergency-operations-center.list-district-emergency-operations-center', compact('districtemergencyoperationscenter'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function add()
        {
            return view('admin.pages.emergency-response.district-emergency-operations-center.add-district-emergency-operations-center');
        }
    
        public function store(Request $request) {
            // dd($request);
    //         echo $disastermanagementportal_data;
    //  die();
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
                return redirect('add-district-emergency-operations-center')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_districtemergencyoperationscenter = $this->service->addAll($request);
                if($add_districtemergencyoperationscenter)
                {
    
                    $msg = $add_districtemergencyoperationscenter['msg'];
                    $status = $add_districtemergencyoperationscenter['status'];
                    if($status=='success') {
                        return redirect('list-district-emergency-operations-center')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-district-emergency-operations-center')->withInput()->with(compact('msg','status'));
                    }
                }
    
            }
        } catch (Exception $e) {
            return redirect('add-district-emergency-operations-center')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
        public function show(Request $request)
        {
            try {
                //  dd($request->show_id);
                $districtemergencyoperationscenter = $this->service->getById($request->show_id);
                return view('admin.pages.emergency-response.district-emergency-operations-center.show-district-emergency-operations-center', compact('districtemergencyoperationscenter'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function edit(Request $request)
        {
            $edit_data_id = $request->edit_id;
            $districtemergencyoperationscenter = $this->service->getById($edit_data_id);
            return view('admin.pages.emergency-response.district-emergency-operations-center.edit-district-emergency-operations-center', compact('districtemergencyoperationscenter'));
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
            'english_title.required' => 'Please enter English title.',
            'marathi_title.required' => 'Please enter Marathi title.',
            'english_description.required' => 'Please  enter english description.',
            'marathi_description.required' => 'Please enter marathi description.',
           
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_districtemergencyoperationscenter = $this->service->updateAll($request);
                if ($update_districtemergencyoperationscenter) {
                    $msg = $update_districtemergencyoperationscenter['msg'];
                    $status = $update_districtemergencyoperationscenter['status'];
                    if ($status == 'success') {
                        return redirect('list-district-emergency-operations-center')->with(compact('msg', 'status'));
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
                $districtemergencyoperationscenter = $this->service->deleteById($request->delete_id);
                return redirect('list-district-emergency-operations-center')->with('flash_message', 'Deleted!');  
            } catch (\Exception $e) {
                return $e;
            }
        }
}