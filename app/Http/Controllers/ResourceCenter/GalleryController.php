<?php

namespace App\Http\Controllers\ResourceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Services\ResourceCenter\GalleryServices;
use App\Http\Services\ResourceCenter\GalleryCategoryServices;
use Validator;
class GalleryController extends Controller
{

   public function __construct()
    {
        $this->service = new GalleryServices();
        $this->servicecategory = new GalleryCategoryServices();
    }
    public function index()
    {
        try {
            $gallery = $this->service->getAll();
            return view('admin.pages.research-center.gallery.list-gallery', compact('gallery'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        $category_gallery = $this->servicecategory->getAll();
        return view('admin.pages.research-center.gallery.add-gallery', compact('category_gallery'));

        return view('admin.pages.research-center.gallery.add-gallery');
    }

    public function store(Request $request) {
        $rules = [
            'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
            
         ];
    $messages = [   
        'english_image.required' => 'The image field is required.',
        'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
       

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-gallery')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_gallery = $this->service->addAll($request);
            if($add_gallery)
            {

                $msg = $add_gallery['msg'];
                $status = $add_gallery['status'];
                if($status=='success') {
                    return redirect('list-gallery')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-gallery')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-gallery')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $gallery = $this->service->getById($edit_data_id);
        return view('admin.pages.research-center.gallery.edit-gallery', compact('gallery'));
    }
    public function update(Request $request)
{
    $rules = [
        // 'english_image' => 'required',
        // 'marathi_image' => 'required',
       
        
     ];
    $messages = [   
        // 'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_gallery = $this->service->updateAll($request);
            if ($update_gallery) {
                $msg = $update_gallery['msg'];
                $status = $update_gallery['status'];
                if ($status == 'success') {
                    return redirect('list-gallery')->with(compact('msg', 'status'));
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
            $gallery = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.gallery.show-gallery', compact('gallery'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-gallery')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request)
    {
        try {
            $gallery = $this->service->deleteById($request->delete_id);
            return redirect('list-gallery')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}