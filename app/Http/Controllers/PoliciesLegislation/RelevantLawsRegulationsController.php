<?php

namespace App\Http\Controllers\PoliciesLegislation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RelevantLawsRegulation;
use App\Http\Services\PoliciesLegislation\RelevantLawsRegulationsServices;
use Validator;
class RelevantLawsRegulationsController extends Controller
{

   public function __construct()
    {
        $this->service = new RelevantLawsRegulationsServices();
    }
    public function index()
    {
        try {
            $relevant_laws = $this->service->getAll();
            return view('admin.pages.policies-legislation.relevant-laws.list-relevant-laws', compact('relevant_laws'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.policies-legislation.relevant-laws.add-relevant-laws');
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
            return redirect('add-relevant-laws-and-regulations')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_relevant_laws = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_relevant_laws)
            {

                $msg = $add_relevant_laws['msg'];
                $status = $add_relevant_laws['status'];
                if($status=='success') {
                    return redirect('list-relevant-laws-and-regulations')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-relevant-laws-and-regulations')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-relevant-laws-and-regulations')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $relevant_laws = $this->service->getById($edit_data_id);
        return view('admin.pages.policies-legislation.relevant-laws.edit-relevant-laws', compact('relevant_laws'));
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
            $update_relevant_laws= $this->service->updateAll($request);
            if ($update_relevant_laws) {
                $msg = $update_relevant_laws['msg'];
                $status = $update_relevant_laws['status'];
                if ($status == 'success') {
                    return redirect('list-relevant-laws-and-regulations')->with(compact('msg', 'status'));
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
            $relevant_laws = $this->service->getById($request->show_id);
            return view('admin.pages.policies-legislation.relevant-laws.show-relevant-laws', compact('relevant_laws'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $relevant_laws = $this->service->deleteById($request->delete_id);
            return redirect('list-relevant-laws-and-regulations')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}