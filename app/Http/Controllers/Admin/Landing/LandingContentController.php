<?php

namespace App\Http\Controllers\Admin\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Services\Admin\Landing\ContentServices;
use Validator;
use Illuminate\Validation\Rule;
use Config;
class LandingContentController extends Controller
{

    public function __construct(){
    $this->service = new ContentServices();
    }

    public function index(){
        try {
            $slider = $this->service->getAll();
            return view('admin.pages.landing.landing-content.list-landing-content', compact('slider'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function add(){
        return view('admin.pages.landing.landing-content.add-landing-content');
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE").'',
        ];

        $messages = [    
            'title.required'=>'Please enter title.',
            // 'title.regex' => 'Please  enter text only.',
            'title.max'   => 'Please  enter text length upto 255 character only.',
            'description.required' => 'Please enter description.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'KB .',
            'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE").'KB .',
            // 'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        ];

        try {
            $validation = Validator::make($request->all(), $rules, $messages);
            
            if ($validation->fails()) {
                return redirect('add-landing-content')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $add_slide = $this->service->addAll($request);

                if ($add_slide) {
                    $msg = $add_slide['msg'];
                    $status = $add_slide['status'];

                    if ($status == 'success') {
                        return redirect('list-landing-content')->with(compact('msg', 'status'));
                    } else {
                        return redirect('add-landing-content')->withInput()->with(compact('msg', 'status'));
                    }
                }
            }
        } catch (Exception $e) {
            return redirect('add-landing-content')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function show(Request $request){
        try {
            $slider = $this->service->getById($request->show_id);
            return view('admin.pages.landing.landing-content.show-landing-content', compact('slider'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function edit(Request $request){
        $edit_data_id = base64_decode($request->edit_id);
        $slider = $this->service->getById($edit_data_id);
        return view('admin.pages.landing.landing-content.edit-landing-content', compact('slider'));
    }
    
    public function update(Request $request){
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
        ];

        if($request->has('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE");
        }
        $messages = [   
            'title.required'=>'Please enter title.',
            // 'title.regex' => 'Please enter text only.',
            'title.max'   => 'Please  enter text length upto 255 character only.', 
            'description.required' => 'Please enter description.',          
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'KB .',
            'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE").'KB .',
            // 'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_slide = $this->service->updateAll($request);
                if ($update_slide) {
                    $msg = $update_slide['msg'];
                    $status = $update_slide['status'];
                    if ($status == 'success') {
                        return redirect('list-landing-content')->with(compact('msg', 'status'));
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
            return redirect('list-landing-content')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request){
        try {
            $delete_slide = $this->service->deleteById($request->delete_id);
            if ($delete_slide) {
                $msg = $delete_slide['msg'];
                $status = $delete_slide['status'];
                if ($status == 'success') {
                    return redirect('list-landing-content')->with(compact('msg', 'status'));
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