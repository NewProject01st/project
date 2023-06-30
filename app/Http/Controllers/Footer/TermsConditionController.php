<?php

namespace App\Http\Controllers\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermsCondition;
use App\Http\Services\Footer\TermsConditionServices;
use Validator;
class TermsConditionController extends Controller
{

   public function __construct()
    {
        $this->service = new TermsConditionServices();
    }
    public function index()
    {
        try {
            $terms_conditions = $this->service->getAll();
            return view('admin.pages.footer.terms-conditions.list-terms-conditions', compact('terms_conditions'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.footer.terms-conditions.add-terms-conditions');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            
         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-terms-conditions')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_terms_conditions = $this->service->add($request);
            if($add_terms_conditions)
            {
                $msg = $add_terms_conditions['msg'];
                $status = $add_terms_conditions['status'];
                if($status=='success') {
                    return redirect('list-terms-conditions')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-terms-conditions')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-terms-conditions')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $terms_conditions = $this->service->getById($request->show_id);
            return view('admin.pages.footer.terms-conditions.show-terms-conditions', compact('terms_conditions'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $terms_conditions = TermsCondition::find($request->edit_id);

        return view('admin.pages.footer.terms-conditions.edit-terms-conditions', compact('terms_conditions'));
    }

    public function update(Request $request) {
    $rules = [
             'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',  
        
     ];

    $messages = [   
        'english_title.required'=>'Please enter title.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_terms_conditions = $this->service->update($request);
            if ($update_terms_conditions) {
                $msg = $update_terms_conditions['msg'];
                $status = $update_terms_conditions['status'];
                if ($status == 'success') {
                    return redirect('list-terms-conditions')->with(compact('msg', 'status'));
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
// public function updateOne(Request $request)
// {
//     try {
//         $active_id = $request->active_id;
//     $result = $this->service->updateOne($active_id);
//         return redirect('list-important-link')->with('flash_message', 'Updated!');  
//     } catch (\Exception $e) {
//         return $e;
//     }
// }
    public function destroy(Request $request)
    {
        try {
            $terms_conditions = $this->service->deleteById($request->delete_id);
            return redirect('list-terms-conditions')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}