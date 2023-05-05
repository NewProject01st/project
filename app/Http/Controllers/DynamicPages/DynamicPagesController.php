<?php

namespace App\Http\Controllers\DynamicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\DynamicPages\DynamicPagesServices;
use Validator;
use App\Models\MainMenus;

class DynamicPagesController extends Controller
{

   public function __construct()
    {
        $this->service = new DynamicPagesServices();
    }
    public function index()
    {
        try { 
            $sub_menu = $this->service->getAll();
            return view('admin.pages.dynamic-pages.list-page', compact('sub_menu'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        $main_menu_data = MainMenus::all();
        return view('admin.pages.dynamic-pages.add-page',  ['main_menu_data' => $main_menu_data]);
        // return view('admin.pages.dynamic-pages.add-page');
    }

    public function store(Request $request) {
    $rules = [
        'menu_name_marathi' => 'required',
        'menu_name_english' => 'required',
        // 'order_no' => 'required',
        
        ];
    $messages = [   
        'menu_name_marathi.required' => 'Please  enter menu name title.',
        'menu_name_english.required' => 'Please  enter menu name title.',
        // 'order_no.required' => 'Please enter marathi title.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-page')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_constitutionhistory = $this->service->addAll($request);
            if($add_constitutionhistory)
            {

                $msg = $add_constitutionhistory['msg'];
                $status = $add_constitutionhistory['status'];
                if($status=='success') {
                    return redirect('list-page')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-page')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-page')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $menu_data = $this->service->getById($request->show_id);
            return view('admin.pages.dynamic-pages.show-page', compact('menu_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = $request->edit_id;
        $main_menu_data =  $this->service->getById($request->edit_id);
        return view('admin.pages.dynamic-pages.edit-page', compact('main_menu_data', 'edit_data_id'));
    }
    public function update(Request $request) {
        $rules = [
            'menu_name_marathi' => 'required',
            'menu_name_english' => 'required',
            // 'order_no' => 'required',
            
            ];
        $messages = [   
            'menu_name_marathi.required' => 'Please  enter menu name title.',
            'menu_name_english.required' => 'Please  enter menu name title.',
            // 'order_no.required' => 'Please enter marathi title.',
        ];


        try {
            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_constitutionhistory = $this->service->updateAll($request);
                if ($update_constitutionhistory) {
                    $msg = $update_constitutionhistory['msg'];
                    $status = $update_constitutionhistory['status'];
                    if ($status == 'success') {
                        return redirect('list-page')->with(compact('msg', 'status'));
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
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $constitutionhistory = $this->service->deleteById($request->delete_id);
            return redirect('list-page')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
