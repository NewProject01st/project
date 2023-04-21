<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PoliciesActs;
use App\Http\Services\PoliciesActsServices;
use Validator;
class PoliciesActsController extends Controller
{

   public function __construct()
    {
        $this->service = new PoliciesActsServices();
    }
    public function index()
    {
        try {
            $policiesacts = $this->service->getAll();
            return view('admin.pages.policiesacts.list-policiesacts', compact('policiesacts'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.policiesacts.add-policiesacts');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_pdf' => 'required',
            'marathi_pdf' => 'required'
            
         ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_description'=>'required',
        'marathi_description'=>'required',
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-policiesacts')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_policiesacts = $this->service->addAll($request);
            // print_r($add_policiesacts);
            // die();
            if($add_policiesacts)
            {

                $msg = $add_policiesacts['msg'];
                $status = $add_policiesacts['status'];
                if($status=='success') {
                    return redirect('list-policiesacts')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-policiesacts')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-policiesacts')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $policiesacts = $this->service->getById($request->show_id);
            return view('admin.pages.policiesacts.show-policiesacts', compact('policiesacts'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $policiesacts = PoliciesActs::find($request->edit_id);
        return view('admin.pages.policiesacts.edit-policiesacts', compact('policiesacts'));
    }
    public function update(Request $request, $id)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_pdf' => 'required',
        'marathi_pdf' => 'required'
        
     ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_description'=>'required',
        'marathi_description'=>'required',
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_policiesacts = $this->service->updateAll($request->edit_id);
            if ($update_policiesacts) {
                $msg = $update_policiesacts['msg'];
                $status = $update_policiesacts['status'];
                if ($status == 'success') {
                    return redirect('list-policiesacts')->with(compact('msg', 'status'));
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
            $policiesacts = $this->service->deleteById($request->delete_id);
            return redirect('list-policiesacts')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
