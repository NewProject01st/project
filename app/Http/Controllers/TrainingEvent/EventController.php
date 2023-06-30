<?php

namespace App\Http\Controllers\TrainingEvent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Services\TrainingEvent\EventServices;
use Validator;
class EventController extends Controller
{

   public function __construct()
    {
        $this->service = new EventServices();
    }
    public function index()
    {
        try {
            $event = $this->service->getAll();
            return view('admin.pages.training-event.event.list-event', compact('event'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.training-event.event.add-event');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required',
            'end_date' => 'required',
            
         ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image.required' => 'The image field is required.',
        'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
        'start_date.required' => 'Please select Start Date.',
        'end_date.required' => 'Please select End Date',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('list-event')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_event = $this->service->addAll($request);
            if($add_event)
            {

                $msg = $add_event['msg'];
                $status = $add_event['status'];
                if($status=='success') {
                    return redirect('list-event')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-event')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-event')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $event = $this->service->getById($edit_data_id);
        return view('admin.pages.training-event.event.edit-event', compact('event'));
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
        'start_date' => 'required',
        'end_date' => 'required',
        
     ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        // 'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'start_date.required' => 'Please select Start Date.',
        'end_date.required' => 'Please select End Date',
      
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_event = $this->service->updateAll($request);
            if ($update_event) {
                $msg = $update_event['msg'];
                $status = $update_event['status'];
                if ($status == 'success') {
                    return redirect('list-event')->with(compact('msg', 'status'));
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
            $event = $this->service->getById($request->show_id);
            return view('admin.pages.training-event.event.show-event', compact('event'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $event = $this->service->deleteById($request->delete_id);
            return redirect('list-event')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}