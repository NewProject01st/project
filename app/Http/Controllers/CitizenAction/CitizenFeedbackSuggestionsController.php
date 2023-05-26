<?php

namespace App\Http\Controllers\CitizenAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenFeedbackSuggestion;
use App\Http\Services\CitizenAction\CitizenFeedbackSuggestionServices;
use Validator;
class CitizenFeedbackSuggestionsController extends Controller
{

   public function __construct()
    {
        $this->service = new CitizenFeedbackSuggestionServices();
    }
    public function index()
    {
        try {
            $feedback_data = $this->service->getAll();
            return view('admin.pages.citizen-action.feedback-suggestion.list-feedback-suggestion', compact('feedback_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.citizen-action.feedback-suggestion.add-feedback-suggestion');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required',
            'marathi_image' => 'required',
            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-citizen-feedback-and-suggestion')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_feedback_data = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_feedback_data)
            {

                $msg = $add_feedback_data['msg'];
                $status = $add_feedback_data['status'];
                if($status=='success') {
                    return redirect('list-citizen-feedback-and-suggestion')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-citizen-feedback-and-suggestion')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-citizen-feedback-and-suggestion')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $feedback_data = $this->service->getById($edit_data_id);
        return view('admin.pages.citizen-action.feedback-suggestion.edit-feedback-suggestion', compact('feedback_data'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        
     ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_feedback_data = $this->service->updateAll($request);
            if ($update_feedback_data) {
                $msg = $update_feedback_data['msg'];
                $status = $update_feedback_data['status'];
                if ($status == 'success') {
                    return redirect('list-citizen-feedback-and-suggestion')->with(compact('msg', 'status'));
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
            $feedback_suggestion = $this->service->getById($request->show_id);
            return view('admin.pages.citizen-action.feedback-suggestion.show-feedback-suggestion', compact('feedback_suggestion'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $feedback = $this->service->deleteById($request->delete_id);
            return redirect('list-citizen-feedback-and-suggestion')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}