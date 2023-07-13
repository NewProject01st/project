<?php

namespace App\Http\Controllers\Admin\CitizenAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenFeedbackSuggestionModal;
use App\Http\Services\Admin\CitizenAction\FeedbackCitizenModalServices;
use Validator;
class FeedbackCitizenModalController extends Controller
{

   public function __construct()
    {
        $this->service = new FeedbackCitizenModalServices();
    }
    public function index()
    {
        try {
            $modal_data = $this->service->getAll();
            return view('admin.pages.citizen-action.modal-info.list-feedback-modal-info', compact('modal_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    // public function add()
    // {
    //     return view('admin.pages.citizen-action.report-crowdsourcing.add-report-crowdsourcing');
    // }

//     public function store(Request $request) {
//         $rules = [
//             'incident' => 'required',
//             'location' => 'required',
//             'datetime' => 'required',
//             'mobile_number' => 'required',
//             'description' => 'required',
//             'media_upload' => 'required',
            
//          ];
//     $messages = [   
//         'incident' => 'required',
//         'location' => 'required',
//         'datetime' => 'required',
//         'mobile_number' => 'required',
//         'description' => 'required',
//         'media_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

//     ];

//     try {
//         $validation = Validator::make($request->all(),$rules,$messages);
//         if($validation->fails() )
//         {
//             return redirect('add-modal-info')
//                 ->withInput()
//                 ->withErrors($validation);
//         }
//         else
//         {
//             $add_modal = $this->service->addAll($request);
//             // print_r($add_tenders);
//             // die();
//             if($add_modal)
//             {

//                 $msg = $add_modal['msg'];
//                 $status = $add_modal['status'];
//                 if($status=='success') {
//                     return redirect('list-modal-info')->with(compact('msg','status'));
//                 }
//                 else {
//                     return redirect('add-modal-info')->withInput()->with(compact('msg','status'));
//                 }
//             }

//         }
//     } catch (Exception $e) {
//         return redirect('add-modal-info')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
//     }
// }
    
//     public function edit(Request $request)
//     {
//         $edit_data_id = $request->edit_id;
//         $crowdsourcing = $this->service->getById($edit_data_id);
//         return view('admin.pages.citizen-action.report-crowdsourcing.edit-report-crowdsourcing', compact('crowdsourcing'));
//     }
//     public function update(Request $request)
// {
//     $rules = [
//         'english_title' => 'required',
//         'marathi_title' => 'required',
//         'english_description' => 'required',
//         'marathi_description' => 'required',
        
        
//      ];
//     $messages = [   
//         'english_title'=>'Please  enter english title.',
//         'marathi_title'=>'Please  enter marathi title.',
//         'english_description' => 'required',
//         'marathi_description' => 'required',
       
//     ];

//     try {
//         $validation = Validator::make($request->all(),$rules, $messages);
//         if ($validation->fails()) {
//             return redirect()->back()
//                 ->withInput()
//                 ->withErrors($validation);
//         } else {
//             $update_crowdsourcing = $this->service->updateAll($request);
//             if ($update_crowdsourcing) {
//                 $msg = $update_crowdsourcing['msg'];
//                 $status = $update_crowdsourcing['status'];
//                 if ($status == 'success') {
//                     return redirect('list-report-crowdsourcing')->with(compact('msg', 'status'));
//                 } else {
//                     return redirect()->back()
//                         ->withInput()
//                         ->with(compact('msg', 'status'));
//                 }
//             }
//         }
//     } catch (Exception $e) {
//         return redirect()->back()
//             ->withInput()
//             ->with(['msg' => $e->getMessage(), 'status' => 'error']);
//     }
//  }
// public function show(Request $request)
//     {
//         try {

//             $crowdsourcing = $this->service->getById($request->show_id);
//             return view('admin.pages.citizen-action.report-crowdsourcing.show-report-crowdsourcing', compact('crowdsourcing'));
//         } catch (\Exception $e) {
//             return $e;
//         }
//     }

//     public function destroy(Request $request)
//     {
//         try {

//             $crowdsourcing = $this->service->deleteById($request->delete_id);
//             return redirect('list-report-crowdsourcing')->with('flash_message', 'Deleted!');  
//         } catch (\Exception $e) {
//             return $e;
//         }
//     }   

}