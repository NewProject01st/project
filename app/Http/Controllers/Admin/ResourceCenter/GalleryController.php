<?php

namespace App\Http\Controllers\Admin\ResourceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Services\Admin\ResourceCenter\GalleryServices;
use App\Http\Services\Admin\ResourceCenter\GalleryCategoryServices;
use Validator;
use Config;
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
            'category_id' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE").'',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE").'',
                
            
         ];
    $messages = [   
        'category_id.required' => 'Please select category.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'KB .',
        'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'कृपया छायाचित्र 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
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
        $edit_data_id = base64_decode($request->edit_id);
        $gallery = $this->service->getById($edit_data_id);
        return view('admin.pages.research-center.gallery.edit-gallery', compact('gallery'));
    }
    public function update(Request $request)
{
    $rules = [
        // 'category_id' => 'required',
     ];
     if($request->has('english_image')) {
        $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE");
    }
    if($request->has('marathi_image')) {
        $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE");
    }
    $messages = [   
        // 'category_id.required' => 'Please select category.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.GALLERY_IMAGE_MAX_SIZE").'KB .',
        'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.GALLERY_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'कृपया छायाचित्र 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
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
    public function destroy(Request $request){
        try {
            $delete = $this->service->deleteById($request->delete_id);
            if ($delete) {
                $msg = $delete['msg'];
                $status = $delete['status'];
                if ($status == 'success') {
                    return redirect('list-gallery')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        } catch (\Exception $e) {
            return $e;
        }
    } 

}