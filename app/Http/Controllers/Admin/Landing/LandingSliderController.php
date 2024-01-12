<?php

namespace App\Http\Controllers\Admin\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Services\Admin\Landing\SliderServices;
use Validator;
use Illuminate\Validation\Rule;
use Config;
class LandingSliderController extends Controller
{

    public function __construct(){
    $this->service = new SliderServices();
    }

    public function index(){
        try {
            $slider = $this->service->getAll();
            return view('admin.pages.landing.landing-slide.list-landing-slide', compact('slider'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function add(){
        return view('admin.pages.landing.landing-slide.add-landing-slide');
    }

    public function store(Request $request){
        $rules = [
            'english_title' => 'required|max:255',
            'english_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE").'',
        ];

        $messages = [    
            'english_title.required'=>'Please enter title.',
            // 'english_title.regex' => 'Please  enter text only.',
            'english_title.max'   => 'Please  enter text length upto 255 character only.',
            'english_image.required' => 'The image is required.',
            'english_image.image' => 'The image must be a valid image file.',
            'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE").'KB .',
            // 'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        ];

        try {
            $validation = Validator::make($request->all(), $rules, $messages);
            
            if ($validation->fails()) {
                return redirect('add-landing-slide')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $add_slide = $this->service->addAll($request);

                if ($add_slide) {
                    $msg = $add_slide['msg'];
                    $status = $add_slide['status'];

                    if ($status == 'success') {
                        return redirect('list-landing-slide')->with(compact('msg', 'status'));
                    } else {
                        return redirect('add-landing-slide')->withInput()->with(compact('msg', 'status'));
                    }
                }
            }
        } catch (Exception $e) {
            return redirect('add-landing-slide')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function show(Request $request){
        try {
            $slider = $this->service->getById($request->show_id);
            return view('admin.pages.landing.landing-slide.show-landing-slide', compact('slider'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function edit(Request $request){
        $edit_data_id = base64_decode($request->edit_id);
        $slider = $this->service->getById($edit_data_id);
        return view('admin.pages.landing.landing-slide.edit-landing-slide', compact('slider'));
    }
    
    public function update(Request $request){
        $rules = [
            'english_title' => 'required|max:255',
        ];

        if($request->has('english_image')) {
            $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE");
        }
        $messages = [   
            'english_title.required'=>'Please enter title.',
            // 'english_title.regex' => 'Please enter text only.',
            'english_title.max'   => 'Please  enter text length upto 255 character only.',           
            'english_image.required' => 'The image is required.',
            'english_image.image' => 'The image must be a valid image file.',
            'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.LANDING_SLIDER_IMAGE_MIN_SIZE").'KB .',
            // 'english_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
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
                        return redirect('list-landing-slide')->with(compact('msg', 'status'));
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
            return redirect('list-landing-slide')->with('flash_message', 'Updated!');  
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
                    return redirect('list-landing-slide')->with(compact('msg', 'status'));
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