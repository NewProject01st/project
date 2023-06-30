<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StateDisasterManagementAuthority;
use App\Http\Services\AboutUs\StateDisasterManagementAuthorityServices;
use Validator;
use Config;
class StateDisasterManagementAuthorityController extends Controller
{

   public function __construct()
    {
        $this->service = new StateDisasterManagementAuthorityServices();
    }
    public function index()
    {
        try {
            $statedisastermanagementauthority = $this->service->getAll();
            return view('admin.pages.aboutus.state-disaster-management-authority.list-statedisastermanagementauthority', compact('statedisastermanagementauthority'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.aboutus.state-disaster-management-authority.add-statedisastermanagementauthority');
    }

    public function store(Request $request) {
        // dd($request);
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE").'',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE").'',
            
         ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा.',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
        'marathi_image.image' => 'कृपया प्रतिमा फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image.mimes' => 'कृपया प्रतिमा JPEG, PNG, JPG, GIF, किंवा SVG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'KB .',
        'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'कृपया प्रतिमा 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-statedisastermanagementauthority')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_statedisastermanagementauthority = $this->service->addAll($request);
            if($add_statedisastermanagementauthority)
            {

                $msg = $add_statedisastermanagementauthority['msg'];
                $status = $add_statedisastermanagementauthority['status'];
                if($status=='success') {
                    return redirect('list-statedisastermanagementauthority')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-statedisastermanagementauthority')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-statedisastermanagementauthority')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $statedisastermanagementauthority = $this->service->getById($request->show_id);
            return view('admin.pages.aboutus.state-disaster-management-authority.show-statedisastermanagementauthority', compact('statedisastermanagementauthority'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $statedisastermanagementauthority = $this->service->getById($edit_data_id);
        return view('admin.pages.aboutus.state-disaster-management-authority.edit-statedisastermanagementauthority', compact('statedisastermanagementauthority'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required', 
     ];
     if($request->has('english_image')) {
        $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE");
    }
    if($request->has('marathi_image')) {
        $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE");
    }

    $messages = [   
            'english_title.required' => 'Please enter title.',
            'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
            'english_description.required' => 'Please enter description.',
            'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
            'english_image.required' => 'The image is required.',
            'english_image.image' => 'The image must be a valid image file.',
            'english_image.mimes' => 'The image must be in JPEG, PNG, JPG, GIF, or SVG format.',
            'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE").'KB .',
            'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
            'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
            'marathi_image.image' => 'कृपया प्रतिमा फाइल कायदेशीर असणे आवश्यक आहे.',
            'marathi_image.mimes' => 'कृपया प्रतिमा JPEG, PNG, JPG, GIF, किंवा SVG स्वरूपात असणे आवश्यक आहे.',
            'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MAX_SIZE").'KB .',
            'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_AUTHORITY_IMAGE_MIN_SIZE").'KB .',
            'marathi_image.dimensions' => 'कृपया प्रतिमा 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
        ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_statedisastermanagementauthority = $this->service->updateAll($request);
            if ($update_statedisastermanagementauthority) {
                $msg = $update_statedisastermanagementauthority['msg'];
                $status = $update_statedisastermanagementauthority['status'];
                if ($status == 'success') {
                    return redirect('list-statedisastermanagementauthority')->with(compact('msg', 'status'));
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
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $statedisastermanagementauthority = $this->service->deleteById($request->delete_id);
            return redirect('list-statedisastermanagementauthority')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}