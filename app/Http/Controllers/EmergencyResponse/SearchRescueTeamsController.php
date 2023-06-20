<?php

namespace App\Http\Controllers\EmergencyResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\EmergencyResponse\SearchRescueTeamsServices;
use Validator;
class SearchRescueTeamsController extends Controller
{
    public function __construct()
    {
        $this->service = new SearchRescueTeamsServices();
    }
    public function index()
    {
        try {
            $searchrescueteams = $this->service->getAll();
            return view('admin.pages.emergency-response.search-rescue-teams.list-search-rescue-teams', compact('searchrescueteams'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.emergency-response.search-rescue-teams.add-search-rescue-teams');
    }

    public function store(Request $request) {
        // dd($request);
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required'
        
        ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-search-rescue-teams')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_searchrescueteams = $this->service->addAll($request);
            if($add_searchrescueteams)
            {

                $msg = $add_searchrescueteams['msg'];
                $status = $add_searchrescueteams['status'];
                if($status=='success') {
                    return redirect('list-search-rescue-teams')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-search-rescue-teams')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-search-rescue-teams')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $searchrescueteams = $this->service->getById($request->show_id);
            return view('admin.pages.emergency-response.search-rescue-teams.show-search-rescue-teams', compact('searchrescueteams'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $searchrescueteams = $this->service->getById($edit_data_id);
        return view('admin.pages.emergency-response.search-rescue-teams.edit-search-rescue-teams', compact('searchrescueteams'));
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
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_searchrescueteams = $this->service->updateAll($request);
            if ($update_searchrescueteams) {
                $msg = $update_searchrescueteams['msg'];
                $status = $update_searchrescueteams['status'];
                if ($status == 'success') {
                    return redirect('list-search-rescue-teams')->with(compact('msg', 'status'));
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
            $searchrescueteams = $this->service->deleteById($request->delete_id);
            return redirect('list-search-rescue-teams')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    } 
}