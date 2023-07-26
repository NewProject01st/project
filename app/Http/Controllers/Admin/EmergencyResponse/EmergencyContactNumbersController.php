<?php

namespace App\Http\Controllers\Admin\EmergencyResponse;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\EmergencyResponse\EmergencyContactNumbersServices;
use Illuminate\Http\Request;
use Validator;
use Config;
use App\Models\
{
    EmergencyContactNumbers
};

class EmergencyContactNumbersController extends Controller
{
    public function __construct()
    {
        $this->service = new EmergencyContactNumbersServices();
    }
    public function index()
    {
        try {
            $emergencycontactnumbers = $this->service->getAll();
            $data_output_new = $emergencycontactnumbers['data_output'];
            $data_output_array = $emergencycontactnumbers['data_output_array'];

            return view('admin.pages.emergency-response.emergency-contact-numbers.list-emergency-contact-numbers', compact('data_output_new', 'data_output_array'));
            // return view('admin.pages.emergency-response.emergency-contact-numbers.list-emergency-contact-numbers', compact('emergencycontactnumbers'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        // $contacts = AddMoreEmergencyContactNumbers::all();
        // $emergencycontactnumbers = $this->service->addAll($request->$id);
        return view('admin.pages.emergency-response.emergency-contact-numbers.add-emergency-contact-numbers');
        // return view('admin.pages.emergency-response.emergency-contact-numbers.add-emergency-contact-numbers',  ['contacts' => $contacts]);
        // return view('admin.pages.emergency-response.emergency-contact-numbers.add-emergency-contact-numbers', compact('emergencycontactnumbers'));
    }

    public function store(Request $request)
    {
        $rules = [
            'english_title' => 'required|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE").'',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE").'',    
            ];

        // for($i =1;$i<=$request['no_of_text_boxes'];$i++) {
        //     $english_emergency_contact_title = 'english_emergency_contact_title_'.$i;
        //     $marathi_emergency_contact_title = 'marathi_emergency_contact_title_'.$i;
        //     $english_emergency_contact_number = 'english_emergency_contact_number_'.$i;
        //     $marathi_emergency_contact_number = 'marathi_emergency_contact_number_'.$i;
        //     $rules[$english_emergency_contact_title] = 'required';
        //     $rules[$marathi_emergency_contact_title] = 'required';
        //     $rules[$english_emergency_contact_number] = 'required';
        //     $rules[$marathi_emergency_contact_number] = 'required';
        // }
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
            'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE").'KB .',
            'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
            'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
            'marathi_image.image' => 'कृपया प्रतिमा फाइल कायदेशीर असणे आवश्यक आहे.',
            'marathi_image.mimes' => 'कृपया प्रतिमा JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
            'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'KB .',
            'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE").'KB .',
            'marathi_image.dimensions' => 'कृपया प्रतिमा 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
        ];
    

        // for($i =1;$i<=$request['no_of_text_boxes'];$i++) {
        //     $english_emergency_contact_title = 'english_emergency_contact_title_'.$i.'required';
        //     $marathi_emergency_contact_title = 'marathi_emergency_contact_title_'.$i.'required';
        //     $english_emergency_contact_number = 'english_emergency_contact_number_'.$i.'required';
        //     $marathi_emergency_contact_number = 'marathi_emergency_contact_number_'.$i.'required';
        //     $messages[$english_emergency_contact_title] = 'Please enter english title';
        //     $messages[$marathi_emergency_contact_title] = 'Please enter marathi title.';
        //     $messages[$english_emergency_contact_number] = 'Please enter english contact number.';
        //     $messages[$marathi_emergency_contact_number] = 'Please enter marathi contact number.';
        // }

        try {
            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                return redirect('add-emergency-contact-numbers')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $add_emergencycontactnumbers = $this->service->addAll($request);

                if ($add_emergencycontactnumbers) {

                    $msg = $add_emergencycontactnumbers['msg'];
                    $status = $add_emergencycontactnumbers['status'];
                    if ($status == 'success') {
                        return redirect('list-emergency-contact-numbers')->with(compact('msg', 'status'));
                    } else {
                        return redirect('add-emergency-contact-numbers')->withInput()->with(compact('msg', 'status'));
                    }
                }

            }
        } catch (Exception $e) {
            return redirect('add-emergency-contact-numbers')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function addmore()
    {
        return view('admin.pages.emergency-response.emergency-contact-numbers.add-more-data');
    }

    public function storeaddmore(Request $request)
    {
        $rules = [
            'english_emergency_contact_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_emergency_contact_title' =>  'required|max:255',
            'english_emergency_contact_number' =>  'required|regex:/^[0-9]{10}$/',
            'marathi_emergency_contact_number' => 'required|max:25',
        ];
        $messages = [
            'english_emergency_contact_title.required' => 'Please Enter Emergency Title.',
            'marathi_emergency_contact_title.required' => 'कृपया आणीबाणी शीर्षक प्रविष्ट करा.',
            'english_emergency_contact_title.regex' => 'Please  enter text only.',
            'english_emergency_contact_title.max'   => 'Please  enter text length upto 255 character only.',
            'marathi_emergency_contact_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',
            'english_emergency_contact_number.required' => 'Please Enter Emergency Contact.',
            'marathi_emergency_contact_number.required' => 'कृपया आपत्कालीन संपर्क प्रविष्ट करा.',
            'english_emergency_contact_number.regex' => 'Please enter only  number with 10-digit numbers.',
            'marathi_emergency_contact_number.max' => 'कृपया फक्त 10-अंकी संख्या असलेली संख्या प्रविष्ट करा. ',
        ];

        try
        {
            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                return redirect('add-more-emergency-contact-data')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $add_emergencycontactnumbers = $this->service->addAllAddMore($request);
                if ($add_emergencycontactnumbers) {
                    $msg = $add_emergencycontactnumbers['msg'];
                    $status = $add_emergencycontactnumbers['status'];
                    if ($status == 'success') {
                        return redirect('edit-emergency-contact-numbers')->with(compact('msg', 'status'));
                    } else {
                        return redirect('add-more-data')->withInput()->with(compact('msg', 'status'));
                    }
                }
            }
        } catch (Exception $e) {
            return redirect('add-more-data')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function show(Request $request)
    {
        try {
            $emergencycontactnumbers = $this->service->getById($request->show_id);
            return view('admin.pages.emergency-response.emergency-contact-numbers.show-emergency-contact-numbers', compact('emergencycontactnumbers'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        // $emergencyContactNumbers = EmergencyContactNumbers();
        // $edit_data_id = $emergencyContactNumbers->id;
        $edit_data_id = 1;
        
        $add_more_contact_numbers = $this->service->getAddMoreContactNumbers();
        $emergencycontact_data = $this->service->getById($edit_data_id);

        return view('admin.pages.emergency-response.emergency-contact-numbers.edit-emergency-contact-numbers', compact('emergencycontact_data','add_more_contact_numbers'));
    }

    public function update(Request $request)
    {
        $rules = [
            'english_title' => 'required|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
        ];
        if($request->has('english_image')) {
            $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE");
        }
        if($request->has('marathi_image')) {
            $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE");
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
            'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE").'KB .',
            'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
            'marathi_image.required' => 'कृपया प्रतिमा आवश्यक आहे.',
            'marathi_image.image' => 'कृपया प्रतिमा फाइल कायदेशीर असणे आवश्यक आहे.',
            'marathi_image.mimes' => 'कृपया प्रतिमा JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
            'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MAX_SIZE").'KB .',
            'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.EMERGENCY_CONTACT_NUMBER_IMAGE_MIN_SIZE").'KB .',
            'marathi_image.dimensions' => 'कृपया प्रतिमा 1500x500 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
        ];
        try {
            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_emergencycontactnumbers = $this->service->updateAll($request);
                if ($update_emergencycontactnumbers) {
                    $msg = $update_emergencycontactnumbers['msg'];
                    $status = $update_emergencycontactnumbers['status'];
                    if ($status == 'success') {
                        return redirect('list-emergency-contact-numbers')->with(compact('msg', 'status'));
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

    

    
    public function deleteaddmore(Request $request){
        try {
            $emergencycontactnumbers = $this->service->deleteaddmore($request->delete_id);
            if ($emergencycontactnumbers) {
                $msg = $emergencycontactnumbers['msg'];
                $status = $emergencycontactnumbers['status'];
                if ($status == 'success') {
                    return redirect('edit-emergency-contact-numbers')->with(compact('msg', 'status'));
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

    public function destroy(Request $request)
    {
        try {
            $emergencycontactnumbers = $this->service->deleteById($request->delete_id);
            return redirect('list-emergency-contact-numbers')->with('flash_message', 'Deleted!');
        } catch (\Exception $e) {
            return $e;
        }
    }
}