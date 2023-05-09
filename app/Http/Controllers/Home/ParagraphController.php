<?php

namespace App\Http\Controllers\Paragraph;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paragraph;
use App\Http\Services\Paragraph\ParagraphServices;
use Validator;
class ParagraphController extends Controller
{

   public function __construct()
    {
        $this->service = new ParagraphServices();
    }
    public function index()
    {
        try {
            $paragraphs = $this->service->getAll();
            return view('admin.pages.paragraph.list-paragraph', compact('paragraphs'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.paragraph.add-paragraph');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_url' => 'required',
            'marathi_url' => 'required',
            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description'=>'Please  enter english description.',
        'marathi_description'=>'Please  enter marathi description.',
        'english_url'=>'required',
        'marathi_url'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-paragraph')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_paras = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_paras)
            {

                $msg = $add_paras['msg'];
                $status = $add_paras['status'];
                if($status=='success') {
                    return redirect('list-paragraph')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-paragraph')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-paragraph')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $paragraph = Paragraph::find($request->edit_id);
        return view('admin.pages.paragraph.edit-paragraph', compact('paragraph'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_url' => 'required',
        'marathi_url' => 'required',
        
     ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_description'=>'required',
        'marathi_description'=>'required',
        'english_url'=>'required',
        'marathi_url'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_para = $this->service->updateAll($request);
            if ($update_para) {
                $msg = $update_para['msg'];
                $status = $update_para['status'];
                if ($status == 'success') {
                    return redirect('list-paragraph')->with(compact('msg', 'status'));
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
            $paragraphs = $this->service->getById($request->show_id);
            return view('admin.pages.paragraph.show-paragraph', compact('paragraphs'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $paragraphs = $this->service->deleteById($request->delete_id);
            return redirect('list-paragraph')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}