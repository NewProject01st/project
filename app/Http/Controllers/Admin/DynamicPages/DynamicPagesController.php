<?php

namespace App\Http\Controllers\Admin\DynamicPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\DynamicPages\DynamicPagesServices;
use Validator;
use App\Models\ {
	DynamicWebPages,
    MainMenus
};
use Config;
use Illuminate\Support\Facades\Storage;
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
                'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'marathi_title' => 'required|max:255',
                'meta_data' => 'required|max:255',
                'publish_date' => 'required',  
                ];
            $messages = [   
                'menu_data.required' => 'Please select menu.',
                'marathi_description.required' => 'Please  enter english page content.',
                'english_description.required' => 'Please enter marathi page content.',
                'english_title.required'=>'Please enter title.',
                'english_title.regex' => 'Please  enter text only.',
                'english_title.max'   => 'Please  enter text length upto 255 character only.',
                'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
                'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
                'meta_data.required' => 'Please content of meta data.',
                'meta_data.max'   => 'Please  enter meta data length upto 255 character only.',  
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
        $html_marathi = $dynamic_page->page_content_marathi;
        $html_english = $dynamic_page->page_content_english;
        return view('admin.pages.dynamic-pages.edit-page', compact('html_marathi', 'html_english', 'edit_data_id', 'get_publish_date','dynamic_page','main_menu_data','menu_selected'));
    }
    public function update(Request $request) {
       
        try {
           
            $rules = [
                'menu_data' => 'required',
                'marathi_description' => 'required',
                'english_description' => 'required',
                'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
                'marathi_title' => 'required|max:255',
                'meta_data' => 'required|max:255',
                'publish_date' => 'required',  
                ];
            $messages = [   
                'menu_data.required' => 'Please select menu.',
                'marathi_description.required' => 'Please  enter english page content.',
                'english_description.required' => 'Please enter marathi page content.',
                'english_title.required'=>'Please enter title.',
                'english_title.regex' => 'Please  enter text only.',
                'english_title.max'   => 'Please  enter text length upto 255 character only.',
                'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
                'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
                'meta_data.required' => 'Please content of meta data.',
                'meta_data.max'   => 'Please  enter meta data length upto 255 character only.',  
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

        $final_content_marathi = $request->marathi_description;
        $final_content_english = $request->english_description;
        $publish_date = $request->publish_date;
        $english_title = $request->english_title;
        $marathi_title = $request->marathi_title;
        $meta_data = $request->meta_data;

        $final_content_english = new \DOMDocument();
        $list=array();
        $final_content_english->loadHTML($request->english_description);
        $elements = $final_content_english->getElementsByTagName('*');

        foreach ($elements as $tag_element) {
            if ($tag_element->nodeName =='img') {
                $srcStr = $tag_element->getAttribute('src');
                if(str_contains($srcStr, env('AWS_FILE_VIEW')) != true) {
                    $image_parts = explode(";base64,", $srcStr);
                    $image_base64 = base64_decode($image_parts[1]);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    if(count($image_type_aux)>1) {
                        $image_type = $image_type_aux[1];
                    } else {
                        $image_type_aux = explode("data:application/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                    }
                    // Create a new filename for the image
                    $path =  Config::get('DocumentConstant.DYNAMIC_PAGE_DOC_ADD');
                    
                    $file_name = $path.$menu_selected[0].'_'.$menu_selected[1].'_'.time().'.'.$image_type;

                    Storage::disk('s3')->put($file_name, $image_base64);
                    Storage::disk('s3')->url($file_name);
                    $imgUrl = Config::get('DocumentConstant.DYNAMIC_PAGE_DOC_VIEW').$file_name;
                    $tag_element->setAttribute('src', $imgUrl);
                    $tag_element->setAttribute('data-original-filename', $tag_element->getAttribute('data-filename'));
                    $tag_element->removeAttribute('data-filename');
                    
                }
            }
        }
        $final_content_english = $final_content_english->saveHTML();

        // Marathi content
        $final_content_marathi = new \DOMDocument();
        $list=array();
        $final_content_marathi->loadHTML('<?xml encoding="utf-8" ?>' . $request->marathi_description);
        $elements = $final_content_marathi->getElementsByTagName('*');
        foreach ($elements as $tag_element) {
            if ($tag_element->nodeName =='img') {
                $srcStr = $tag_element->getAttribute('src');
                if(str_contains($srcStr, env('AWS_FILE_VIEW')) != true) {
                    $image_parts = explode(";base64,", $srcStr);
                    $image_base64 = base64_decode($image_parts[1]);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    if(count($image_type_aux)>1) {
                        $image_type = $image_type_aux[1];
                    } else {
                        $image_type_aux = explode("data:application/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                    }
                    // Create a new filename for the image
                    $path =  Config::get('DocumentConstant.DYNAMIC_PAGE_DOC_ADD');
                    $file_name = $path.$menu_selected[0].'_'.$menu_selected[1].'_'.time().'.'.$image_type;
                    Storage::disk('s3')->put($file_name, $image_base64);
                    Storage::disk('s3')->url($file_name);
                    $imgUrl = Config::get('DocumentConstant.DYNAMIC_PAGE_DOC_VIEW').$file_name;
                    $tag_element->setAttribute('src', $imgUrl);
                    $tag_element->setAttribute('data-original-filename', $tag_element->getAttribute('data-filename'));
                    $tag_element->removeAttribute('data-filename');
                    
                }
            }
        }
        $final_content_marathi = $final_content_marathi->saveHTML();
       
        savePageNameInMenu( $menu_selected[1], $menu_id, $new_name, 
                            $menu_name, $publish_date,
                            $english_title,$marathi_title,$meta_data, 
                            $final_content_english, $final_content_marathi);

        return "ok";
    }

}