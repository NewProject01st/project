<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteLogo;
use App\Http\Services\Header\WebsiteLogoServices;
use Validator;
use Config;
class WebsiteLogoController extends Controller
{

    public function __construct()
    {
        $this->service = new WebsiteLogoServices();
    }
    public function index(){
        try {
            $website_logo = $this->service->getAll();
            return view('admin.pages.header.website-logo.list-website-logo', compact('website_logo'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add(){
        return view('admin.pages.header.website-logo.add-website-logo');
    }

    public function store(Request $request){
        $rules = [
           
            'logo' => 'required', 
            // 'url'=>'required'                   
            ];
    $messages = [   
       
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'url'=>'required'         
      
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-website-logo')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_website_logo = $this->service->addAll($request);
            if($add_website_logo)
            {

                $msg = $add_website_logo['msg'];
                $status = $add_website_logo['status'];
                if($status=='success') {
                    return redirect('list-website-logo')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-website-logo')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-website-logo')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
    }
    
    public function edit(Request $request){
        $edit_data_id = $request->edit_id;
        $website_logo = $this->service->getById($edit_data_id);
        return view('admin.pages.header.website-logo.edit-website-logo', compact('website_logo'));
    }

    public function update(Request $request){
        $rules = [
           
            'logo' => 'required',  
            // 'url'=>'required'         
            ];
    $messages = [   
       
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'url'=>'required'         
      
    ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_website_logo = $this->service->updateAll($request);
                if ($update_website_logo) {
                    $msg = $update_website_logo['msg'];
                    $status = $update_website_logo['status'];
                    if ($status == 'success') {
                        return redirect('list-website-logo')->with(compact('msg', 'status'));
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

    public function show(Request $request){
        try {
            $website_logo = $this->service->getById($request->show_id);
            return view('admin.pages.header.website-logo.show-website-logo', compact('website_logo'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    // public function updateOne(Request $request){
    //     try {
    //         $active_id = $request->active_id;
    //     $result = $this->service->updateOne($active_id);
    //         return redirect('list-disaster-management-news')->with('flash_message', 'Updated!');  
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }

    public function destroy(Request $request){
        try {
            $website_logo = $this->service->deleteById($request->delete_id);
            return redirect('list-website-logo')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}