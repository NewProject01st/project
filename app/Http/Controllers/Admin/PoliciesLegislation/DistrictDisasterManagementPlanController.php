<?php

namespace App\Http\Controllers\Admin\PoliciesLegislation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DistrictDisasterManagementPlan;
use App\Http\Services\Admin\PoliciesLegislation\DistrictDisasterManagementPlanServices;
use Validator;
use Config;
class DistrictDisasterManagementPlanController extends Controller
{

   public function __construct()
    {
        $this->service = new DistrictDisasterManagementPlanServices();
    }
    public function index(){
        try {
            $district_management = $this->service->getAll();
            return view('admin.pages.policies-legislation.district-management.list-district-management-plan', compact('district_management'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function add(){
        return view('admin.pages.policies-legislation.district-management.add-district-management-plan');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'policies_year' => 'required',
            'english_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MIN_SIZE").'',
            'marathi_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MIN_SIZE").'',

            'url' => 'required',
         ];
        $messages = [   
            'english_title.required'=>'Please enter title.',
            'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            'url.required'=>'Please enter url.',
            'english_pdf.required' => 'Please upload an PDF file.',
            'english_pdf.file' => 'The file must be of type: file.',
            'english_pdf.mimes' => 'The file must be a PDF.',
            'english_pdf.max' => 'The PDF size must not exceed '.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MAX_SIZE").'MB .',
            'english_pdf.min' => 'The PDF size must not be less than '.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MIN_SIZE").'KB .',
            'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
            'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
            'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
            'marathi_pdf.max' => 'कृपया पीडीएफचा आकार जास्त नसावा.'.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MAX_SIZE").'MB .',
            'marathi_pdf.min' => 'कृपया पीडीएफचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DISTRICT_DISASTERMANAGEMENT_PLAN_PDF_MIN_SIZE").'KB .',

       ];
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('add-district-disaster-management-plan')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_district_management = $this->service->addAll($request);
                if($add_district_management)
                {

                    $msg = $add_district_management['msg'];
                    $status = $add_district_management['status'];
                    if($status=='success') {
                        return redirect('list-district-disaster-management-plan')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-district-disaster-management-plan')->withInput()->with(compact('msg','status'));
                    }
                }

            }
        } catch (Exception $e) {
            return redirect('add-district-disaster-management-plan')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    
    public function edit(Request $request){
        $edit_data_id = $request->edit_id;
        $district_management = $this->service->getById($edit_data_id);
        return view('admin.pages.policies-legislation.district-management.edit-district-management-plan', compact('district_management'));
    }

    public function update(Request $request){
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'policies_year' => 'required',
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
                $update_district_plan= $this->service->updateAll($request);
                if ($update_district_plan) {
                    $msg = $update_district_plan['msg'];
                    $status = $update_district_plan['status'];
                    if ($status == 'success') {
                        return redirect('list-district-disaster-management-plan')->with(compact('msg', 'status'));
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
                $district_management = $this->service->getById($request->show_id);
                return view('admin.pages.policies-legislation.district-management.show-district-management-plan', compact('district_management'));
            } catch (\Exception $e) {
                return $e;
            }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-district-disaster-management-plan')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $district_management = $this->service->deleteById($request->delete_id);
            return redirect('list-district-disaster-management-plan')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}