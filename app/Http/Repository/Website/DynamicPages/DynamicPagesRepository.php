<?php
namespace App\Http\Repository\DynamicPages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
	DynamicWebPages
};


class DynamicPagesRepository  {
	public function getAll()
    {
        try {
            return DynamicWebPages::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

public function getById($id)
{
    try {
        $main_menu_data = DynamicWebPages::find($id);

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
        $main_menu_data = DynamicWebPages::find($request['edit_id']);
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
        $main_menu_data = DynamicWebPages::destroy($id);
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


