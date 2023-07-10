<?php

namespace App\Http\Controllers\NewsAndEvents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuccessStories;
use App\Http\Services\NewsAndEvents\SuccessStoriesServices;
use Validator;
use Config;
class SuccessStoriesController extends Controller
{

   public function __construct()
    {
        $this->service = new SuccessStoriesServices();
    }
    public function index()
    {
        try {
            $success_stories = $this->service->getAll();
            return view('admin.pages.news-events.success-stories.list-success-stories', compact('success_stories'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.news-events.success-stories.add-success-stories');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_designation' =>'required|max:255',
            'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MAX_SIZE").'|dimensions:min_width=150,min_height=150,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MIN_SIZE").'',

         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter the description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_designation.required'=>'Please enter designation name.',
        'english_designation.regex' => 'Please  enter text only.',
        'english_designation.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_designation.required'=>'कृपया पदनाम नाव प्रविष्ट करा.',
        'marathi_designation.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत पदनाम ची लांबी प्रविष्ट करा.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 150x150 and 400x400 pixels.',    

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-success-stories')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_success_stories = $this->service->addAll($request);
            if($add_success_stories)
            {

                $msg = $add_success_stories['msg'];
                $status = $add_success_stories['status'];
                if($status=='success') {
                    return redirect('list-success-stories')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-success-stories')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-success-stories')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $success_stories = $this->service->getById($edit_data_id);
        return view('admin.pages.news-events.success-stories.edit-success-stories', compact('success_stories'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_designation' =>'required|max:255',
     ];

     if($request->has('english_image')) {
        $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MAX_SIZE").'|dimensions:min_width=150,min_height=150,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MIN_SIZE");
    }
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter the description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_designation.required'=>'Please enter designation name.',
        'english_designation.regex' => 'Please  enter text only.',
        'english_designation.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_designation.required'=>'कृपया पदनाम नाव प्रविष्ट करा.',
        'marathi_designation.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत पदनाम ची लांबी प्रविष्ट करा.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.SUCCESS_STORIES_IMAGES_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 150x150 and 400x400 pixels.',    

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
                    return redirect('list-success-stories')->with(compact('msg', 'status'));
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
            $success_stories = $this->service->getById($request->show_id);
            return view('admin.pages.news-events.success-stories.show-success-stories', compact('success_stories'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-success-stories')->with('flash_message', 'Updated!');  
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
                    return redirect('list-success-stories')->with(compact('msg', 'status'));
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