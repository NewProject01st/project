<?php

namespace App\Http\Controllers\DynamicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\DynamicPages\DynamicPagesServices;
use Validator;
// use App\Models\MainMenus;

class DynamicPagesController extends Controller
{

   public function __construct()
    {
        $this->service = new DynamicPagesServices();
    }
    public function index()
    {
        try { 
            $dynamic_page = $this->service->getAll();
            return view('admin.pages.dynamic-pages.list-page', compact('dynamic_page'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.dynamic-pages.add-page');
    }

    public function store(Request $request) {

        if(!is_dir("./pages"))
        mkdir("./pages");
        $current_name = 'satish-eng.blade.html';
        $new_name = 'satish-eng.blade.html';
        $final_content_marathi = $request->marathi_title." ".$request->marathi_description;
        $final_content_english = $request->english_title." ".$request->english_description;
        if($current_name != $new_name){
            $nname = 'satish-eng.blade.html';
            while(true){
                if(is_file("./resources/views/admin/pages/dynamic-pages-created/{$nname}")){
                    $nname = $new_name."_".($i++);
                }else{
                    break;
                }
            }
            $new_name = $nname;
        }
        if(!empty($current_name) && $current_name != $new_name){
            rename("./resources/views/admin/pages/dynamic-pages-created/{$current_name}","./resources/views/admin/pages/dynamic-pages-created/{$new_name}");
        }
        $save = file_put_contents("./resources/views/admin/pages/dynamic-pages-created/{$new_name}",$final_content_english);

        $contents = file_get_contents('satish-eng.blade.html');
        $new_contents = str_replace('Alice', 'John', $contents);
        file_put_contents('satish-eng.blade.html', $new_contents);
        // Marathi 

        $current_name = 'satish-marathi.blade.html';
        $new_name = 'satish-marathi.blade.html';
        $final_content_marathi = $request->marathi_title." ".$request->marathi_description;
        $final_content_english = $request->english_title." ".$request->english_description;
        if($current_name != $new_name){
            $nname = 'satish-marathi.blade.html';
            while(true){
                if(is_file("./resources/views/admin/pages/dynamic-pages-created/{$nname}")){
                    $nname = $new_name."_".($i++);
                }else{
                    break;
                }
            }
            $new_name = $nname;
        }
        if(!empty($current_name) && $current_name != $new_name){
            rename("./resources/views/admin/pages/dynamic-pages-created/{$current_name}","./resources/views/admin/pages/dynamic-pages-created/{$new_name}");
        }
        $save = file_put_contents("./resources/views/admin/pages/dynamic-pages-created/{$new_name}",$final_content_marathi);

        dd($request);

    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required'
        
        ];
    $messages = [   
        'english_title.required' => 'Please  enter english title.',
        'marathi_title.required' => 'Please enter marathi title.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-dynamic-page')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_dynamic_page = $this->service->addAll($request);
            if($add_dynamic_page)
            {

                $msg = $add_dynamic_page['msg'];
                $status = $add_dynamic_page['status'];
                if($status=='success') {
                    return redirect('list-dynamic-page')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-dynamic-page')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-dynamic-page')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
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
