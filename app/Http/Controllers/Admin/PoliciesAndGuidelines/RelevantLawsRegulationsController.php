<?php

namespace App\Http\Controllers\Admin\PoliciesAndGuidelines;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RelevantLawsRegulation;
use App\Http\Services\Admin\PoliciesAndGuidelines\RelevantLawsRegulationsServices;
use Validator;
use Config;
use Illuminate\Validation\Rule;
class RelevantLawsRegulationsController extends Controller
{

    public function __construct()
        {
            $this->service = new RelevantLawsRegulationsServices();
        }
        public function index()
        {
            try {
                $relevant_laws = $this->service->getAll();
                return view('admin.pages.policies-and-guidelines.relevant-laws.list-relevant-laws', compact('relevant_laws'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function add()
        {
            return view('admin.pages.policies-and-guidelines.relevant-laws.add-relevant-laws');
        }

        public function store(Request $request) {
            $rules = [
                'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'marathi_title' => 'required|max:255',
                'policies_year' => 'required',
                'english_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'',
                'marathi_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'',
             ];
            $messages = [   
                'english_title.required'=>'Please enter title.',
                'english_title.regex' => 'Please  enter text only.',
                'english_title.max'   => 'Please  enter text length upto 255 character only.',
                'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
                'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
                'english_pdf.required' => 'Please upload an PDF file.',
                'english_pdf.file' => 'The file must be of type: file.',
                'english_pdf.mimes' => 'The file must be a PDF.',
                'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
                'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
                'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
                'policies_year.required'=>'Please select year.',
                'marathi_pdf.max' => 'कृपया पीडीएफ आकार जास्त नसावा. '.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'KB .',
                'marathi_pdf.min' => 'कृपया पीडीएफ आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'KB .',
                'english_pdf.max' => 'The pdf size must not exceed '.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'KB .',
                'english_pdf.min' => 'The image size must not be less than '.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'KB .',
            ];

        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('add-relevant-laws-and-regulations')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_relevant_laws = $this->service->addAll($request);
                // print_r($add_tenders);
                // die();
                if($add_relevant_laws)
                {

                    $msg = $add_relevant_laws['msg'];
                    $status = $add_relevant_laws['status'];
                    if($status=='success') {
                        return redirect('list-relevant-laws-and-regulations')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-relevant-laws-and-regulations')->withInput()->with(compact('msg','status'));
                    }
                }

            }
        } catch (Exception $e) {
            return redirect('add-relevant-laws-and-regulations')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $relevant_laws = $this->service->getById($edit_data_id);
        return view('admin.pages.policies-and-guidelines.relevant-laws.edit-relevant-laws', compact('relevant_laws'));
    }

    public function update(Request $request){
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'policies_year' => 'required',
    
        ];
        if($request->has('english_pdf')) {
            $rules['english_pdf'] = 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'';
        }
        if($request->has('marathi_pdf')) {
            $rules['marathi_pdf'] = 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'';
        }
        $messages = [   
            'english_title.required'=>'Please enter title.',
            'english_title.regex' => 'Please  enter text only.',
            'english_title.max'   => 'Please  enter text length upto 255 character only.',
            'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
            'english_pdf.required' => 'Please upload an PDF file.',
            'english_pdf.file' => 'The file must be of type: file.',
            'english_pdf.mimes' => 'The file must be a PDF.',
            'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
            'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
            'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
            'marathi_pdf.max' => 'कृपया पीडीएफ आकार जास्त नसावा. '.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'KB .',
            'marathi_pdf.min' => 'कृपया पीडीएफ आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'KB .',
            'english_pdf.max' => 'The pdf size must not exceed '.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MAX_SIZE").'KB .',
            'english_pdf.min' => 'The image size must not be less than '.Config::get("AllFileValidation.RELEVANT_LAWS_REGULATIONS_PDF_MIN_SIZE").'KB .',
        ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_relevant_laws= $this->service->updateAll($request);
                if ($update_relevant_laws) {
                    $msg = $update_relevant_laws['msg'];
                    $status = $update_relevant_laws['status'];
                    if ($status == 'success') {
                        return redirect('list-relevant-laws-and-regulations')->with(compact('msg', 'status'));
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
            $relevant_laws = $this->service->getById($request->show_id);
            return view('admin.pages.policies-and-guidelines.relevant-laws.show-relevant-laws', compact('relevant_laws'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-relevant-laws-and-regulations')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $relevant_laws = $this->service->deleteById($request->delete_id);
            if ($relevant_laws) {
                $msg = $relevant_laws['msg'];
                $status = $relevant_laws['status'];
                if ($status == 'success') {
                    return redirect('list-relevant-laws-and-regulations')->with(compact('msg', 'status'));
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