<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubHeaderInfo;
use App\Http\Services\Header\SubHeaderInfoServices;
use Validator;
class SubHeaderInfoController extends Controller
{

   public function __construct()
    {
        $this->service = new SubHeaderInfoServices();
    }
    public function index()
    {
        try {
            $subheader_info = $this->service->getAll();
            return view('admin.pages.header.sub-header.list-subheader-info', compact('subheader_info'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.header.sub-header.add-subheader-info');
    }

    public function store(Request $request) {
        $rules = [
           
            'english_logo' => 'required',
            'marathi_logo' => 'required',             
            'english_tollfree_title' => 'required',
            'marathi_tollfree_title' => 'required',           
            'english_tollfree_no' => 'required',
            'marathi_tollfree_no' => 'required',         
            'english_city_title' => 'required',
            'marathi_city_title' => 'required',
            'english_city' => 'required',
            'marathi_city' => 'required',

            
            
         ];
    $messages = [   
        'english_tollfree_title' => 'required',
        'marathi_tollfree_title' => 'required',           
        'english_tollfree_no' => 'required',
        'marathi_tollfree_no' => 'required',         
        'english_city_title' => 'required',
        'marathi_city_title' => 'required',
        'english_city' => 'required',
        'marathi_city' => 'required',
        'english_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-social-icon')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_subheader_info = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_subheader_info)
            {

                $msg = $add_subheader_info['msg'];
                $status = $add_subheader_info['status'];
                if($status=='success') {
                    return redirect('list-sub-header-info')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-sub-header-info')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-sub-header-info')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $subheader_info = $this->service->getById($edit_data_id);
        return view('admin.pages.header.sub-header.edit-subheader-info', compact('subheader_info'));
    }
    public function update(Request $request)
{
    $rules = [
       
            'english_logo' => 'required',
            'marathi_logo' => 'required',             
            'english_tollfree_title' => 'required',
            'marathi_tollfree_title' => 'required',           
            'english_tollfree_no' => 'required',
            'marathi_tollfree_no' => 'required',         
            'english_city_title' => 'required',
            'marathi_city_title' => 'required',
            'english_city' => 'required',
            'marathi_city' => 'required',
        
     ];
    $messages = [   
        'english_toll_free_title' => 'required',
        'marathi_toll_free_title' => 'required',           
        'english_toll_free_no' => 'required',
        'marathi_toll_free_no' => 'required',         
        'english_city_title' => 'required',
        'marathi_city_title' => 'required',
        'english_city' => 'required',
        'marathi_city' => 'required',
        'english_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

      
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_sub_info = $this->service->updateAll($request);
            if ($update_sub_info) {
                $msg = $update_sub_info['msg'];
                $status = $update_sub_info['status'];
                if ($status == 'success') {
                    return redirect('list-sub-header-info')->with(compact('msg', 'status'));
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
            $subheader_info = $this->service->getById($request->show_id);
            return view('admin.pages.header.sub-header.show-subheader-info', compact('subheader_info'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $subheader_info = $this->service->deleteById($request->delete_id);
            return redirect('list-sub-header-info')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}