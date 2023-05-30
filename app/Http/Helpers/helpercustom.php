<?php
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\ {
	MainMenus,
    MainSubMenus,
    DynamicWebPages,
    SocialIcon
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
function getRouteDetailsPresentOrNot($data_to_search,$data_for_session) {
    foreach ($data_for_session as $key => $value) {
        foreach ($value as $key => $value_new) {
            if ($key == 'route_name' && $value_new == $data_to_search) {
                return true;
            } 
        }
    }
    return false;
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
function getSubHeaderInfo() {
    $subheaderinfo_data = array();
    $subheaderinfo_data =  SubHeaderInfo::where('is_active', '=',true)
                        ->select( 
                            'sub_header_infos.logo', 
                            'sub_header_infos.english_tollfree_no',
                            'sub_header_infos.marathi_tollfree_no',
                            'sub_header_infos.english_city',
                            'sub_header_infos.marathi_city',
                            'sub_header_infos.id',
                        )
                        ->get()
                        ->toArray();
                        // dd($subheaderinfo_data);

                        return $subheaderinfo_data ;
                        
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

function savePageNameInMenu($main_sub, $id, $url, $actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date) {


    if($main_sub =='main') {
        $main_menu_data =  MainMenus::where('id', '=', $id)
                                    ->update([ 
                                        'url'=> $url,
                                        'is_static'=> false
                                    ]);

        
        addOrUpdateDynamicWebPages($main_sub, $id, $url, $actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date);
            
    } else {
        $subMenus  = MainSubMenus::where('id', '=', $id)
                                    ->update([ 
                                        'url'=> $url,
                                        'is_static'=> false
                                    ]);

        addOrUpdateDynamicWebPages($main_sub, $id, $url, $actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date);
                                   
    }
    return 'ok';
}

function addOrUpdateDynamicWebPages($main_sub,$id,$url,$actual_page_name_marathi, $actual_page_name_english, $menu_name, $publish_date) {

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
                                                                'publish_date' =>$publish_date
                                                            ]);
        } else {
            $data_for_insert = [
                'slug'=> $url,
                'actual_page_name_marathi'=> $actual_page_name_marathi,
                'actual_page_name_english'=> $actual_page_name_english,
                'menu_name' => $menu_name,
                'menu_id' => $id,
                'publish_date' => $publish_date,
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





