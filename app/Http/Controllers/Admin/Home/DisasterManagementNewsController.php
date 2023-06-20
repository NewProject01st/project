<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementNews;
use App\Http\Services\Admin\Home\DisasterManagementNewsServices;
use Validator;
use Config;
class DisasterManagementNewsController extends Controller
{

    public function __construct()
    {
        $this->service = new DisasterManagementNewsServices();
    }
    public function index(){
        try {
            $disaster_news = $this->service->getAll();
            return view('admin.pages.home.disaster_news.list-disaster-news', compact('disaster_news'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add(){
        return view('admin.pages.home.disaster_news.add-disaster-news');
    }

    public function store(Request $request){
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE").'',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE").'',
            'english_url' => 'required',
            'disaster_date' => 'required',
            
            ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image.required' => 'The English image is required.',
        'english_image.image' => 'The English image must be a valid image file.',
        'english_image.mimes' => 'The English image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'english_image.max' => 'The English image size must not exceed '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The English image size must not be less than '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The English image dimensions must be between 1500x500 and 2000x1000 pixels.',
        'marathi_image.required' => 'The Marathi image is required.',
        'marathi_image.image' => 'The Marathi image must be a valid image file.',
        'marathi_image.mimes' => 'The Marathi image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'marathi_image.max' => 'The Marathi image size must not exceed  '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The English image size must not be less than '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'The Marathi image dimensions must be between 1500x500 and 2000x1000 pixels.',
        'english_url'=>'required',
        'disaster_date' => 'required',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-disaster-management-news')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_disaster_news = $this->service->addAll($request);
            if($add_disaster_news)
            {

                $msg = $add_disaster_news['msg'];
                $status = $add_disaster_news['status'];
                if($status=='success') {
                    return redirect('list-disaster-management-news')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-disaster-management-news')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-disaster-management-news')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
    }
    
    public function edit(Request $request){
        $edit_data_id = $request->edit_id;
        $disaster_news = $this->service->getById($edit_data_id);
        return view('admin.pages.home.disaster_news.edit-disaster-news', compact('disaster_news'));
    }

    public function update(Request $request){
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_url' => 'required',
            'disaster_date' => 'required',
            
        ];
        if($request->has('english_image')) {
            $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE");
        }
        if($request->has('marathi_image')) {
            $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE");
        }
        $messages = [   
            'english_title.required' => 'Please enter title.',
            'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
            'english_description.required' => 'Please enter description.',
            'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
            'english_url'=>'required',
            'disaster_date' => 'required',
            'english_image.required' => 'The English image is required.',
            'english_image.image' => 'The English image must be a valid image file.',
            'english_image.mimes' => 'The English image must be in JPEG, PNG, JPG, GIF, or SVG format.',
            'english_image.max' => 'The English image size must not exceed '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The English image size must not be less than '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE").'KB .',
            'english_image.dimensions' => 'The English image dimensions must be between 1500x500 and 2000x1000 pixels.',
            'marathi_image.required' => 'The Marathi image is required.',
            'marathi_image.image' => 'The Marathi image must be a valid image file.',
            'marathi_image.mimes' => 'The Marathi image must be in JPEG, PNG, JPG, GIF, or SVG format.',
            'marathi_image.max' => 'The Marathi image size must not exceed  '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The English image size must not be less than '.Config::get("AllFileValidation.DISASTER_MANAGEMENT_NEWS_IMAGE_MIN_SIZE").'KB .',
            'marathi_image.dimensions' => 'The Marathi image dimensions must be between 1500x500 and 2000x1000 pixels.',
        ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_disaster_news = $this->service->updateAll($request);
                if ($update_disaster_news) {
                    $msg = $update_disaster_news['msg'];
                    $status = $update_disaster_news['status'];
                    if ($status == 'success') {
                        return redirect('list-disaster-management-news')->with(compact('msg', 'status'));
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
            $disaster_news = $this->service->getById($request->show_id);
            return view('admin.pages.home.disaster_news.show-disaster-news', compact('disaster_news'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateOne(Request $request){
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-disaster-management-news')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request){
        try {
            $disaster_news = $this->service->deleteById($request->delete_id);
            return redirect('list-disaster-management-news')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}