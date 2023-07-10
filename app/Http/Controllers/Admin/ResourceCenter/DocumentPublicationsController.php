<?php

namespace App\Http\Controllers\Admin\ResourceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentspublications;
use App\Http\Services\Admin\ResourceCenter\DocumentsPublicationsServices;
use Validator;
use Config;
class DocumentPublicationsController extends Controller
{

   public function __construct()
    {
        $this->service = new DocumentsPublicationsServices();
    }
    public function index()
    {
        try {
            $documents_publications = $this->service->getAll();
            return view('admin.pages.research-center.documents.list-document-publications', compact('documents_publications'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function add()
    {
        return view('admin.pages.research-center.documents.add-document-publications');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required', 
            'english_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'',
            'marathi_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'',
            
         ];
         
    $messages = [   
        'english_title.required'=>'Please enter title.',
        // 'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_pdf.required' => 'Please upload an PDF file.',
        'english_pdf.file' => 'The file must be of type: file.',
        'english_pdf.mimes' => 'The file must be a PDF.',
        'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
        'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
        'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
        'marathi_pdf.max' => 'कृपया पीडीएफ आकार जास्त नसावा. '.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'KB .',
        'marathi_pdf.min' => 'कृपया पीडीएफ आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'KB .',
        'english_pdf.max' => 'The pdf size must not exceed '.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'KB .',
        'english_pdf.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'KB .',
    
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-home-tender')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_documents = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_documents)
            {

                $msg = $add_documents['msg'];
                $status = $add_documents['status'];
                if($status=='success') {
                    return redirect('list-document-publications')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-document-publications')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-document-publications')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
 
public function edit(Request $request)
{
    $edit_data_id = $request->edit_id;
    $documents_publications = $this->service->getById($edit_data_id);
    return view('admin.pages.research-center.documents.edit-document-publications', compact('documents_publications'));
}
  
public function update(Request $request)
{
    $rules = [
        'english_title' => 'required|max:255',
        'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required', 
     ];
     if($request->has('english_pdf')) {
        $rules['english_pdf'] = 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'';
    }
    if($request->has('marathi_pdf')) {
        $rules['marathi_pdf'] = 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'';
    }
    $messages = [   
            'english_title.required'=>'Please enter title.',
            // 'english_title.regex' => 'Please  enter text only.',
            'english_title.max'   => 'Please  enter text length upto 255 character only.',
            'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',
            'english_description.required' => 'Please enter description.',
            'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
            'english_pdf.required' => 'Please upload an PDF file.',
            'english_pdf.file' => 'The file must be of type: file.',
            'english_pdf.mimes' => 'The file must be a PDF.',
            'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
            'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
            'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
            'marathi_pdf.max' => 'कृपया पीडीएफ आकार जास्त नसावा. '.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'KB .',
            'marathi_pdf.min' => 'कृपया पीडीएफ आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'KB .',
            'english_pdf.max' => 'The pdf size must not exceed '.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MAX_SIZE").'KB .',
            'english_pdf.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DOCUMENT_PUBLICATION_PDF_MIN_SIZE").'KB .',
        
        ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_document = $this->service->updateAll($request);
            if ($update_document) {
                $msg = $update_document['msg'];
                $status = $update_document['status'];
                if ($status == 'success') {
                    return redirect('list-document-publications')->with(compact('msg', 'status'));
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
            $documents_publications = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.documents.show-document-publications', compact('documents_publications'));
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
                    return redirect('list-document-publications')->with(compact('msg', 'status'));
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