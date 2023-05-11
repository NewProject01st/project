<?php

namespace App\Http\Controllers\Extralinks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extralink;
use App\Http\Services\Extralinks\ExtralinksServices;
use Validator;
class ExtralinkController extends Controller
{

   public function __construct()
    {
        $this->service = new ExtralinksServices();
    }
    public function index()
    {
        try {
            $link = $this->service->getAll();
            return view('admin.pages.extralinks.list-link', compact('link'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.extralinks.add-link');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_url' => 'required',
            'marathi_url' => 'required',
            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_url'=>'required',
        'marathi_url'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-link')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_link = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_link)
            {

                $msg = $add_link['msg'];
                $status = $add_link['status'];
                if($status=='success') {
                    return redirect('list-link')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-link')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-link')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $link = Extralink::find($request->edit_id);
        return view('admin.pages.extralinks.edit-link', compact('link'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_url' => 'required',
        'marathi_url' => 'required',
        
     ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
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
            $update_link = $this->service->updateAll($request);
            if ($update_link) {
                $msg = $update_link['msg'];
                $status = $update_link['status'];
                if ($status == 'success') {
                    return redirect('list-link')->with(compact('msg', 'status'));
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
            $links = $this->service->getById($request->show_id);
            return view('admin.pages.extralinks.show-link', compact('links'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $achievement = $this->service->deleteById($request->delete_id);
            return redirect('list-link')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}