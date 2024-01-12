<?php

namespace App\Http\Controllers\Admin\Preparedness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Preparedness\GovtHospitalsServices;
use Validator;
use Config;
use Illuminate\Validation\Rule;
class GovtHospitalsController extends Controller
{

    public function __construct()
        {
            $this->service = new GovtHospitalsServices();
        }
        public function index()
        {
            try {
                $govt_hospitals = $this->service->getAll();
                return view('admin.pages.preparedness.govt-hospitals.list-govt-hospitals', compact('govt_hospitals'));
            } catch (\Exception $e) {
                return $e;
            }
        }


        public function add()
        {
            return view('admin.pages.preparedness.govt-hospitals.add-govt-hospitals');
        }
    
        public function store(Request $request) {
    
            $id = $request->input('id'); // Assuming the 'id' value is present in the request
    
            $rules = [
                'hospital_english_type' => 'required',
                'english_name' => 'required',
                'marathi_name' => 'required',
                'english_area' => 'required',
                'marathi_area' => 'required',
                'english_address' => 'required',
                'marathi_address' => 'required',
            ];
    
        $messages = [   
            'hospital_english_type.required'=>'Please select Hospital Type.',
            'english_name.required'=>'Please enter name.',  
            'marathi_name.required'=>'कृपया नाव प्रविष्ट करा',
            'english_area.required'=>'Please Enter the Area',    
            'marathi_area.required'=>'कृपया क्षेत्र प्रविष्ट करा',  
            'english_address.required'=>'Please Enter the Address',  
            'marathi_address.required'=>'कृपया पत्ता प्रविष्ट करा',  
        ];
        if($request->hospital_english_type == 1) {
            $rules['english_phone'] = 'required';
            $rules['marathi_phone'] = 'required';

            $messages['english_phone.required'] = 'Please Enter the Phone';
            $messages['marathi_phone.required'] = 'कृपया फोन प्रविष्ट करा.';        
       }
       elseif($request->hospital_english_type == 2) {
        $rules['english_pincode'] = 'required|regex:/^[0-9]{6}$/';
        $rules['marathi_pincode'] = 'required';
        $rules['email'] = 'required';

        $messages['english_pincode.required'] = 'Please Enter the Pincode';
        $messages['english_pincode.regex'] = 'Please enter a 6-digit pincode.';
        $messages['marathi_pincode.required'] = 'कृपया पिनकोड प्रविष्ट करा.';   
        $messages['email.required'] = 'Please Enter the Eamil';      
   }
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('add-govt-hospitals')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_constitutionhistory = $this->service->addAll($request);
                if($add_constitutionhistory)
                {
    
                    $msg = $add_constitutionhistory['msg'];
                    $status = $add_constitutionhistory['status'];
                    if($status=='success') {
                        return redirect('list-govt-hospitals')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-govt-hospitals')->withInput()->with(compact('msg','status'));
                    }
                }
            }
        } catch (Exception $e) {
            return redirect('add-govt-hospitals')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }        
       
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        // dd($edit_data_id);
        // die();
        $govt_hospitals = $this->service->getById($edit_data_id);
        return view('admin.pages.preparedness.govt-hospitals.edit-govt-hospitals', compact('govt_hospitals'));
    }

    public function update(Request $request){
        $id = $request->edit_id; // Assuming the 'id' value is present in the request

        // dd($request->all()); // Add this line for debugging
        $rules = [
            'hospital_english_type' => 'required',
            'english_name' => 'required',
            'marathi_name' => 'required',
            'english_area' => 'required',
            'marathi_area' => 'required',
            'english_address' => 'required',
            'marathi_address' => 'required',
        ];

    $messages = [   
        'hospital_english_type.required'=>'Please select Hospital Type.',
        'english_name.required'=>'Please enter name.',  
        'marathi_name.required'=>'कृपया नाव प्रविष्ट करा',
        'english_area.required'=>'Please Enter the Area',    
        'marathi_area.required'=>'कृपया क्षेत्र प्रविष्ट करा',  
        'english_address.required'=>'Please Enter the Address',  
        'marathi_address.required'=>'कृपया पत्ता प्रविष्ट करा',  
    ];
    if($request->hospital_english_type == 1) {
        $rules['english_phone'] = 'required';
        $rules['marathi_phone'] = 'required';

        $messages['english_phone.required'] = 'Please Enter the Phone';
        $messages['marathi_phone.required'] = 'कृपया फोन प्रविष्ट करा.';        
   }
   elseif($request->hospital_english_type == 2) {
    $rules['english_pincode'] = 'required|regex:/^[0-9]{6}$/';
    $rules['marathi_pincode'] = 'required';
    $rules['email'] = 'required';

    $messages['english_pincode.required'] = 'Please Enter the Pincode';
    $messages['english_pincode.regex'] = 'Please enter a 6-digit pincode.';
    $messages['marathi_pincode.required'] = 'कृपया पिनकोड प्रविष्ट करा.';   
    $messages['email.required'] = 'Please Enter the Eamil';      
}

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_relevant_laws= $this->service->updateAll($request);
                if ($update_relevant_laws) {
                    $msg = $update_relevant_laws['msg'];
                    $status = $update_relevant_laws['status'];
                    if ($status == 'success') {
                        return redirect('list-govt-hospitals')->with(compact('msg', 'status'));
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
            $govt_hospitals = $this->service->getById($request->show_id);
            return view('admin.pages.preparedness.govt-hospitals.show-govt-hospitals', compact('govt_hospitals'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-govt-hospitals')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $relevant_laws = $this->service->deleteById($request->delete_id);
            if ($relevant_laws) {
                $msg = $relevant_laws['msg'];
                $status = $relevant_laws['status'];
                if ($status == 'success') {
                    return redirect('list-govt-hospitals')->with(compact('msg', 'status'));
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