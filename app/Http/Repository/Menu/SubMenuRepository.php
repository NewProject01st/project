<?php
namespace App\Http\Repository\Menu;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
	MainSubMenus,
    MainMenus
};


class SubMenuRepository  {
	public function getAll()
    {
        try {

            //return MainSubMenus::all();
            $main_menuses = MainSubMenus::join('main_menuses', 'main_menuses.id','=', 'main_sub_menuses.main_menu_id')
            ->select(
                'main_menuses.menu_name_marathi as menu_name_marathi_main', 
                'main_menuses.menu_name_english as menu_name_english_main', 
                'main_sub_menuses.menu_name_marathi',
                'main_sub_menuses.menu_name_english',
                )
            ->get();
            

             return $main_menuses;
            // return MainSubMenus::all();

        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request) {
    // dd(isset($request['order_no']) ? $request['order_no'] : 0 );
    try {
        $main_menu_data = new MainSubMenus();
        $main_menu_data->main_menu_id = $request['main_menu_id'];
        $main_menu_data->menu_name_marathi = $request['menu_name_marathi'];
        $main_menu_data->menu_name_english = $request['menu_name_english'];
        $main_menu_data->order_no = isset($request['order_no']) ? $request['order_no'] : 0 ;
        $main_menu_data->save();       
     
		return $main_menu_data;
    } catch (\Exception $e) {
        dd($e);
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $main_menu_data = MainSubMenus::find($id);
        // print_r($main_menu_data);
       // dd($main_menu_data);

        if ($main_menu_data) {
            return $main_menu_data;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id constitution history.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try { 
        $main_menu_data = MainSubMenus::find($request['edit_id']);
        $main_menu_data->menu_name_marathi = $request['menu_name_marathi'];
        $main_menu_data->menu_name_english = $request['menu_name_english'];
        $main_menu_data->order_no =  isset($request['order_no']) ? $request['order_no'] : 0 ;
        $main_menu_data->save();       
     
        return [
            'msg' => 'constitution history updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        dd($e);
        return [
            'msg' => 'Failed to update constitution history.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $main_menu_data = MainSubMenus::destroy($id);
        if ($main_menu_data) {
            return $main_menu_data;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete constitution history.',
            'status' => 'error'
        ];
    }
}

}


