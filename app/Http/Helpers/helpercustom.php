<?php
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\ {
	MainMenus,
    MainSubMenus,
    DynamicWebPages,
    SocialIcon,
    WebsiteContact,
    PolicyPrivacy
};

function getIPAddress($req)
{
    return $req->ip();
}

function getLanguageSelected() {
    $language = '';
    if (Session::get('language') == 'mar') {
        $language = Session::get('language');
    } else {
        $language = 'en';
    }
    return $language;
}
function getRouteDetailsPresentOrNot($data_for_session) {
    $data =[];
    foreach ($data_for_session as $value_new) {
        array_push($data,$value_new['url']);
    }
    Session::put('data_for_url', $data);
    return $data;
}

function getPermissionForCRUDPresentOrNot($url,$data_for_session) {
    $data =[];
    if(session('role_id') =='1') {
        array_push($data,'per_add');
        array_push($data,'per_update');
        array_push($data,'per_delete');
    } else {
        foreach ($data_for_session as $value_new) {
        
            if($value_new['url'] == $url) {
                info($value_new);
                foreach ($value_new as $key => $value) {
                    info($value);
                    if($value == 1) {
                        array_push($data,$key);
                    }
                }
                // dd($data);
                return $data;
            }
        }
    }
    return $data;
}


function getSocialIcon() {
    $socialicon_data = array();
    $socialicon_data =  SocialIcon::where('is_active', '=',true)
                        ->select( 
                            'social_icons.url', 
                            'social_icons.icon',
                            'social_icons.id',
                        )
                        ->get()
                        ->toArray();
                        // dd($socialicon_data);

                        return $socialicon_data ;
                        
}
function getMenuItems() {

    $menu_data = array();
    $main_menu_data =  MainMenus::where('is_active', '=',true)
                        ->select( 
                            'main_menuses.menu_name_marathi', 
                            'main_menuses.menu_name_english',
                            'main_menuses.id',
                            'main_menuses.url', 
                            'main_menuses.is_static', 
                        )
                        ->get()
                        ->toArray();
    foreach($main_menu_data as $key=>$main_menu_data_all) {
        $subMenus ='';
        $menu_data_raw = array();
        array_push($menu_data_raw,$main_menu_data_all);
        $subMenus  = MainSubMenus::where('main_menu_id', '=',$main_menu_data_all['id'])
                                    ->where('is_active', '=',true)
                                    ->select( 
                                        'main_sub_menuses.main_menu_id',
                                        'main_sub_menuses.menu_name_marathi',
                                        'main_sub_menuses.menu_name_english',
                                        'main_sub_menuses.url', 
                                        'main_sub_menuses.is_static', 
                                    )
                                    ->get()
                                    ->toArray();
        array_push($menu_data_raw,$subMenus);
        array_push($menu_data,$menu_data_raw);
        
    }
    return $menu_data ;
    
                
}

function getMenuItemsForDynamicPageAdd() {


    $menu_data = array();
    $main_menu_data =  MainMenus::where('main_menuses.is_static', '=',false)
                                ->where('is_active', '=',true)
                                ->select( 
                                    'main_menuses.menu_name_marathi', 
                                    'main_menuses.menu_name_english',
                                    'main_menuses.url as main_menu_url',
                                    'main_menuses.id as menu_id',
                                    'main_menuses.is_static as main_menu_static',
                                    'main_menuses.main_sub'
                                )
                                ->get()
                                ->toArray();
        
                        
        $subMenus  = MainSubMenus::where('main_sub_menuses.is_static', '=',false)
                                    ->where('is_active', '=',true)
                                    ->select( 
                                        'main_sub_menuses.id as menu_id',
                                        'main_sub_menuses.menu_name_marathi',
                                        'main_sub_menuses.menu_name_english',
                                        'main_sub_menuses.url as sub_menu_url', 
                                        'main_sub_menuses.is_static as sub_menu_static', 
                                        'main_sub_menuses.main_sub'
                                    )
                                    ->get()
                                    ->toArray();
      
                                    $menu_data = array_merge($main_menu_data, $subMenus);
    return $menu_data ;
    
                
}

function savePageNameInMenu($main_sub, $id, $url, $actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date,$english_title,$marathi_title,$meta_data) {


    if($main_sub =='main') {
        $main_menu_data =  MainMenus::where('id', '=', $id)
                                    ->update([ 
                                        'url'=> $url,
                                        'is_static'=> false
                                    ]);

        
        addOrUpdateDynamicWebPages($main_sub, $id, $url, $actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date,$english_title,$marathi_title,$meta_data);
            
    } else {
        $subMenus  = MainSubMenus::where('id', '=', $id)
                                    ->update([ 
                                        'url'=> $url,
                                        'is_static'=> false
                                    ]);

        addOrUpdateDynamicWebPages($main_sub, $id, $url, $actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date,$english_title,$marathi_title,$meta_data);
                                   
    }
    return 'ok';
}

function addOrUpdateDynamicWebPages($main_sub,$id,$url,$actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date,$english_title,$marathi_title,$meta_data) {

        $dynamic_web_page_name = DynamicWebPages::where('is_active',true)
                                                ->where('menu_id',$id)
                                                ->where('menu_type',$main_sub)
                                                ->first();
        if($dynamic_web_page_name) {
            $dynamic_web_page_name = DynamicWebPages::where('is_active',true)
                                                    ->where('menu_id',$id)
                                                    ->where('menu_type',$main_sub)

                                                    ->update([
                                                                'slug'=> $url,
                                                                'actual_page_name_marathi'=> $actual_page_name_marathi,
                                                                'actual_page_name_english'=> $actual_page_name_english,
                                                                'menu_name' =>$menu_name,
                                                                'publish_date' =>$publish_date,
                                                                'english_title' =>$english_title,
                                                                'marathi_title' =>$marathi_title,
                                                                'meta_data' =>$meta_data,
                                                            ]);
        } else {
            $data_for_insert = [
                'slug'=> $url,
                'actual_page_name_marathi'=> $actual_page_name_marathi,
                'actual_page_name_english'=> $actual_page_name_english,
                'menu_name' => $menu_name,
                'menu_id' => $id,
                'publish_date' => $publish_date,
                'english_title' =>$english_title,
                'marathi_title' =>$marathi_title,
                'meta_data' =>$meta_data,
            ];

            if($main_sub =='main') { 
                $data_for_insert['menu_type']= 'main';     
            } else {
                $data_for_insert['menu_type']= 'sub';   
            }

            $dynamic_web_page_name = DynamicWebPages::insert($data_for_insert);
        }
}

function getMenuItemsDynamicPageDetailsById($id) {


    return  DynamicWebPages::where('is_active',true)
                                ->where('id',$id)
                                ->select( 
                                    'id',
                                    'menu_type',
                                    'menu_id',
                                    'menu_name',
                                    'slug',
                                    'actual_page_name_marathi',
                                    'actual_page_name_english',
                                    'publish_date',
                                )
                                ->first();
        
                        
       
                
}


function uploadImage($request, $image_name, $path, $name) {

    if (!file_exists(storage_path().$path)) {
        File::makeDirectory(storage_path().'/'.$path,0777,true);
    }
    if($request->$image_name !== null) {
        $base64_encoded = base64_encode(file_get_contents($request->$image_name)); 
        $base64_decoded_content = base64_decode($base64_encoded);
        $path2 = storage_path().$path.$name;
        file_put_contents($path2, $base64_decoded_content);
    }
}

function getTempratureFromAPI() {
    $url = env('TEMPRATURE_API_URL');
    $result  =file_get_contents($url);
    $data_for_wheather = json_decode($result, true);
    $temprature = $data_for_wheather['currentConditions']['temp'];
    return $temprature;
}

function getTempratureData() {
    // $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

    // // $data = Wheather::where('id','1')
    // //                 ->get()->toArray();
    // // $last_update = $data['last_updated'];   
    // $current_date = $date->format('d-m-Y H:i:s'); 
    // // dd($current_date);
    // $db_date = "15-06-2023 13:00:01";
    // $current_date = "15-06-2023 14:05:16";
    // if(strtotime($db_date) < strtotime($current_date)) {
    //     dd("in if");
       
    // } else {
    //     dd("in else ");
    //     getTemprature();
    // }
    return '32';//getTempratureFromAPI();

}


// ==============
function getMenuForSearch(Request $request) {
  
    $query = $request->input('query');
    $menu_data_search = array();
    $main_menu_data = MainMenus::where('is_active', true)
        ->where(function ($queryBuilder) use ($query) {
            if ($query) {
                $queryBuilder->where('menu_name_marathi', 'like', '%' . $query . '%')
                    ->orWhere('menu_name_english', 'like', '%' . $query . '%');
            }
        })
        ->select(
            'main_menuses.menu_name_marathi',
            'main_menuses.menu_name_english',
            'main_menuses.id',
            'main_menuses.url',
            'main_menuses.is_static',
        )
        ->get()
        ->toArray();
  
    // Rest of the code remains the same...
    
    return $menu_data_search;
}




















