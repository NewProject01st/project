<?php

namespace App\Http\Controllers\CitizenAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenVolunteerModal;
use App\Http\Services\CitizenAction\VolunteerCitizenModalServices;
use Validator;
class VolunteerCitizenModalController extends Controller
{

   public function __construct()
    {
        $this->service = new VolunteerCitizenModalServices();
    }
    public function index()
    {
        try {
            $modal_data = $this->service->getAll();
            return view('admin.pages.citizen-action.modal-info.list-volunteer-modal-info', compact('modal_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function show(Request $request)
    {
        try {
            $volunteercitizen = $this->service->getById($request->show_id);
            return view('admin.pages.citizen-action.modal-info.show-volunteer-modal-info', compact('volunteercitizen'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request){
        try {
            $delete = $this->service->deleteById($request->delete_id);
            if ($delete) {
                $msg = $delete['msg'];
                $status = $delete['status'];
                if ($status == 'success') {
                    return redirect('list-volunteer-modal-info')->with(compact('msg', 'status'));
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