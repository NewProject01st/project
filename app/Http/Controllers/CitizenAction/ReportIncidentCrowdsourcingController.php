<?php

namespace App\Http\Controllers\CitizenAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportIncidentCrowdsourcing;
use App\Http\Services\CitizenAction\ReportIncidentCrowdsourcingServices;
use Validator;
class ReportIncidentCrowdsourcingController extends Controller
{

   public function __construct()
    {
        $this->service = new ReportIncidentCrowdsourcingServices();
    }
    public function index()
    {
        try {
            $crowdsourcing = $this->service->getAll();
            return view('admin.pages.citizen-action.report-crowdsourcing.list-report-crowdsourcing', compact('crowdsourcing'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.citizen-action.report-crowdsourcing.add-report-crowdsourcing');
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
            return redirect('add-report-crowdsourcing')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_crowdsourcing = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_crowdsourcing)
            {

                $msg = $add_crowdsourcing['msg'];
                $status = $add_crowdsourcing['status'];
                if($status=='success') {
                    return redirect('list-report-crowdsourcing')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-report-crowdsourcing')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-report-crowdsourcing')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $capacity_training = $this->service->getById($edit_data_id);
        return view('admin.pages.citizen-action.report-crowdsourcing.edit-report-crowdsourcing', compact('capacity_training'));
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
            $update_crowdsourcing = $this->service->updateAll($request);
            if ($update_crowdsourcing) {
                $msg = $update_crowdsourcing['msg'];
                $status = $update_crowdsourcing['status'];
                if ($status == 'success') {
                    return redirect('list-report-crowdsourcing')->with(compact('msg', 'status'));
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
            $crowdsourcing = $this->service->getById($request->show_id);
            return view('admin.pages.citizen-action.report-crowdsourcing.show-report-crowdsourcing', compact('crowdsourcing'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $crowdsourcing = $this->service->deleteById($request->delete_id);
            return redirect('list-report-crowdsourcing')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}