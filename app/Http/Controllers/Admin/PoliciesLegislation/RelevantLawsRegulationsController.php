<?php

namespace App\Http\Controllers\Admin\PoliciesLegislation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RelevantLawsRegulation;
use App\Http\Services\Admin\PoliciesLegislation\RelevantLawsRegulationsServices;
use Validator;
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
                return view('admin.pages.policies-legislation.relevant-laws.list-relevant-laws', compact('relevant_laws'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function add()
        {
            return view('admin.pages.policies-legislation.relevant-laws.add-relevant-laws');
        }

        public function store(Request $request) {
            $rules = [
                'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'marathi_title' => 'required|max:255',
                'english_pdf' => 'required|file|mimes:pdf',
                'marathi_pdf' => 'required|file|mimes:pdf',
                'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'policies_year' => 'required',
             ];
            $messages = [   
                'english_title.required'=>'Please enter title.',
                'english_title.regex' => 'Please  enter text only.',
                'english_title.max'   => 'Please  enter text length upto 255 character only.',
                'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
                'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
                'url.required'=>'Please enter url.',
                'url.regex'=>'Please valid url.',
                'english_pdf.required' => 'Please upload an PDF file.',
                'english_pdf.file' => 'The file must be of type: file.',
                'english_pdf.mimes' => 'The file must be a PDF.',
                'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
                'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
                'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
    
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
        $edit_data_id = $request->edit_id;
        $relevant_laws = $this->service->getById($edit_data_id);
        return view('admin.pages.policies-legislation.relevant-laws.edit-relevant-laws', compact('relevant_laws'));
    }

    public function update(Request $request){
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            // 'english_pdf' => 'required|file|mimes:pdf',
            // 'marathi_pdf' => 'required|file|mimes:pdf',
            'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'policies_year' => 'required',
            
        ];
        $messages = [   
            'english_title.required'=>'Please enter title.',
            'english_title.regex' => 'Please  enter text only.',
            'english_title.max'   => 'Please  enter text length upto 255 character only.',
            'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
            'url.required'=>'Please enter url.',
            'url.regex'=>'Please valid url.',
            // 'english_pdf.required' => 'Please upload an PDF file.',
            // 'english_pdf.file' => 'The file must be of type: file.',
            // 'english_pdf.mimes' => 'The file must be a PDF.',
            // 'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
            // 'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
            // 'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
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
            return view('admin.pages.policies-legislation.relevant-laws.show-relevant-laws', compact('relevant_laws'));
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
    public function destroy(Request $request)
    {
        try {
            $relevant_laws = $this->service->deleteById($request->delete_id);
            return redirect('list-relevant-laws-and-regulations')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}