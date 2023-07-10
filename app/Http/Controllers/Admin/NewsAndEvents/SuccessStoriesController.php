<?php

namespace App\Http\Controllers\Admin\NewsAndEvents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuccessStories;
use App\Http\Services\Admin\NewsAndEvents\SuccessStoriesServices;
use Validator;
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
            'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
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
        'english_image.required' => 'The image field is required.',
       

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
        // 'english_image' => 'required',
      
       
        
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
        // 'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
       
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