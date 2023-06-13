<?php

namespace App\Http\Controllers\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TweeterFeed;
use App\Http\Services\Footer\TweeterFeedServices;
use Validator;
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
         
            'url' => 'required',
            
         ];
    $messages = [   
     
        'url' => 'required',
       
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
            //  dd($request->show_id);
            $tweeter = $this->service->getById($request->show_id);
            return view('admin.pages.footer.tweeter-feed.show-tweeter-feed', compact('tweeter'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $tweeter = TweeterFeed::find($request->edit_id);
        // dd($budgets);

        return view('admin.pages.footer.tweeter-feed.edit-tweeter-feed', compact('tweeter'));
    }

    public function update(Request $request) {
    $rules = [
            'url' => 'required',
            
            
        
     ];

    $messages = [   
      
        'url.required' => 'Please  enter marathi title.',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_link = $this->service->update($request);
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
            // dd($request->delete_id);
            $links = $this->service->deleteById($request->delete_id);
            return redirect('list-tweeter-feed')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}