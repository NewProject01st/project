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

    public function store(Request $request) {
        // dd($request);
    $rules = [
        'english_image' => 'required',
        'marathi_image' => 'required'
        ];
    $messages = [   
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-slide')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_slide = $this->service->addAll($request);
            // dd($add_slide);
            if($add_slide)
            {

                $msg = $add_slide['msg'];
                $status = $add_slide['status'];
                if($status=='success') {
                    return redirect('list-slide')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-slide')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-slide')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
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
        'english_image' => 'required',
        'marathi_image' => 'required'
        
     ];

    $messages = [   
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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


//  public function updateOne(Request $request)
//  {
//      $slide = Slider::find($request->id);
//      $slide->is_active = $request->is_active;
//      $slide->save();

//      return response()->json(['success'=>'Status change successfully.']);
//  }

//  public function updateOne(Request $request)
//  {
//     $active_id =$request->active_id;
//     //  $isActive = $request->input('is_active', false);
  
//      $result = $this->service->updateOne($active_id);
//      dd($result);
//      if ($result['status'] === 'success') {
//          return redirect()->back()->with('success', $result['msg']);
//      } else {
//          return redirect()->back()->with('error', $result['msg']);
//      }
//  }
 

public function updateOne(Request $request)
{
    $active_id = $request->active_id;
    $result = $this->service->updateOne($active_id);

    // Rest of the code remains the same
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