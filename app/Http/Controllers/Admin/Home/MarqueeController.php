<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marquee;
use App\Http\Services\Admin\Home\MarqueeServices;
use Validator;
class MarqueeController extends Controller
{

   public function __construct()
    {
        $this->service = new MarqueeServices();
    }
    public function index()
    {
        try {
            $marquees = $this->service->getAllMarquee();
            return view('admin.pages.home.marquee.list-marquee', compact('marquees'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.marquee.add-marquee');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'url' => 'required',
            
         ];
    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
        'url' => 'आवश्यक',
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-marquee')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_marquee = $this->service->addMarquee($request);
            if($add_marquee)
            {
                $msg = $add_marquee['msg'];
                $status = $add_marquee['status'];
                if($status=='success') {
                    return redirect('list-marquee')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-marquee')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-marquee')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $marquees = $this->service->getById($request->show_id);
            return view('admin.pages.home.marquee.show-marquee', compact('marquees'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $marquees = Marquee::find($request->edit_id);
        // dd($budgets);

        return view('admin.pages.home.marquee.edit-marquee', compact('marquees'));
    }

    public function update(Request $request) {
    $rules = [
             'english_title' => 'required',
            'marathi_title' => 'required',
        
     ];

    $messages = [   
        'english_title.required' => 'Please enter title.',
        'marathi_title.required' => 'कृपया शीर्षक प्रविष्ट करा',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_marquee = $this->service->updateMarquee($request);
            if ($update_marquee) {
                $msg = $update_marquee['msg'];
                $status = $update_marquee['status'];
                if ($status == 'success') {
                    return redirect('list-marquee')->with(compact('msg', 'status'));
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
        return redirect('list-marquee')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $marquees = $this->service->deleteById($request->delete_id);
            return redirect('list-marquee')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}