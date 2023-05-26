<?php

namespace App\Http\Controllers\CitizenAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VolunteerCitizenSupport;
use App\Http\Services\CitizenAction\VolunteerCitizenSupportServices;
use Validator;
class VolunteerCitizenSupportController extends Controller
{

   public function __construct()
    {
        $this->service = new VolunteerCitizenSupportServices();
    }
    public function index()
    {
        try {
            $volunteer_support = $this->service->getAll();
            return view('admin.pages.citizen-action.volunteer-support.list-volunteer-support', compact('volunteer_support'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.citizen-action.volunteer-support.add-volunteer-support');
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
            return redirect('add-volunteer-citizen-support')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_volunteer_support = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_volunteer_support)
            {

                $msg = $add_volunteer_support['msg'];
                $status = $add_volunteer_support['status'];
                if($status=='success') {
                    return redirect('list-volunteer-citizen-support')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-volunteer-citizen-support')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-volunteer-citizen-support')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $volunteer_support = $this->service->getById($edit_data_id);
        return view('admin.pages.citizen-action.volunteer-support.edit-volunteer-support', compact('volunteer_support'));
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
            $update_volunteer_support = $this->service->updateAll($request);
            if ($update_volunteer_support) {
                $msg = $update_volunteer_support['msg'];
                $status = $update_volunteer_support['status'];
                if ($status == 'success') {
                    return redirect('list-volunteer-citizen-support')->with(compact('msg', 'status'));
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
            $volunteer_support = $this->service->getById($request->show_id);
            return view('admin.pages.citizen-action.volunteer-support.show-volunteer-support', compact('volunteer_support'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $volunteer = $this->service->deleteById($request->delete_id);
            return redirect('list-volunteer-citizen-support')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}