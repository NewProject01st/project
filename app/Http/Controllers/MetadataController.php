<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Metadata;
use App\Http\Services\MetadataServices;
use Validator;
class MetadataController extends Controller
{

   public function __construct()
    {
        $this->service = new MetadataServices();
    }
    public function index()
    {
        try {
            $metadata = $this->service->getAll();
            return view('admin.pages.metadata.list-metadata', compact('metadata'));
        
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.metadata.add-metadata');
    }

    public function store(Request $request) {
       
        $rules = [
            'english_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'keywords' => 'required|max:255',
         ];
        $messages = [   
            'english_name.required'=>'Please enter name.',
            'english_name.regex' => 'Please  enter text only.',
            'english_name.max'   => 'Please  enter name length upto 255 character only.',
            'keywords'=>'Please enter keywords.',
            'keywords.max'   => 'Please  enter keyword length upto 255 character only.',

        
        ];

        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('add-metadata')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_metadata = $this->service->addAll($request);
            
                if($add_metadata)
                {

                    $msg = $add_metadata['msg'];
                    $status = $add_metadata['status'];
                    if($status=='success') {
                        return redirect('list-metadata')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-metadata')->withInput()->with(compact('msg','status'));
                    }
                }

            }
        } catch (Exception $e) {
            return redirect('add-metadata')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    public function show(Request $request)
    {
        try {
            $metadata = $this->service->getById($request->show_id);
            return view('admin.pages.metadata.show-metadata', compact('metadata'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $metadata =  $this->service->getById($edit_data_id);
        return view('admin.pages.metadata.edit-metadata', compact('metadata'));
    }

    public function update(Request $request)
    {
        $rules = [
            'english_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'keywords' => 'required|max:255',
        ];
        $messages = [   
            'english_name.required'=>'Please enter name.',
            'english_name.regex' => 'Please  enter text only.',
            'english_name.max'   => 'Please  enter name length upto 255 character only.',
            'keywords'=>'Please enter keywords.',
            'keywords.max'   => 'Please  enter keyword length upto 255 character only.',

        ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_metadata = $this->service->updateAll($request);
                if ($update_metadata) {
                    $msg = $update_metadata['msg'];
                    $status = $update_metadata['status'];
                    if ($status == 'success') {
                        return redirect('list-metadata')->with(compact('msg', 'status'));
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
    public function destroy(Request $request){
        try {
            $delete = $this->service->deleteById($request->delete_id);
            if ($delete) {
                $msg = $delete['msg'];
                $status = $delete['status'];
                if ($status == 'success') {
                    return redirect('list-metadata')->with(compact('msg', 'status'));
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