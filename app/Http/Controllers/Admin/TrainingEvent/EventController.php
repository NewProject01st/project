<?php

namespace App\Http\Controllers\Admin\TrainingEvent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Services\Admin\TrainingEvent\EventServices;
use Validator;
use Config;
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
            'english_title' => 'required|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE").'',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE").'',
            'start_date' => 'required',
            'end_date' => 'required',
            
         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        // 'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image.required' => 'The image field is required.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'KB .',
        'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'कृपया छायाचित्र 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
        'start_date.required' => 'Please select Start Date.',
        'end_date.required' => 'Please select End Date',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-event')
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
        $edit_data_id = base64_decode($request->edit_id);
        $event = $this->service->getById($edit_data_id);
        return view('admin.pages.training-event.event.edit-event', compact('event'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required|max:255',
        'marathi_title' => 'required|max:255',
        'english_description' => 'required',
        'marathi_description' => 'required',
        // 'english_image' => 'required',
        // 'marathi_image' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        
     ];
     if($request->has('english_image')) {
        $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE");
    }
    if($request->has('marathi_image')) {
        $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE");
    }
    $messages = [   
        'english_title.required'=>'Please enter title.',
        // 'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MAX_SIZE").'KB .',
        'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.TRAINING_EVENT_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'कृपया छायाचित्र 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
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
    public function updateOne(Request $request){
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-event')->with('flash_message', 'Updated!');  
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
                    return redirect('list-event')->with(compact('msg', 'status'));
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