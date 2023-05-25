<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Services\Home\SliderServices;
use Validator;
class SliderController extends Controller
{

   public function __construct()
    {
        $this->service = new SliderServices();
    }
    public function index()
    {
        try {
            $slider = $this->service->getAll();
            return view('admin.pages.home.slider.list-slide', compact('slider'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.slider.add-slide');
    }
public function store(Request $request)
{
    $rules = [
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=2000,max_height=1000',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=2000,max_height=1000',
    ];

    $messages = [   
        'english_image.required' => 'The English image is required.',
        'english_image.image' => 'The English image must be a valid image file.',
        'english_image.mimes' => 'The English image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'english_image.max' => 'The English image size must not exceed 2MB.',
        'english_image.dimensions' => 'The English image dimensions must be maximum 2000x1000 pixels.',
        'marathi_image.required' => 'The Marathi image is required.',
        'marathi_image.image' => 'The Marathi image must be a valid image file.',
        'marathi_image.mimes' => 'The Marathi image must be in JPEG, PNG, JPG, GIF, or SVG format.',
        'marathi_image.max' => 'The Marathi image size must not exceed 2MB.',
        'marathi_image.dimensions' => 'The Marathi image dimensions must be maximum 2000x1000 pixels.',
    ];

    try {
        $validation = Validator::make($request->all(), $rules, $messages);
        
        if ($validation->fails()) {
            return redirect('add-slide')
                ->withInput()
                ->withErrors($validation);
        } else {
            $add_slide = $this->service->addAll($request);

            if ($add_slide) {
                $msg = $add_slide['msg'];
                $status = $add_slide['status'];

                if ($status == 'success') {
                    return redirect('list-slide')->with(compact('msg', 'status'));
                } else {
                    return redirect('add-slide')->withInput()->with(compact('msg', 'status'));
                }
            }
        }
    } catch (Exception $e) {
        return redirect('add-slide')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}


//     public function store(Request $request) {
//         // dd($request);
//     $rules = [
//         'english_image' => 'required',
//         'marathi_image' => 'required'
//         ];
//     $messages = [   
//         'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ];

//     try {
//         $validation = Validator::make($request->all(),$rules,$messages);
//         if($validation->fails() )
//         {
//             return redirect('add-slide')
//                 ->withInput()
//                 ->withErrors($validation);
//         }
//         else
//         {
//             $add_slide = $this->service->addAll($request);
//             // dd($add_slide);
//             if($add_slide)
//             {

//                 $msg = $add_slide['msg'];
//                 $status = $add_slide['status'];
//                 if($status=='success') {
//                     return redirect('list-slide')->with(compact('msg','status'));
//                 }
//                 else {
//                     return redirect('add-slide')->withInput()->with(compact('msg','status'));
//                 }
//             }

//         }
//     } catch (Exception $e) {
//         return redirect('add-slide')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
//     }
// }
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $slider = $this->service->getById($request->show_id);
            return view('admin.pages.home.slider.show-slide', compact('slider'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $slider = Slider::find($request->edit_id);
        return view('admin.pages.home.slider.edit-slide', compact('slider'));
    }
    public function update(Request $request)
{
    $rules = [
        // 'english_image' => 'required',
        // 'marathi_image' => 'required'
        
     ];

    $messages = [   
        // 'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
                    return redirect('list-slide')->with(compact('msg', 'status'));
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
public function updateOne(Request $request)
{
    try {
        $active_id = $request->active_id;
    $result = $this->service->updateOne($active_id);
        return redirect('list-slide')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $slider = $this->service->deleteById($request->delete_id);
            return redirect('list-slide')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}