<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementWebPortal;
use App\Http\Services\Admin\Home\DisasterManagementWebPortalServices;
use Validator;
use Config;
class DisasterManagementWebPortalController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterManagementWebPortalServices();
    }
    public function index()
    {
        try {
            $disaster_web_portal = $this->service->getAll();
            return view('admin.pages.home.disaster_webportal.list-disaster-web-portal', compact('disaster_web_portal'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.disaster_webportal.add-disaster-web-portal');
    }

    public function store(Request $request) {
        $rules = [
            'english_name' => 'required',
            'marathi_name' => 'required',
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required',
            'marathi_designation' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=200,min_height=200,max_width=300,max_height=300|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=200,min_height=200,max_width=300,max_height=300|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'',
            
         ];
    $messages = [   
            'english_name.required' => 'Please enter the name.',
            'marathi_name.required' => 'कृपया नाव प्रविष्ट करा.',
            'english_title.required' => 'Please enter the title.',
            'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा.',
            'english_description.required' => 'Please enter the description.',
            'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
            'english_designation.required' => 'Please enter the designation.',
            'marathi_designation.required' => 'कृपया पदनाम प्रविष्ट करा. ',
            'english_image.required' => 'The image is required.',
            'english_image.image' => 'The image must be a valid image file.',
            'english_image.mimes' => 'The image must be in JPEG, PNG, JPG, GIF, or SVG format.',
            'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
            'english_image.dimensions' => 'The image dimensions must be between 200x200 and 300x300 pixels.',
            'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
            'marathi_image.image' => 'कृपया प्रतिमा फाइल कायदेशीर असणे आवश्यक आहे.',
            'marathi_image.mimes' => 'कृपया प्रतिमा JPEG, PNG, JPG, GIF, किंवा SVG स्वरूपात असणे आवश्यक आहे.',
            'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा. '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
            'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
            'marathi_image.dimensions' => 'कृपया प्रतिमा 200x200  आणि 300x300  पिक्सेल दरम्यान असणे आवश्यक आहे.',
        
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-disaster-management-web-portal')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_disaster_web_portal = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_disaster_web_portal)
            {

                $msg = $add_disaster_web_portal['msg'];
                $status = $add_disaster_web_portal['status'];
                if($status=='success') {
                    return redirect('list-disaster-management-web-portal')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-disaster-management-web-portal')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-disaster-management-web-portal')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $disaster_web_portal = $this->service->getById($edit_data_id);
        return view('admin.pages.home.disaster_webportal.edit-disaster-web-portal', compact('disaster_web_portal'));
    }
    public function update(Request $request)
{
    $rules = [
            'english_name' => 'required',
            'marathi_name' => 'required',
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required',
            'marathi_designation' => 'required',
        ];
        if($request->has('english_image')) {
            $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=200,min_height=200,max_width=300,max_height=300|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'';
        }
        if($request->has('marathi_image')) {
            $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=200,min_height=200,max_width=300,max_height=300|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'';
        }
    $messages = [   
        'english_name.required' => 'Please enter the name.',
        'marathi_name.required' => 'कृपया नाव प्रविष्ट करा.',
        'english_title.required' => 'Please enter the title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा.',
        'english_description.required' => 'Please enter the description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_designation.required' => 'Please enter the designation.',
        'marathi_designation.required' => 'कृपया पदनाम प्रविष्ट करा. ',
        'english_image.required' => 'The English image is required.',
        'english_image.image' => 'The English image must be a valid image file.',
        'english_image.mimes' => 'The English image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'english_image.max' => 'The English image size must not exceed '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The English image size must not be less than '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The English image dimensions must be between 200x200 and 300x300 pixels.',
        'marathi_image.required' => 'The Marathi image is required.',
        'marathi_image.image' => 'The Marathi image must be a valid image file.',
        'marathi_image.mimes' => 'The Marathi image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'marathi_image.max' => 'The Marathi image size must not exceed  '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The English image size must not be less than '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'The Marathi image dimensions must be between 200x200 and 300x300 pixels.',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_disaster_web_portal = $this->service->updateAll($request);
            if ($update_disaster_web_portal) {
                $msg = $update_disaster_web_portal['msg'];
                $status = $update_disaster_web_portal['status'];
                if ($status == 'success') {
                    return redirect('list-disaster-management-web-portal')->with(compact('msg', 'status'));
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
            $disaster_web_portal = $this->service->getById($request->show_id);
            return view('admin.pages.home.disaster_webportal.show-disaster-web-portal', compact('disaster_web_portal'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $disaster_web_portal = $this->service->deleteById($request->delete_id);
            return redirect('list-disaster-management-web-portal')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}