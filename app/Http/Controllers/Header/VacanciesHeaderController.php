<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VacanciesHeader;
use App\Http\Services\Header\VacanciesHeaderServices;
use Validator;
use Illuminate\Validation\Rule;
class VacanciesHeaderController extends Controller
{

   public function __construct()
    {
        $this->service = new VacanciesHeaderServices();
    }
    public function index()
    {
        try {
            $vacancy = $this->service->getAll();
            return view('admin.pages.header.vacancy.list-header-vacancies', compact('vacancy'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function add()
    {
        return view('admin.pages.header.vacancy.add-header-vacancies');
    }
    public function store(Request $request) {
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_pdf' => 'required|file|mimes:pdf',
            'marathi_pdf' => 'required|file|mimes:pdf',
            'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],

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
            return redirect('add-header-vacancies')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_vacancy = $this->service->addAll($request);
            // print_r($add_vacancys);
            // die();
            if($add_vacancy)
            {

                $msg = $add_vacancy['msg'];
                $status = $add_vacancy['status'];
                if($status=='success') {
                    return redirect('list-header-vacancies')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-header-vacancies')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-header-vacancies')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
 
public function edit(Request $request)
{
    $edit_data_id = $request->edit_id;
    $vacancy = $this->service->getById($edit_data_id);
    return view('admin.pages.header.vacancy.edit-header-vacancies', compact('vacancy'));
}
  
public function update(Request $request)
{
    $rules = [
        'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
        'marathi_title' => 'required|max:255',
            // 'english_pdf' => 'required|file|mimes:pdf',
            // 'marathi_pdf' => 'required|file|mimes:pdf',
            'url' => 'required',
     ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',        
        'url.required'=>'Please enter url.',
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
            $update_vacancy = $this->service->updateAll($request);
            if ($update_vacancy) {
                $msg = $update_vacancy['msg'];
                $status = $update_vacancy['status'];
                if ($status == 'success') {
                    return redirect('list-header-vacancies')->with(compact('msg', 'status'));
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
            $vacancy = $this->service->getById($request->show_id);
            return view('admin.pages.header.vacancy.show-header-vacancies', compact('vacancy'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-header-vacancies')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $delete_vacancy = $this->service->deleteById($request->delete_id);
            if ($delete_vacancy) {
                $msg = $delete_vacancy['msg'];
                $status = $delete_vacancy['status'];
                if ($status == 'success') {
                    return redirect('list-header-vacancies')->with(compact('msg', 'status'));
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