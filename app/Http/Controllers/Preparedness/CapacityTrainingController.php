<?php

namespace App\Http\Controllers\Preparedness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CapacityTraining;
use App\Http\Services\Preparedness\CapacityTrainingServices;
use Validator;
class CapacityTrainingController extends Controller
{

   public function __construct()
    {
        $this->service = new CapacityTrainingServices();
    }
    public function index()
    {
        try {
            $capacity_training = $this->service->getAll();
            return view('admin.pages.preparedness.capacity_training.list-capacity-training', compact('capacity_training'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.preparedness.capacity_training.add-capacity-training');
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
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-early-warning-system')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_capacity_training = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_capacity_training)
            {

                $msg = $add_capacity_training['msg'];
                $status = $add_capacity_training['status'];
                if($status=='success') {
                    return redirect('list-capacity-building-and-training')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-capacity-building-and-training')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-capacity-building-and-training')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $capacity_training = $this->service->getById($edit_data_id);
        return view('admin.pages.preparedness.capacity_training.edit-capacity-training', compact('capacity_training'));
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
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
      
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_capacity_training = $this->service->updateAll($request);
            if ($update_capacity_training) {
                $msg = $update_capacity_training['msg'];
                $status = $update_capacity_training['status'];
                if ($status == 'success') {
                    return redirect('list-capacity-building-and-training')->with(compact('msg', 'status'));
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
            $capacity_training = $this->service->getById($request->show_id);
            return view('admin.pages.preparedness.capacity_training.show-capacity-training', compact('capacity_training'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $capacity_training = $this->service->deleteById($request->delete_id);
            return redirect('list-capacity-building-and-training')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}