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
           
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.WEBSITE_LOGO_MAX_SIZE").'|dimensions:min_width=150,min_height=45,max_width=200,max_height=46|min:'.Config::get("AllFileValidation.WEBSITE_LOGO_MIN_SIZE").'',
            // 'url'=>'required'                   
            ];
    $messages = [   
       
        'logo.required' => 'The Website logo is required.',
        'logo.image' => 'The Website logo must be a valid image file.',
        'logo.mimes' => 'The Website logo must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'logo.max' => 'The Website logo size must not exceed '.Config::get("AllFileValidation.WEBSITE_LOGO_MAX_SIZE").'KB .',
        'logo.min' => 'The Website logosize must not be less than '.Config::get("AllFileValidation.WEBSITE_LOGO_MIN_SIZE").'KB .',
        'logo.dimensions' => 'The Website logo dimensions must be between 150x45 and 200x46 pixels.',
        'logo.min' => 'The Website logo size must not be less than '.Config::get("AllFileValidation.WEBSITE_LOGO_MIN_SIZE").'KB .',

      
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
           
            
            ];
            
        if($request->has('logo')) {
            $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.WEBSITE_LOGO_MAX_SIZE").'|dimensions:min_width=150,min_height=45,max_width=200,max_height=46|min:'.Config::get("AllFileValidation.WEBSITE_LOGO_MIN_SIZE");
        }
    $messages = [   
       
       
        'logo.required' => 'The Website logo is required.',
        'logo.image' => 'The Website logo must be a valid image file.',
        'logo.mimes' => 'The Website logo must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'logo.max' => 'The Website logo size must not exceed '.Config::get("AllFileValidation.WEBSITE_LOGO_MAX_SIZE").'KB .',
        'logo.min' => 'The Website logosize must not be less than '.Config::get("AllFileValidation.WEBSITE_LOGO_MIN_SIZE").'KB .',
        'logo.dimensions' => 'The Website logo dimensions must be between 150x45 and 200x46 pixels.',
        'logo.min' => 'The Website logo size must not be less than '.Config::get("AllFileValidation.WEBSITE_LOGO_MIN_SIZE").'KB .',

      
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