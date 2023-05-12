<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementWebPortal;
use App\Http\Services\Home\DisasterManagementWebPortalServices;
use Validator;
class DisasterManagementWebPortalController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterManagementWebPortalServices();
    }
    public function index()
    {
        try {
            $disaster_web_portal = $this->service->getAll();
            return view('admin.pages.home.disaster_webportal.list-disaster-web-portal', compact('disaster_web_portal'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.disaster_webportal.add-disaster-web-portal');
    }

    public function store(Request $request) {
        $rules = [
            'english_name' => 'required',
            'marathi_name' => 'required',
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required',
            'marathi_designation' => 'required',
            'english_image' => 'required',
            'marathi_image' => 'required',
            
         ];
    $messages = [   
        'english_name' => 'required',
        'marathi_name' => 'required',
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_designation' => 'required',
        'marathi_designation' => 'required',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-disaster-management-web-portal')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_disaster_web_portal = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_disaster_web_portal)
            {

                $msg = $add_disaster_web_portal['msg'];
                $status = $add_disaster_web_portal['status'];
                if($status=='success') {
                    return redirect('list-disaster-management-web-portal')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-disaster-management-web-portal')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-disaster-management-web-portal')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $disaster_web_portal = $this->service->getById($edit_data_id);
        return view('admin.pages.home.disaster_webportal.edit-disaster-web-portal', compact('disaster_web_portal'));
    }
    public function update(Request $request)
{
    $rules = [
            'english_name' => 'required',
            'marathi_name' => 'required',
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required',
            'marathi_designation' => 'required',
            'english_image' => 'required',
            'marathi_image' => 'required',
        
     ];
    $messages = [   
        'english_name' => 'required',
        'marathi_name' => 'required',
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_designation' => 'required',
        'marathi_designation' => 'required',
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
            $update_disaster_web_portal = $this->service->updateAll($request);
            if ($update_disaster_web_portal) {
                $msg = $update_disaster_web_portal['msg'];
                $status = $update_disaster_web_portal['status'];
                if ($status == 'success') {
                    return redirect('list-disaster-management-web-portal')->with(compact('msg', 'status'));
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
            $disaster_web_portal = $this->service->getById($request->show_id);
            return view('admin.pages.home.disaster_webportal.show-disaster-web-portal', compact('disaster_web_portal'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $disaster_web_portal = $this->service->deleteById($request->delete_id);
            return redirect('list-disaster-management-web-portal')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}