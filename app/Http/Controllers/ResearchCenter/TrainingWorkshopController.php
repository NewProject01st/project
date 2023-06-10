<?php

namespace App\Http\Controllers\ResearchCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingMaterialsWorkshops;
use App\Http\Services\ResearchCenter\TrainingAndWorkshopServices;
use Validator;
class TrainingWorkshopController extends Controller
{

   public function __construct()
    {
        $this->service = new TrainingAndWorkshopServices();
    }
    public function index()
    {
        try {
            $training_workshop = $this->service->getAll();
            return view('admin.pages.research-center.training-workshop.list-training-workshop', compact('training_workshop'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function add()
    {
        return view('admin.pages.research-center.training-workshop.add-training-workshop');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            // 'url' => 'required',
            // 'english_description' => 'required',
            // 'marathi_description' => 'required', 
            'english_pdf' => 'required',
            'marathi_pdf' => 'required',
            
         ];
    $messages = [   
        'english_title' => 'required',
        'marathi_title' => 'required',
        // 'url' => 'required',
        // 'english_description' => 'required',
        // 'marathi_description' => 'required', 
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-training-workshop')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_training = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_training)
            {

                $msg = $add_training['msg'];
                $status = $add_training['status'];
                if($status=='success') {
                    return redirect('list-training-workshop')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-training-workshop')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-training-workshop')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
 
public function edit(Request $request)
{
    $edit_data_id = $request->edit_id;
    $training_workshop = $this->service->getById($edit_data_id);
    return view('admin.pages.research-center.training-workshop.edit-training-workshop', compact('training_workshop'));
}
  
public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
            'marathi_title' => 'required',
            // 'url' => 'required',
            // 'english_description' => 'required',
            // 'marathi_description' => 'required', 
            // 'english_pdf' => 'required',
            // 'marathi_pdf' => 'required',
     ];
    $messages = [   
        'english_title' => 'required',
        'marathi_title' => 'required',
        // 'url' => 'required',
        // 'english_description' => 'required',
        // 'marathi_description' => 'required', 
        // 'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_document = $this->service->updateAll($request);
            if ($update_document) {
                $msg = $update_document['msg'];
                $status = $update_document['status'];
                if ($status == 'success') {
                    return redirect('list-training-workshop')->with(compact('msg', 'status'));
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
            $training_workshop = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.training-workshop.show-training-workshop', compact('training_workshop'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $documents = $this->service->deleteById($request->delete_id);
            return redirect('list-training-workshop')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

   

}