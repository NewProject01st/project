<?php

namespace App\Http\Controllers\Achievements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Http\Services\Achievements\AchievementsServices;
use Validator;
class AchievementsController extends Controller
{

   public function __construct()
    {
        $this->service = new AchievementsServices();
    }
    public function index()
    {
        try {
            $achievement = $this->service->getAll();
            return view('admin.pages.achievements.list-achievement', compact('achievement'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.achievements.add-achievement');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_url' => 'required',
            'marathi_url' => 'required',
            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_url'=>'required',
        'marathi_url'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-achievement')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_achieve = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_achieve)
            {

                $msg = $add_achieve['msg'];
                $status = $add_achieve['status'];
                if($status=='success') {
                    return redirect('list-achievement')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-achievement')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-achievement')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $achievement = Achievement::find($request->edit_id);
        return view('admin.pages.achievements.edit-achievement', compact('achievement'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_url' => 'required',
        'marathi_url' => 'required',
        
     ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_url'=>'required',
        'marathi_url'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_achieve = $this->service->updateAll($request);
            if ($update_achieve) {
                $msg = $update_achieve['msg'];
                $status = $update_achieve['status'];
                if ($status == 'success') {
                    return redirect('list-achievement')->with(compact('msg', 'status'));
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
            $achievements = $this->service->getById($request->show_id);
            return view('admin.pages.achievements.show-achievement', compact('achievements'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $achievement = $this->service->deleteById($request->delete_id);
            return redirect('list-achievement')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}