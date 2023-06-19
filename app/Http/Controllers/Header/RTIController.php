<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RTI;
use App\Http\Services\Header\RTIServices;
use Validator;
class RTIController extends Controller
{

   public function __construct()
    {
        $this->service = new RTIServices();
    }
    public function index()
    {
        try {
            $rti = $this->service->getAll();
            return view('admin.pages.header.rti.list-header-rti', compact('rti'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.header.rti.add-header-rti');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'policies_year' => 'required',
            'english_pdf' => 'required|file|mimes:pdf',
            'marathi_pdf' => 'required|file|mimes:pdf',
            'url' => 'required',
            
         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'url.required'=>'Please enter url.',
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
            return redirect('add-header-rti')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_vacancy = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_vacancy)
            {

                $msg = $add_vacancy['msg'];
                $status = $add_vacancy['status'];
                if($status=='success') {
                    return redirect('list-header-rti')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-header-rti')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-header-rti')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
 
public function edit(Request $request)
{
    $edit_data_id = $request->edit_id;
    $rti = $this->service->getById($edit_data_id);
    return view('admin.pages.header.rti.edit-header-rti', compact('rti'));
}
  
public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'policies_year' => 'required',
        // 'english_pdf' => 'required|file|mimes:pdf',
        // 'marathi_pdf' => 'required|file|mimes:pdf',
        'url' => 'required',
     ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
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
            $update_tender = $this->service->updateAll($request);
            if ($update_tender) {
                $msg = $update_tender['msg'];
                $status = $update_tender['status'];
                if ($status == 'success') {
                    return redirect('list-header-rti')->with(compact('msg', 'status'));
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
            $rti = $this->service->getById($request->show_id);
            return view('admin.pages.header.rti.show-header-rti', compact('rti'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-header-rti')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $rti = $this->service->deleteById($request->delete_id);
            return redirect('list-header-rti')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

   

}