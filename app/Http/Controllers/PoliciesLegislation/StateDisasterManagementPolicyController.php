<?php

namespace App\Http\Controllers\PoliciesLegislation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StateDisasterManagementPolicy;
use App\Http\Services\PoliciesLegislation\StateDisasterManagementPolicyServices;
use Validator;
class StateDisasterManagementPolicyController extends Controller
{

   public function __construct()
    {
        $this->service = new StateDisasterManagementPolicyServices();
    }
    public function index()
    {
        try {
            $state_policy = $this->service->getAll();
            return view('admin.pages.policies-legislation.state-policy.list-state-management-policy', compact('state_policy'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.policies-legislation.state-policy.add-state-management-policy');
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
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-state-disaster-management-policy')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_state_management = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_state_management)
            {

                $msg = $add_state_management['msg'];
                $status = $add_state_management['status'];
                if($status=='success') {
                    return redirect('list-state-disaster-management-policy')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-state-disaster-management-policy')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-state-disaster-management-policy')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $state_policy = $this->service->getById($edit_data_id);
        return view('admin.pages.policies-legislation.state-policy.edit-state-management-policy', compact('state_policy'));
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
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
       
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
                    return redirect('list-state-disaster-management-policy')->with(compact('msg', 'status'));
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
            $state_policy = $this->service->getById($request->show_id);
            return view('admin.pages.policies-legislation.state-policy.show-state-management-policy', compact('state_policy'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $state_policy = $this->service->deleteById($request->delete_id);
            return redirect('list-state-disaster-management-policy')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}