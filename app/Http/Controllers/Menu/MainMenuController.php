<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConstitutionHistory;
use App\Http\Services\Menu\MainMenuServices;
use Validator;
class MainMenuController extends Controller
{

   public function __construct()
    {
        $this->service = new MainMenuServices();
    }
    public function index()
    {
        try {
            $main_menu = $this->service->getAll();
            return view('admin.pages.menu.mainmenu.list-main-menu', compact('main_menu'));
            
        } catch (\Exception $e) {
            return $e;  
        }
    }
    public function add()
    {
        return view('admin.pages.menu.mainmenu.add-main-menu');
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
            return redirect('add-main-menu')
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
                    return redirect('list-main-menu')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-main-menu')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-main-menu')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $menu_data = $this->service->getById($request->show_id);
            return view('admin.pages.menu.mainmenu.show-main-menu', compact('menu_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        try {
                $edit_data_id = $request->edit_id;
                $main_menu_data =  $this->service->getById($request->edit_id);
                return view('admin.pages.menu.mainmenu.edit-main-menu', compact('main_menu_data', 'edit_data_id'));
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }

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
            $validator = $this->validate($request, $rules);
            $add_constitutionhistory = $this->service->updateAll($request);
            if($add_constitutionhistory) {

                $msg = $add_constitutionhistory['msg'];
                $status = $add_constitutionhistory['status'];
                if($status=='success') {
                    return redirect('list-main-menu')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-main-menu')->withInput()->with(compact('msg','status'));
                }
    
            }
        } catch (Exception $e) {
            return redirect('add-main-menu')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    public function destroy(Request $request)
    {
        try {
            $constitutionhistory = $this->service->deleteById($request->delete_id);
            return redirect('list-main-menu')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
