<?php

namespace App\Http\Controllers\Disaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disaster;
use App\Http\Services\Disaster\DisasterServices;
use Validator;
class DisasterController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterServices();
    }
    public function index()
    {
        try {
            $disaster = $this->service->getAll();
            return view('admin.pages.disaster.list-disaster', compact('disaster'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.disaster.add-disaster');
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
            return redirect('add-disaster')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_disaster = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_disaster)
            {

                $msg = $add_disaster['msg'];
                $status = $add_disaster['status'];
                if($status=='success') {
                    return redirect('list-disaster')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-disaster')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-disaster')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $disaster = Disaster::find($request->edit_id);
        return view('admin.pages.disaster.edit-disaster', compact('disaster'));
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
            $update_disaster = $this->service->updateAll($request);
            if ($update_disaster) {
                $msg = $update_disaster['msg'];
                $status = $update_disaster['status'];
                if ($status == 'success') {
                    return redirect('list-disaster')->with(compact('msg', 'status'));
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
            $disasters = $this->service->getById($request->show_id);
            return view('admin.pages.disaster.show-disaster', compact('disasters'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $disaster = $this->service->deleteById($request->delete_id);
            return redirect('list-disaster')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}