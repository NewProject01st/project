<?php

namespace App\Http\Controllers\DynamicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\DynamicPages\DynamicPagesServices;
use Validator;
use App\Models\ {
	DynamicWebPages,
    MainMenus
};
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
        $main_menu_data = getMenuItemsForDynamicPageAdd();
        return view('admin.pages.dynamic-pages.add-page',  ['main_menu_data' => $main_menu_data]);
    }

    public function store(Request $request) {

        try {
            $rules = [
                'menu_data' => 'required',
                'marathi_description' => 'required',
                'english_description' => 'required',
                'english_title' => 'required',
                'marathi_title' => 'required',
                'meta_data' => 'required', 
                'publish_date' => 'required',  
                ];
            $messages = [   
                'menu_data.required' => 'Please select menu.',
                'marathi_description.required' => 'Please  enter english page content.',
                'english_description.required' => 'Please enter marathi page content.',
                'english_title.required' => 'Please enter title in english.',
                'marathi_title.required' => 'Please enter title in marathi.',
                'meta_data.required' => 'Please content of meta data.',
                'publish_date.required' => 'Please select publish date.',
            ];
        
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails()) {
                return redirect('add-dynamic-page')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                        
                $new_name = '';
                $menu_name = '';
                $publish_date = '';
                $menu_selected = explode("_",$request->menu_data);
                $main_menu_data = getMenuItemsForDynamicPageAdd();
                foreach($main_menu_data as $key=> $data) {
                    if( $menu_selected[0] == $data['menu_id'] && $menu_selected[1] == $data['main_sub']) {
                        $new_name = str_replace(" ","-",$menu_selected[0].'-'.$data['menu_name_english'].'-'.$data['main_sub']);
                        $menu_name = $data['menu_name_english'];
                        $publish_date = $request->publish_date;
                        
                    }
                }
                $this->savePageData($request, $menu_selected, $main_menu_data, $new_name, $menu_name, $publish_date, $menu_selected[0]);
                $msg = "Page data saved successfully";
                $status = "successfully";
                return redirect('list-dynamic-page')->with(compact('msg','status'));
            }
    
    } catch (Exception $e) {
        return redirect('add-dynamic-page')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $dynamic_page = $this->service->getById($request->show_id);
            return view('admin.pages.dynamic-pages.show-page', compact('dynamic_page'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function edit(Request $request)
    {
        $main_menu_data = getMenuItemsForDynamicPageAdd();
        $edit_data_id = $request->edit_id;
        $dynamic_page = $this->service->getById($edit_data_id);
        $menu_selected = $dynamic_page->menu_id.'_'.$dynamic_page->menu_type;

        $edit_data_id = $edit_data_id.'_'.$dynamic_page->menu_type;

        $get_publish_date = $dynamic_page->publish_date;

        $html_marathi_path = "./resources/views/admin/pages/dynamic-pages-created/".$dynamic_page->actual_page_name_marathi.".blade.php";
        $html_marathi = file_get_contents($html_marathi_path);
        $html_english_path = "./resources/views/admin/pages/dynamic-pages-created/".$dynamic_page->actual_page_name_english.".blade.php";
        $html_english = file_get_contents($html_english_path);
        return view('admin.pages.dynamic-pages.edit-page', compact('html_marathi', 'html_english', 'edit_data_id', 'get_publish_date','dynamic_page','main_menu_data','menu_selected'));
    }
    public function update(Request $request) {
       
        try {
           
            $rules = [
                'menu_data' => 'required',
                'marathi_description' => 'required',
                'english_description' => 'required',
                'english_title' => 'required',
                'marathi_title' => 'required',
                'meta_data' => 'required', 
                'publish_date' => 'required',  
                ];
            $messages = [   
                'menu_data.required' => 'Please select menu.',
                'marathi_description.required' => 'Please  enter english page content.',
                'english_description.required' => 'Please enter marathi page content.',
                'english_title.required' => 'Please enter title in english.',
                'marathi_title.required' => 'Please enter title in marathi.',
                'meta_data.required' => 'Please content of meta data.',
                'publish_date.required' => 'Please select publish date.',
            ];
        
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails()) {
                return redirect('edit-dynamic-page')
                    ->withInput()
                    ->withErrors($validation);
            } else {

                $new_name = '';
                $menu_name = '';
                $publish_date = '';
                $menu_selected = explode("_",$request->edit_id);
                // dd($menu_selected);
                $main_menu_data = getMenuItemsDynamicPageDetailsById($menu_selected[0]);
                $new_name = str_replace(" ","-",$main_menu_data->menu_id.'-'.$main_menu_data->menu_name.'-'.$main_menu_data->menu_type);
                $menu_name = $main_menu_data->menu_name;
            
                $this->savePageData($request, $menu_selected, $main_menu_data, $new_name, $menu_name, $publish_date, $main_menu_data->menu_id);
                $msg = "Page data saved successfully";
                $status = "successfully";
                return redirect('list-dynamic-page')->with(compact('msg','status'));

            }

        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function savePageData($request, $menu_selected, $main_menu_data, $new_name, $menu_name, $publish_date, $menu_id) {

        if(!is_dir("./resources/views/admin/pages/dynamic-pages-created"))
        mkdir("./resources/views/admin/pages/dynamic-pages-created");
        $actual_page_name_english = $new_name.'-english.blade.php';
        $actual_page_name_english_without_ext = $new_name.'-english';
        $actual_page_name_marathi = $new_name.'-marathi.blade.php';
        $actual_page_name_marathi_without_ext = $new_name.'-marathi';
        $final_content_marathi = $request->marathi_description;
        $final_content_english = $request->english_description;
        $publish_date = $request->publish_date;
        $english_title = $request->english_title;
        $marathi_title = $request->marathi_title;
        $meta_data = $request->meta_data;

      
       
        $save = file_put_contents("./resources/views/admin/pages/dynamic-pages-created/{$actual_page_name_english}",$final_content_english);
        $save = file_put_contents("./resources/views/admin/pages/dynamic-pages-created/{$actual_page_name_marathi}",$final_content_marathi);

        savePageNameInMenu( $menu_selected[1], $menu_id, $new_name, 
                            $actual_page_name_marathi_without_ext, 
                            $actual_page_name_english_without_ext,
                            $menu_name, $publish_date,
                            $english_title,$marathi_title,$meta_data);

        return "ok";
    }

}
