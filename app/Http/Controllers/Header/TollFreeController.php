<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tollfree;
use App\Http\Services\Header\TollFreeServices;
use Validator;
class TollFreeController extends Controller
{

   public function __construct()
    {
        $this->service = new TollFreeServices();
    }
    public function index()
    {
        try {
            $tollfree_no = $this->service->getAll();
            return view('admin.pages.header.tollfree-number.list-tollfree-number', compact('tollfree_no'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.header.tollfree-number.add-tollfree-number');
    }

    public function store(Request $request) { 
        $rules = [       
            'english_tollfree_no' => 'required|regex: /^[\d\s+-]+$/',
            'marathi_tollfree_no' => 'required|regex: /^[\d\s+-]+$/',    
         ];
    $messages = [   
               
        'english_tollfree_no.required' => 'Please enter toll free number',
        'english_tollfree_no.regex' => 'Please enter valid toll free number.',
        'marathi_tollfree_no.required' => 'कृपया टोल फ्री नंबर टाका',         
        'marathi_tollfree_no.regex' => 'कृपया वैध टोल फ्री क्रमांक प्रविष्ट करा.',

        
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-tollfree-number')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_tollfree_no = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_tollfree_no)
            {

                $msg = $add_tollfree_no['msg'];
                $status = $add_tollfree_no['status'];
                if($status=='success') {
                    return redirect('list-tollfree-number')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-tollfree-number')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-tollfree-number')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $tollfree_no = $this->service->getById($edit_data_id);
        return view('admin.pages.header.tollfree-number.edit-tollfree-number', compact('tollfree_no'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_tollfree_no' => 'required|regex: /^[\d\s+-]+$/',
        'marathi_tollfree_no' => 'required|regex: /^[\d\s+-]+$/',    
     ];
    $messages = [   
             
        'english_tollfree_no.required' => 'Please enter toll free number',
        'english_tollfree_no.regex' => 'Please enter valid toll free number.',
        'marathi_tollfree_no.required' => 'कृपया टोल फ्री नंबर टाका',         
        'marathi_tollfree_no.regex' => 'कृपया वैध टोल फ्री क्रमांक प्रविष्ट करा.',
  
      
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_tollfree_no = $this->service->updateAll($request);
            if ($update_tollfree_no) {
                $msg = $update_tollfree_no['msg'];
                $status = $update_tollfree_no['status'];
                if ($status == 'success') {
                    return redirect('list-tollfree-number')->with(compact('msg', 'status'));
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
            $tollfree_number = $this->service->getById($request->show_id);
            return view('admin.pages.header.tollfree-number.show-tollfree-number', compact('tollfree_number'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $tollfree_number = $this->service->deleteById($request->delete_id);
            return redirect('list-tollfree-number')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}