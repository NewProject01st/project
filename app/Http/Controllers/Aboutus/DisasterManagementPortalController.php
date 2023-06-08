<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementPortal;
use App\Http\Services\AboutUs\DisasterManagementPortalServices;
use Validator;
class DisasterManagementPortalController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterManagementPortalServices();
    }
    public function index()
    {
        try {
            $disastermanagementportal = $this->service->getAll();
            return view('admin.pages.aboutus.disaster-management-portal.list-disastermanagementportal', compact('disastermanagementportal'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.aboutus.disaster-management-portal.add-disastermanagementportal');
    }

    public function store(Request $request) {
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
                return redirect('add-disastermanagementportal')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_disastermanagementportal = $this->service->addAll($request);
                if($add_disastermanagementportal)
                {

                    $msg = $add_disastermanagementportal['msg'];
                    $status = $add_disastermanagementportal['status'];
                    if($status=='success') {
                        return redirect('list-disastermanagementportal')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-disastermanagementportal')->withInput()->with(compact('msg','status'));
                    }
                }

            }
        } catch (Exception $e) {
            return redirect('add-disastermanagementportal')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    public function show(Request $request) {
        try {
            $disastermanagementportal = $this->service->getById($request->show_id);
            return view('admin.pages.aboutus.disaster-management-portal.show-disastermanagementportal', compact('disastermanagementportal'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $edit_data_id = $request->edit_id;
        $disastermanagementportal = $this->service->getById($edit_data_id);
        return view('admin.pages.aboutus.disaster-management-portal.edit-disastermanagementportal', compact('disastermanagementportal'));
    }
    public function update(Request $request) {
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
                $update_disastermanagementportal = $this->service->updateAll($request);
                if ($update_disastermanagementportal) {
                    $msg = $update_disastermanagementportal['msg'];
                    $status = $update_disastermanagementportal['status'];
                    if ($status == 'success') {
                        return redirect('list-disastermanagementportal')->with(compact('msg', 'status'));
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
    public function destroy(Request $request) {
        try {
            // dd($request->delete_id);
            $disastermanagementportal = $this->service->deleteById($request->delete_id);
            return redirect('list-disastermanagementportal')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}