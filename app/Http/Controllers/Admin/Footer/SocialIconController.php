<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialIcon;
use App\Http\Services\Admin\Footer\SocialIconServices;
use Validator;
use Config;
use Illuminate\Validation\Rule;
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
            return view('admin.pages.footer.social-icon.list-social-icon', compact('social_icon'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.footer.social-icon.add-social-icon');
    }

    public function store(Request $request) {
        $rules = [
            'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MAX_SIZE").'|dimensions:min_width=100,min_height=100,max_width=600,max_height=600|min:'.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MIN_SIZE").'',
             ];
    $messages = [   
        'url.required'=>'Please enter url.',
        'url.regex'=>'Please enter valid url.',
        'icon.required' => 'The icon is required.',
        'icon.image' => 'The icon must be a valid icon file.',
        'icon.mimes' => 'The icon must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'icon.max' => 'The icon size must not exceed '.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MAX_SIZE").'KB .',
        'icon.min' => 'The icon size must not be less than '.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MIN_SIZE").'KB .',
        'icon.dimensions' => 'The icon dimensions must be between 100x100 and 600x600 pixels.',
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
        return view('admin.pages.footer.social-icon.edit-social-icon', compact('social_icon'));
    }
    public function update(Request $request)
{
    $rules = [
       
        'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],

        
     ];
     if($request->has('icon')) {
        $rules['icon'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MAX_SIZE").'|dimensions:min_width=100,min_height=100,max_width=600,max_height=600|min:'.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MIN_SIZE").'';
    }
    
    $messages = [   
        'url.required'=>'Please enter url.',
        'url.regex'=>'Please valid url.',
        'icon.required' => 'The icon is required.',
        'icon.image' => 'The icon must be a valid icon file.',
        'icon.mimes' => 'The icon must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'icon.max' => 'The icon size must not exceed '.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MAX_SIZE").'KB .',
        'icon.min' => 'The icon size must not be less than '.Config::get("AllFileValidation.SOCIAL_ICON_IMAGE_MIN_SIZE").'KB .',
        'icon.dimensions' => 'The icon dimensions must be between 100x100 and 600x600 pixels.',
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
 
 public function updateOne(Request $request){
    try {
        $active_id = $request->active_id;
    $result = $this->service->updateOne($active_id);
        return redirect('list-social-icon')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}
    public function destroy(Request $request)
    {
        try {
            $social_icon = $this->service->deleteById($request->delete_id);
            return redirect('list-social-icon')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}