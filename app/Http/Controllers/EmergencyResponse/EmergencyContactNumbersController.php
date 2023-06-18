<?php

namespace App\Http\Controllers\EmergencyResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\EmergencyResponse\EmergencyContactNumbersServices;
use Validator;
use App\Models\ {
    AddMoreEmergencyContactNumbers
};

class EmergencyContactNumbersController extends Controller
{
    public function __construct()
    {
        $this->service = new EmergencyContactNumbersServices();
    }
    public function index(){
        try {
            $emergencycontactnumbers = $this->service->getAll();
            $data_output_new = $emergencycontactnumbers['data_output'];
            $data_output_array = $emergencycontactnumbers['data_output_array'];

            return view('admin.pages.emergency-response.emergency-contact-numbers.list-emergency-contact-numbers',compact('data_output_new', 'data_output_array'));
            // return view('admin.pages.emergency-response.emergency-contact-numbers.list-emergency-contact-numbers', compact('emergencycontactnumbers'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add(){
        // $contacts = AddMoreEmergencyContactNumbers::all();
        // $emergencycontactnumbers = $this->service->addAll($request->$id);
        return view('admin.pages.emergency-response.emergency-contact-numbers.add-emergency-contact-numbers');
        // return view('admin.pages.emergency-response.emergency-contact-numbers.add-emergency-contact-numbers',  ['contacts' => $contacts]);
        // return view('admin.pages.emergency-response.emergency-contact-numbers.add-emergency-contact-numbers', compact('emergencycontactnumbers'));
    }

    public function store(Request $request){
        //dd($request['no_of_text_boxes']);
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required',
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
        'english_title.required' => 'Please  enter english title.',
        'marathi_title.required' => 'Please enter marathi title.',
        'english_description.required' => 'Please  enter english description.',
        'marathi_description.required' => 'Please enter marathi description.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-emergency-contact-numbers')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_emergencycontactnumbers = $this->service->addAll($request);
           
            //   dd($add_emergencycontactnumbers);

            if($add_emergencycontactnumbers)
            {

                $msg = $add_emergencycontactnumbers['msg'];
                $status = $add_emergencycontactnumbers['status'];
                if($status=='success') {
                    return redirect('list-emergency-contact-numbers')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-emergency-contact-numbers')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-emergency-contact-numbers')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
    }

    public function addmore(){
        return view('admin.pages.emergency-response.emergency-contact-numbers.add-more-data');
    }

    public function storeaddmore(Request $request){
        //dd($request['no_of_text_boxes']);
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required',
        ];
    $messages = [   
        'english_title.required' => 'Please  enter english title.',
        'marathi_title.required' => 'Please enter marathi title.',
        'english_description.required' => 'Please  enter english description.',
        'marathi_description.required' => 'Please enter marathi description.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

  

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-more-data')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_emergencycontactnumbers = $this->service->addAllAddMore($request);
           
            // dd($add_emergencycontactnumbers);

            if($add_emergencycontactnumbers)
            {

                $msg = $add_emergencycontactnumbers['msg'];
                $status = $add_emergencycontactnumbers['status'];
                if($status=='success') {
                    return redirect('list-emergency-contact-numbers')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-more-data')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-more-data')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
    }
    
    public function show(Request $request){
        try {
            $emergencycontactnumbers = $this->service->getById($request->show_id);
            return view('admin.pages.emergency-response.emergency-contact-numbers.show-emergency-contact-numbers', compact('emergencycontactnumbers'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request){
        $edit_data_id = $request->edit_id;
        $emergencycontact_data = $this->service->getById($edit_data_id);
        // dd($emergencycontactnumbers);
        return view('admin.pages.emergency-response.emergency-contact-numbers.edit-emergency-contact-numbers', compact('emergencycontact_data'));
    }
    public function update(Request $request){
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',        
     ];

    for($i =1;$i<=$request['no_of_text_boxes'];$i++) {
        $english_emergency_contact_title = 'english_emergency_contact_title_'.$i;
        $marathi_emergency_contact_title = 'marathi_emergency_contact_title_'.$i;
        $english_emergency_contact_number = 'english_emergency_contact_number_'.$i;
        $marathi_emergency_contact_number = 'marathi_emergency_contact_number_'.$i;
        $rules[$english_emergency_contact_title] = 'required';
        $rules[$marathi_emergency_contact_title] = 'required';
        $rules[$english_emergency_contact_number] = 'required';
        $rules[$marathi_emergency_contact_number] = 'required';
    }

    $messages = [   
        'english_title.required' => 'Please enter English title.',
        'marathi_title.required' => 'Please enter Marathi title.',
        'english_description.required' => 'Please  enter english description.',
        'marathi_description.required' => 'Please enter marathi description.',
    ];

    
    for($i =1;$i<=$request['no_of_text_boxes'];$i++) {
        $english_emergency_contact_title = 'english_emergency_contact_title_'.$i.'required';
        $marathi_emergency_contact_title = 'marathi_emergency_contact_title_'.$i.'required';
        $english_emergency_contact_number = 'english_emergency_contact_number_'.$i.'required';
        $marathi_emergency_contact_number = 'marathi_emergency_contact_number_'.$i.'required';
        $messages[$english_emergency_contact_title] = 'Please enter english title';
        $messages[$marathi_emergency_contact_title] = 'Please enter marathi title.';
        $messages[$english_emergency_contact_number] = 'Please enter english contact number.';
        $messages[$marathi_emergency_contact_number] = 'Please enter marathi contact number.';
    }

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
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
    public function destroy(Request $request){
        try {
            $emergencycontactnumbers = $this->service->deleteById($request->delete_id);
            return redirect('list-emergency-contact-numbers')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    } 
}