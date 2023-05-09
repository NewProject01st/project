<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenders;
use App\Http\Services\TendersServices;
use Validator;
class TendersController extends Controller
{

   public function __construct()
    {
        $this->service = new TendersServices();
    }
    public function index()
    {
        try {
            $tenders = $this->service->getAll();
            return view('admin.pages.tenders.list-tenders', compact('tenders'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.tenders.add-tenders');
    }

    public function store(Request $request) {
        $rules = [
            'tender_date' => 'required',
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'open_date' => 'required',
            'tender_number' => 'required',
            'english_pdf' => 'required',
            'marathi_pdf' => 'required'
            
         ];
    $messages = [   
        'tender_date'=>'required',
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_description'=>'required',
        'marathi_description'=>'required',
        'start_date'=>'required',
        'end_date'=>'required',
        'open_date'=>'required',
        'tender_number'=>'required',
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-tenders')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_tenders = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_tenders)
            {

                $msg = $add_tenders['msg'];
                $status = $add_tenders['status'];
                if($status=='success') {
                    return redirect('list-tenders')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-tenders')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-tenders')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $tenders = $this->service->getById($request->show_id);
            return view('admin.pages.tenders.show-tenders', compact('tenders'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $tenders =  $this->service->getById($request->edit_id);
        return view('admin.pages.tenders.edit-tenders', compact('tenders'));
    }
    public function update(Request $request)
{
    $rules = [
        'tender_date' => 'required',
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'open_date' => 'required',
        'tender_number' => 'required',
        'english_pdf' => 'required',
        'marathi_pdf' => 'required'
        
     ];
    $messages = [   
        'tender_date'=>'required',
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_description'=>'required',
        'marathi_description'=>'required',
        'start_date'=>'required',
        'end_date'=>'required',
        'open_date'=>'required',
        'tender_number'=>'required',
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_tenders = $this->service->updateAll($request);
            if ($update_tenders) {
                $msg = $update_tenders['msg'];
                $status = $update_tenders['status'];
                if ($status == 'success') {
                    return redirect('list-tenders')->with(compact('msg', 'status'));
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
            $tenders = $this->service->deleteById($request->delete_id);
            return redirect('list-tenders')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
