<?php

namespace App\Http\Controllers\Preparedness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EarlyWarningSystem;
use App\Http\Services\Preparedness\EarlyWarningSystemServices;
use Validator;
class EarlyWarningSystemController extends Controller
{

   public function __construct()
    {
        $this->service = new EarlyWarningSystemServices();
    }
    public function index()
    {
        try {
            $warning_system = $this->service->getAll();
            return view('admin.pages.preparedness.warning_system.list-warning-system', compact('warning_system'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.preparedness.warning_system.add-warning-system');
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
            return redirect('add-early-warning-system')
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
                    return redirect('list-early-warning-system')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-early-warning-system')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-early-warning-system')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $warning_system = $this->service->getById($edit_data_id);
        return view('admin.pages.preparedness.warning_system.edit-warning-system', compact('warning_system'));
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
            $update_warning_system = $this->service->updateAll($request);
            if ($update_warning_system) {
                $msg = $update_warning_system['msg'];
                $status = $update_warning_system['status'];
                if ($status == 'success') {
                    return redirect('list-early-warning-system')->with(compact('msg', 'status'));
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
            $warning_system = $this->service->getById($request->show_id);
            return view('admin.pages.preparedness.warning_system.show-warning-system', compact('warning_system'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $warning_system = $this->service->deleteById($request->delete_id);
            return redirect('list-early-warning-system')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}