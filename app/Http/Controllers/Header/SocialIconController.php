<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialIcon;
use App\Http\Services\Header\SocialIconServices;
use Validator;
class SocialIconController extends Controller
{

   public function __construct()
    {
        $this->service = new SocialIconServices();
    }
    public function index()
    {
        try {
            $social_icon = $this->service->getAll();
            return view('admin.pages.header.social-icon.list-social-icon', compact('social_icon'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.header.social-icon.add-social-icon');
    }

    public function store(Request $request) {
        $rules = [
           
            'icon' => 'required',
            
            
            
         ];
    $messages = [   
       
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-social-icon')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_social_icon = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_social_icon)
            {

                $msg = $add_social_icon['msg'];
                $status = $add_social_icon['status'];
                if($status=='success') {
                    return redirect('list-social-icon')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-social-icon')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-social-icon')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $social_icon = $this->service->getById($edit_data_id);
        return view('admin.pages.header.social-icon.edit-social-icon', compact('social_icon'));
    }
    public function update(Request $request)
{
    $rules = [
       
        'icon' => 'required',
        
     ];
    $messages = [   
       
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_social_icon = $this->service->updateAll($request);
            if ($update_social_icon) {
                $msg = $update_social_icon['msg'];
                $status = $update_social_icon['status'];
                if ($status == 'success') {
                    return redirect('list-social-icon')->with(compact('msg', 'status'));
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
            $social_icon = $this->service->getById($request->show_id);
            return view('admin.pages.header.social-icon.show-social-icon', compact('social_icon'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $social_icon = $this->service->deleteById($request->delete_id);
            return redirect('list-social-icon')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}