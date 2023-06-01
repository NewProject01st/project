<?php

namespace App\Http\Controllers\ResearchCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentspublications;
use App\Http\Services\ResearchCenter\DocumentsPublicationsServices;
use Validator;
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
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required', 
            'english_pdf' => 'required',
            'marathi_pdf' => 'required',
            
         ];
    $messages = [   
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required', 
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required', 
            'english_pdf' => 'required',
            'marathi_pdf' => 'required',
     ];
    $messages = [   
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required', 
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
            //  dd($request->show_id);
            $documents_publications = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.documents.show-document-publications', compact('documents_publications'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $documents = $this->service->deleteById($request->delete_id);
            return redirect('list-document-publications')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

   

}