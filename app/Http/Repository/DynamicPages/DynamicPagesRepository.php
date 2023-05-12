<?php
namespace App\Http\Repository\DynamicPages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
	DynamicWebPages,
    MainSubMenus
};


class DynamicPagesRepository  {
	public function getAll()
    {
        try {
            return DynamicWebPages::where('is_active',true)
                                    ->select('id','slug','menu_name','publish_date')
                                    ->get()
                                    ->toArray();
        } catch (\Exception $e) {
            return $e;
        }
    }


public function getById($id)
{
    try {
        $dynamic_page_data = DynamicWebPages::where('id','=',$id)
                            ->select('actual_page_name_marathi',
                                     'actual_page_name_english',
                                     'menu_type','publish_date'
                            )->first();

        if ($dynamic_page_data) {
            return $dynamic_page_data;
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

       
        $dynamic_page_data = DynamicWebPages::find($request['edit_id']);
        $dynamic_page_data->english_title = $request['english_title'];
        $dynamic_page_data->marathi_title = $request['marathi_title'];
        $dynamic_page_data->english_description = $request['english_description'];
        $dynamic_page_data->marathi_description = $request['marathi_description'];
        $dynamic_page_data->publish_date = $request['publish_date'];
        $dynamic_page_data->save();           
     
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

