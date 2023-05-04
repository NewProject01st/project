<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Http\Services\ProjectsServices;
use Validator;
class ProjectsController extends Controller
{

   public function __construct()
    {
        $this->service = new ProjectsServices();
    }
    public function index()
    {
        try {
            $projects = $this->service->getAll();
            return view('admin.pages.projects.list-projects', compact('projects'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.projects.add-projects');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_link' => 'required',
            'marathi_link' => 'required',
            'english_pdf' => 'required',
            'marathi_pdf' => 'required',
            'status' => 'required'
            
         ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_description'=>'required',
        'marathi_description'=>'required',
        'english_link'=>'required',
        'marathi_link'=>'required',
        'status'=>'required',
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-projects')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_projects = $this->service->addAll($request);
            // print_r($add_projects);
            // die();
            if($add_projects)
            {

                $msg = $add_projects['msg'];
                $status = $add_projects['status'];
                if($status=='success') {
                    return redirect('list-projects')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-projects')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-projects')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $projects = $this->service->getById($request->show_id);
            return view('admin.pages.projects.show-projects', compact('projects'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $projects = Projects::find($request->edit_id);
        return view('admin.pages.projects.edit-projects', compact('projects'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_link' => 'required',
        'marathi_link' => 'required',
        'english_pdf' => 'required',
        'marathi_pdf' => 'required',
        'status' => 'required'
        
     ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_description'=>'required',
        'marathi_description'=>'required',
        'english_link'=>'required',
        'marathi_link'=>'required',
        'status'=>'required',
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
            $update_projects = $this->service->updateAll($request);
            if ($update_projects) {
                $msg = $update_projects['msg'];
                $status = $update_projects['status'];
                if ($status == 'success') {
                    return redirect('list-projects')->with(compact('msg', 'status'));
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
            $projects = $this->service->deleteById($request->delete_id);
            return redirect('list-projects')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
