<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TweeterFeed;
use App\Http\Services\Admin\Footer\TweeterFeedServices;
use Validator;
use Illuminate\Validation\Rule;
class TweeterFeedsController extends Controller
{

   public function __construct()
    {
        $this->service = new TweeterFeedServices();
    }
    public function index()
    {
        try {
            $tweeter = $this->service->getAll();
            return view('admin.pages.footer.tweeter-feed.list-tweeter-feed', compact('tweeter'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.footer.tweeter-feed.add-tweeter-feed');
    }

    public function store(Request $request) {
        $rules = [
         
            'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            
         ];
    $messages = [   
     
        'url.required'=>'Please enter url.',
        'url.regex'=>'Please enter valid url.',
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-tweeter-feed')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_link = $this->service->add($request);
            if($add_link)
            {
                $msg = $add_link['msg'];
                $status = $add_link['status'];
                if($status=='success') {
                    return redirect('list-tweeter-feed')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-tweeter-feed')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-tweeter-feed')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $tweeter = $this->service->getById($request->show_id);
            return view('admin.pages.footer.tweeter-feed.show-tweeter-feed', compact('tweeter'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $tweeter = TweeterFeed::find($request->edit_id);

        return view('admin.pages.footer.tweeter-feed.edit-tweeter-feed', compact('tweeter'));
    }

    public function update(Request $request) {
    $rules = [
        'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            
            
        
     ];

    $messages = [   
      
        'url.required'=>'Please enter url.',
        'url.regex'=>'Please valid url.',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_link = $this->service->update($request);
            // dd($update_link); 
            if ($update_link) {
                $msg = $update_link['msg'];
                $status = $update_link['status'];
                if ($status == 'success') {
                    return redirect('list-tweeter-feed')->with(compact('msg', 'status'));
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
        return redirect('list-tweeter-feed')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}
    public function destroy(Request $request)
    {
        try {
            $links = $this->service->deleteById($request->delete_id);
            return redirect('list-tweeter-feed')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}