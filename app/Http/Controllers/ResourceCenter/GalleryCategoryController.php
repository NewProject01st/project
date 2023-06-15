<?php

namespace App\Http\Controllers\ResourceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuccessStories;
use App\Http\Services\ResourceCenter\GalleryCategoryServices;
use Validator;
class GalleryCategoryController extends Controller
{

   public function __construct()
    {
        $this->service = new GalleryCategoryServices();
    }
    public function index()
    {
        try {
            $success_stories = $this->service->getAll();
            return view('admin.pages.research-center.gallery-category.list-gallery-category', compact('success_stories'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.research-center.gallery-category.add-gallery-category');
    }

    public function store(Request $request) {
        $rules = [
            'english_name' => 'required',
            'marathi_name' => 'required',           
         ];
    $messages = [   
        'english_name'=>'Please  enter english Name.',
        'marathi_name'=>'Please  enter marathi Name.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-gallery-category')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_success_stories = $this->service->addAll($request);
         
            // print_r($add_tenders);
            // die();
            if($add_success_stories)
            {

                $msg = $add_success_stories['msg'];
                $status = $add_success_stories['status'];
                if($status=='success') {
                    return redirect('list-gallery-category')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-gallery-category')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-gallery-category')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $success_stories = $this->service->getById($edit_data_id);
        return view('admin.pages.research-center.gallery-category.edit-gallery-category', compact('success_stories'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_name' => 'required',
        'marathi_name' => 'required',
     ];
    $messages = [   
        'english_name'=>'Please  enter english Name.',
        'marathi_name'=>'Please  enter marathi Name.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_success_stories = $this->service->updateAll($request);
            if ($update_success_stories) {
                $msg = $update_success_stories['msg'];
                $status = $update_success_stories['status'];
                if ($status == 'success') {
                    return redirect('list-gallery-category')->with(compact('msg', 'status'));
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
            $success_stories = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.gallery-category.show-gallery-category', compact('success_stories'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-gallery-category')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $success_stories = $this->service->deleteById($request->delete_id);
            return redirect('list-gallery-category')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}