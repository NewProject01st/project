<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeTender;
use App\Http\Services\Admin\Home\HomeTenderServices;
use Validator;
class HomeTenderController extends Controller
{

   public function __construct()
    {
        $this->service = new HomeTenderServices();
    }
    public function index()
    {
        try {
            $tender = $this->service->getAll();
            return view('admin.pages.home.home_tender.list-tender', compact('tender'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function add()
    {
        return view('admin.pages.home.home_tender.add-tender');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required', 
            'url' => 'required',
            'tender_date' => 'required',
            'english_pdf' => 'required|file|mimes:pdf',
            'marathi_pdf' => 'required|file|mimes:pdf',
            
         ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'url' => 'required',
        'tender_date' => 'required',
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
            return redirect('add-home-tender')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_tender = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_tender)
            {

                $msg = $add_tender['msg'];
                $status = $add_tender['status'];
                if($status=='success') {
                    return redirect('list-home-tender')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-home-tender')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-home-tender')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
 
public function edit(Request $request)
{
    $edit_data_id = $request->edit_id;
    $tender = $this->service->getById($edit_data_id);
    return view('admin.pages.home.home_tender.edit-tender', compact('tender'));
}
  
public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required', 
            'url' => 'required',
            'tender_date' => 'required',
            'english_pdf' => 'required',
            'marathi_pdf' => 'required',
     ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'url' => 'required',
        'tender_date' => 'required',
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_tender = $this->service->updateAll($request);
            if ($update_tender) {
                $msg = $update_tender['msg'];
                $status = $update_tender['status'];
                if ($status == 'success') {
                    return redirect('list-home-tender')->with(compact('msg', 'status'));
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
            //  dd($request->show_id);
            $tenders = $this->service->getById($request->show_id);
            return view('admin.pages.home.home_tender.show-tender', compact('tenders'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $tender = $this->service->deleteById($request->delete_id);
            return redirect('list-home-tender')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

   

}