<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentInformation;
use App\Http\Services\Home\DepartmentInformationServices;
use Validator;
class DepartmentInformationController extends Controller
{

   public function __construct()
    {
        $this->service = new DepartmentInformationServices();
    }
    public function index()
    {
        try {
            $department_info = $this->service->getAll();
            return view('admin.pages.home.department-information.list-department-information', compact('department_info'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.department-information.add-department-information');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required',
            'marathi_image' => 'required',
            'url' => 'required',
            'date' => 'required',
            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'url'=>'required',
        'date' => 'required',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-department-information')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_department_info = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_department_info)
            {

                $msg = $add_department_info['msg'];
                $status = $add_department_info['status'];
                if($status=='success') {
                    return redirect('list-department-information')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-department-information')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-department-information')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $department_info = $this->service->getById($edit_data_id);
        return view('admin.pages.home.department-information.edit-department-information', compact('department_info'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        // 'english_image' => 'required',
        // 'marathi_image' => 'required',
        'url' => 'required',
        'date' => 'required',
        
     ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
        // 'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'url'=>'required',
        'date' => 'required',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_disaster_news = $this->service->updateAll($request);
            if ($update_disaster_news) {
                $msg = $update_disaster_news['msg'];
                $status = $update_disaster_news['status'];
                if ($status == 'success') {
                    return redirect('list-department-information')->with(compact('msg', 'status'));
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
            $department_info = $this->service->getById($request->show_id);
            return view('admin.pages.home.department-information.show-department-information', compact('department_info'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-department-information')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $department_info = $this->service->deleteById($request->delete_id);
            return redirect('list-department-information')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}