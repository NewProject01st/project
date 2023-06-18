<?php

namespace App\Http\Controllers\Admin\PoliciesLegislation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StateDisasterManagementPlan;
use App\Http\Services\Admin\PoliciesLegislation\StateDisasterManagementPlanServices;
use Validator;
class StateDisasterManagementPlanController extends Controller
{

   public function __construct(){
        $this->service = new StateDisasterManagementPlanServices();
    }
    public function index(){
        try {
            $state_management = $this->service->getAll();
            return view('admin.pages.policies-legislation.state-management.list-state-management-plan', compact('state_management'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add(){
        return view('admin.pages.policies-legislation.state-management.add-state-management-plan');
    }

    public function store(Request $request){
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_pdf' => 'required|file|mimes:pdf',
            'marathi_pdf' => 'required|file|mimes:pdf',
            'url' => 'required',
         ];
        $messages = [   
            'english_title.required'=>'Please enter title.',
            'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            'url.required'=>'Please enter url.',
            'english_pdf.required' => 'Please upload an PDF file.',
            'english_pdf.file' => 'The file must be of type: file.',
            'english_pdf.mimes' => 'The file must be a PDF.',
            'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
            'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
            'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',

       ];

        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('add-state-disaster-management-plan')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_state_management = $this->service->addAll($request);
                if($add_state_management)
                {

                    $msg = $add_state_management['msg'];
                    $status = $add_state_management['status'];
                    if($status=='success') {
                        return redirect('list-state-disaster-management-plan')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-state-disaster-management-plan')->withInput()->with(compact('msg','status'));
                    }
                }

            }
        } catch (Exception $e) {
            return redirect('add-state-disaster-management-plan')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    
    public function edit(Request $request){
        $edit_data_id = $request->edit_id;
        $state_management = $this->service->getById($edit_data_id);
        return view('admin.pages.policies-legislation.state-management.edit-state-management-plan', compact('state_management'));
    }

    public function update(Request $request){
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            // 'english_pdf' => 'required|file|mimes:pdf',
            // 'marathi_pdf' => 'required|file|mimes:pdf',
            'url' => 'required',
            
        ];
        $messages = [   
            'english_title.required'=>'Please enter title.',
            'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            'url.required'=>'Please enter url.',
            // 'english_pdf.required' => 'Please upload an PDF file.',
            // 'english_pdf.file' => 'The file must be of type: file.',
            // 'english_pdf.mimes' => 'The file must be a PDF.',
            // 'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
            // 'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
            // 'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
        ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_state_plan= $this->service->updateAll($request);
                if ($update_state_plan) {
                    $msg = $update_state_plan['msg'];
                    $status = $update_state_plan['status'];
                    if ($status == 'success') {
                        return redirect('list-state-disaster-management-plan')->with(compact('msg', 'status'));
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
    
    public function show(Request $request){
        try {
            //  dd($request->show_id);
            $state_management = $this->service->getById($request->show_id);
            return view('admin.pages.policies-legislation.state-management.show-state-management-plan', compact('state_management'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-state-disaster-management-plan')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $state_management = $this->service->deleteById($request->delete_id);
            // dd($state_management);
            return redirect('list-state-disaster-management-plan')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}