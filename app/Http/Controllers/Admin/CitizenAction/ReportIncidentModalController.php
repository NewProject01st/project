<?php

namespace App\Http\Controllers\Admin\CitizenAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportIncidentModal;
use App\Http\Services\Admin\CitizenAction\ReportIncidentModalServices;
use Validator;
class ReportIncidentModalController extends Controller
{

   public function __construct()
    {
        $this->service = new ReportIncidentModalServices();
    }
    public function index()
    {
        try {
            $modal_data = $this->service->getAll();
            return view('admin.pages.citizen-action.modal-info.list-incident-modal-info', compact('modal_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    // public function add()
    // {
    //     return view('admin.pages.citizen-action.report-crowdsourcing.add-report-crowdsourcing');
    // }

    public function store(Request $request) {
        $rules = [
            'incident' => 'required',
            'location' => 'required',
            'datetime' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
            'media_upload' => 'required',
            
         ];
    $messages = [   
        'incident' => 'required',
        'location' => 'required',
        'datetime' => 'required',
        'mobile_number' => 'required',
        'description' => 'required',
        'media_upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-incident-modal-info')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_modal = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_modal)
            {

                $msg = $add_modal['msg'];
                $status = $add_modal['status'];
                if($status=='success') {
                    return redirect('list-incident-modal-info')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-incident-modal-info')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-incident-modal-info')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
public function destroy(Request $request){
    try {
        $delete = $this->service->deleteById($request->delete_id);
        // dd($delete);
        if ($delete) {
            $msg = $delete['msg'];
            $status = $delete['status'];
            if ($status == 'success') {
                return redirect('list-incident-modal-info')->with(compact('msg', 'status'));
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with(compact('msg', 'status'));
            }
        }
    } catch (\Exception $e) {
        return $e;
    }
} 


}