<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObjectiveGoals;
use App\Http\Services\AboutUs\ObjectiveGoalsServices;
use Validator;
class ObjectiveGoalsController extends Controller
{

   public function __construct()
    {
        $this->service = new ObjectiveGoalsServices();
    }
    public function index()
    {
        try {
            $objectivegoals = $this->service->getAll();
            return view('admin.pages.aboutus.objective-goals.list-objectivegoals', compact('objectivegoals'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.aboutus.objective-goals.add-objectivegoals');
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
        'english_title' => 'Please  enter english title.',
        'marathi_title' => 'Please enter marathi title.',
        'english_description' => 'Please enter english description.',
        'marathi_description' => 'Please enter marathi description.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
      
        if($validation->fails() )
        {
            return redirect('add-objectivegoals')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_objectivegoals = $this->service->addAll($request);
            if($add_objectivegoals)
            {
                $msg = $add_objectivegoals['msg'];
                $status = $add_objectivegoals['status'];
                if($status=='success') {
                    return redirect('list-objectivegoals')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-objectivegoals')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-objectivegoals')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $objectivegoals = $this->service->getById($request->show_id);
            return view('admin.pages.aboutus.objective-goals.show-objectivegoals', compact('objectivegoals'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $edit_data_id = $request->edit_id;
        $objectivegoals = $this->service->getById($edit_data_id);
        return view('admin.pages.aboutus.objective-goals.edit-objectivegoals', compact('objectivegoals'));
    }

    public function update(Request $request) {
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required',
        
     ];

    $messages = [   
        'english_title' => 'Please enter English title.',
        'marathi_title' => 'Please enter Marathi title.',
        'english_description' => 'Please enter English description.',
        'marathi_description' => 'Please enter Marathi description.',
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
            $update_objectivegoals = $this->service->updateAll($request);
            if ($update_objectivegoals) {
                $msg = $update_objectivegoals['msg'];
                $status = $update_objectivegoals['status'];
                if ($status == 'success') {
                    return redirect('list-objectivegoals')->with(compact('msg', 'status'));
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
            $objectivegoals = $this->service->deleteById($request->delete_id);
            return redirect('list-objectivegoals')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}