<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StateDisasterManagementAuthority;
use App\Http\Services\AboutUs\StateDisasterManagementAuthorityServices;
use Validator;
class StateDisasterManagementAuthorityController extends Controller
{

   public function __construct()
    {
        $this->service = new StateDisasterManagementAuthorityServices();
    }
    public function index()
    {
        try {
            $statedisastermanagementauthority = $this->service->getAll();
            return view('admin.pages.aboutus.state-disaster-management-authority.list-statedisastermanagementauthority', compact('statedisastermanagementauthority'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.aboutus.state-disaster-management-authority.add-statedisastermanagementauthority');
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
            return redirect('add-statedisastermanagementauthority')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_statedisastermanagementauthority = $this->service->addAll($request);
            if($add_statedisastermanagementauthority)
            {

                $msg = $add_statedisastermanagementauthority['msg'];
                $status = $add_statedisastermanagementauthority['status'];
                if($status=='success') {
                    return redirect('list-statedisastermanagementauthority')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-statedisastermanagementauthority')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-statedisastermanagementauthority')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $statedisastermanagementauthority = $this->service->getById($request->show_id);
            return view('admin.pages.aboutus.state-disaster-management-authority.show-statedisastermanagementauthority', compact('statedisastermanagementauthority'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $statedisastermanagementauthority = $this->service->getById($edit_data_id);
        return view('admin.pages.aboutus.state-disaster-management-authority.edit-statedisastermanagementauthority', compact('statedisastermanagementauthority'));
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
            $update_statedisastermanagementauthority = $this->service->updateAll($request);
            if ($update_statedisastermanagementauthority) {
                $msg = $update_statedisastermanagementauthority['msg'];
                $status = $update_statedisastermanagementauthority['status'];
                if ($status == 'success') {
                    return redirect('list-statedisastermanagementauthority')->with(compact('msg', 'status'));
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
            $statedisastermanagementauthority = $this->service->deleteById($request->delete_id);
            return redirect('list-statedisastermanagementauthority')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}