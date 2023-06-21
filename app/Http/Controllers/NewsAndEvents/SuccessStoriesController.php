<?php

namespace App\Http\Controllers\NewsAndEvents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuccessStories;
use App\Http\Services\NewsAndEvents\SuccessStoriesServices;
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
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required',
            'marathi_designation' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
           
            
         ];
    $messages = [   
        'english_title.required' => 'Please enter the title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा.',
        'english_description.required' => 'Please enter the description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_designation.required' => 'Please enter the designation.',
        'marathi_designation.required' => 'कृपया पदनाम प्रविष्ट करा. ',
        'english_image.required' => 'The image field is required.',
        'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
       

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
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_designation' => 'required',
        'marathi_designation' => 'required',
        // 'english_image' => 'required',
        // 'marathi_image' => 'required',
       
        
     ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_designation' => 'required',
        'marathi_designation' => 'required',
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
            //  dd($request->show_id);
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
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $success_stories = $this->service->deleteById($request->delete_id);
            return redirect('list-success-stories')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}