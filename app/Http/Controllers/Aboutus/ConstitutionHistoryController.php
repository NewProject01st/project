<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConstitutionHistory;
use App\Http\Services\AboutUs\ConstitutionHistoryServices;
use Validator;
class ConstitutionHistoryController extends Controller
{

   public function __construct()
    {
        $this->service = new ConstitutionHistoryServices();
    }
    public function index()
    {
        try {
            $constitutionhistory = $this->service->getAll();
            return view('admin.pages.aboutus.constitutionHistory.list-constitutionhistory', compact('constitutionhistory'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.aboutus.constitutionHistory.add-constitutionhistory');
    }

    public function store(Request $request) {
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required'
        
        ];
    $messages = [   
        'english_title.required' => 'Please  enter english title.',
        'marathi_title.required' => 'Please enter marathi title.',
        'english_description.required' => 'Please enter english description.',
        'marathi_description.required' => 'Please enter marathi description.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-constitutionhistory')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_constitutionhistory = $this->service->addAll($request);
            if($add_constitutionhistory)
            {

                $msg = $add_constitutionhistory['msg'];
                $status = $add_constitutionhistory['status'];
                if($status=='success') {
                    return redirect('list-constitutionhistory')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-constitutionhistory')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-constitutionhistory')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $constitutionhistory = $this->service->getById($request->show_id);
            return view('admin.pages.aboutus.constitutionHistory.show-constitutionhistory', compact('constitutionhistory'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $constitutionhistory = ConstitutionHistory::find($request->edit_id);
        return view('admin.pages.aboutus.constitutionHistory.edit-constitutionhistory', compact('constitutionhistory'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required'
        
     ];
    $messages = [   
        'english_title.required' => 'Please enter English title.',
        'marathi_title.required' => 'Please enter Marathi title.',
        'english_description.required' => 'Please enter English description.',
        'marathi_description.required' => 'Please enter Marathi description.',
    ];

    try {
        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_constitutionhistory = $this->service->updateAll($request);
            if ($update_constitutionhistory) {
                $msg = $update_constitutionhistory['msg'];
                $status = $update_constitutionhistory['status'];
                if ($status == 'success') {
                    return redirect('list-constitutionhistory')->with(compact('msg', 'status'));
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
            $constitutionhistory = $this->service->deleteById($request->delete_id);
            return redirect('list-constitutionhistory')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
