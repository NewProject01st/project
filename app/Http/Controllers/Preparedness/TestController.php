<?php

namespace App\Http\Controllers\Preparedness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Preparedness\TestServices;
use Validator;
class TestController extends Controller
{
    public function __construct()
    {
        $this->service = new TestServices();
    }
    public function index()
    {
        try {
            $test = $this->service->getAll();
            return view('admin.pages.preparedness.test.list-test', compact('test'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.preparedness.test.add-test');
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
            return redirect('add-test-assessment')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_hazard_vul = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_hazard_vul)
            {

                $msg = $add_hazard_vul['msg'];
                $status = $add_hazard_vul['status'];
                if($status=='success') {
                    return redirect('test')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-test-assessment')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-test-assessment')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $test = $this->service->getById($edit_data_id);
        return view('admin.pages.preparedness.test.edit-test', compact('test'));
    }
    public function update(Request $request)
{
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
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_hazard_vul = $this->service->updateAll($request);
            if ($update_hazard_vul) {
                $msg = $update_hazard_vul['msg'];
                $status = $update_hazard_vul['status'];
                if ($status == 'success') {
                    return redirect('test')->with(compact('msg', 'status'));
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
            $test = $this->service->getById($request->show_id);
            return view('admin.pages.preparedness.test.show-test', compact('test'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $hazard_vul = $this->service->deleteById($request->delete_id);
            return redirect('test')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   
}
