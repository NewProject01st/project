<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementNews;
use App\Http\Services\Admin\Home\DisasterManagementNewsServices;
use Validator;
class DisasterManagementNewsController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterManagementNewsServices();
    }
    public function index()
    {
        try {
            $disaster_news = $this->service->getAll();
            return view('admin.pages.home.disaster_news.list-disaster-news', compact('disaster_news'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.disaster_news.add-disaster-news');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required',
            'marathi_image' => 'required',
            'english_url' => 'required',
            'disaster_date' => 'required',
            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            // print_r($add_tenders);
            // die();
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
    
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $disaster_news = $this->service->getById($edit_data_id);
        return view('admin.pages.home.disaster_news.edit-disaster-news', compact('disaster_news'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_description' => 'required',
        'marathi_description' => 'required',
        // 'english_image' => 'required',
        // 'marathi_image' => 'required',
        'english_url' => 'required',
        'disaster_date' => 'required',
        
     ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_description' => 'required',
        'marathi_description' => 'required',
        // 'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'english_url'=>'required',
        'disaster_date' => 'required',
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
public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $disaster_news = $this->service->getById($request->show_id);
            return view('admin.pages.home.disaster_news.show-disaster-news', compact('disaster_news'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-disaster-management-news')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $disaster_news = $this->service->deleteById($request->delete_id);
            return redirect('list-disaster-management-news')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}