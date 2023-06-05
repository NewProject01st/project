<?php

namespace App\Http\Controllers\ResearchCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuccessStories;
use App\Http\Services\ResearchCenter\VideoServices;
use Validator;
class VideoController extends Controller
{

   public function __construct()
    {
        $this->service = new VideoServices();
    }
    public function index()
    {
        try {
            $video = $this->service->getAll();
            return view('admin.pages.research-center.video.list-video', compact('video'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.research-center.video.add-video');
    }

    public function store(Request $request) {
        $rules = [
            'video_name' => 'required',
         ];
    $messages = [   
        'video_name'=>'Please Upload Video.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-video')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_video = $this->service->addAll($request);
         
            // print_r($add_tenders);
            // die();
            if($add_video)
            {

                $msg = $add_video['msg'];
                $status = $add_video['status'];
                if($status=='success') {
                    return redirect('list-video')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-video')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-video')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $video = $this->service->getById($edit_data_id);
        return view('admin.pages.research-center.video.edit-video', compact('video'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_name' => 'required',
     ];
    $messages = [   
        'english_name'=>'Please  enter english Name.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_video = $this->service->updateAll($request);
            if ($update_video) {
                $msg = $update_video['msg'];
                $status = $update_video['status'];
                if ($status == 'success') {
                    return redirect('list-video')->with(compact('msg', 'status'));
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
            $video = $this->service->getById($request->show_id);
            return view('admin.pages.research-center.video.show-video', compact('video'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-video')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $video = $this->service->deleteById($request->delete_id);
            return redirect('list-video')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}