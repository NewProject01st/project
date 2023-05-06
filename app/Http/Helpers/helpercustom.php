<?php
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\ {
	MainMenus,
    MainSubMenus
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

function getMenuItems() {

    $menu_data = array();
    $main_menu_data =  MainMenus::where('is_active', '=',true)
                        ->select( 
                            'menu_name_marathi', 
                            'menu_name_english',
                            'url',
                            'id'
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



