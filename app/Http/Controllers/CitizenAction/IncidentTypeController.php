<?php

namespace App\Http\Controllers\CitizenAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IncidentType;
use App\Http\Services\CitizenAction\IncidentTypeServices;
use Validator;
class IncidentTypeController extends Controller
{

   public function __construct()
    {
        $this->service = new IncidentTypeServices();
    }
    public function index()
    {
        try {
            $incidenttype_data = $this->service->getAll();
            return view('admin.pages.citizen-action.incident-type.list-incident-type', compact('incidenttype_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.citizen-action.incident-type.add-incident-type');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-incident-type')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_incidenttype_data = $this->service->addAll($request);
            // dd($add_incidenttype_data);
            if($add_incidenttype_data)
            {

                $msg = $add_incidenttype_data['msg'];
                $status = $add_incidenttype_data['status'];
                if($status=='success') {
                    return redirect('list-incident-type')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-incident-type')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-incident-type')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $incidenttype_data = $this->service->getById($edit_data_id);
        return view('admin.pages.citizen-action.incident-type.edit-incident-type', compact('incidenttype_data'));
    }
    public function update(Request $request)
    {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
        ];
        $messages = [   
            'english_title'=>'Please  enter english title.',
            'marathi_title'=>'Please  enter marathi title.',
        ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_incidenttype_data = $this->service->updateAll($request);
                if ($update_incidenttype_data) {
                    $msg = $update_incidenttype_data['msg'];
                    $status = $update_incidenttype_data['status'];
                    if ($status == 'success') {
                        return redirect('list-incident-type')->with(compact('msg', 'status'));
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
            $incidenttype_data = $this->service->getById($request->show_id);
            return view('admin.pages.citizen-action.incident-type.show-incident-type', compact('incidenttype_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $incidenttype = $this->service->deleteById($request->delete_id);
            return redirect('list-incident-type')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}