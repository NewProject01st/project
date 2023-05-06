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

    public function addAll($request)
    {
        try {
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            
            $request->english_image->storeAs('public/images/dyanamicpage', $englishImageName);
            $request->marathi_image->storeAs('public/images/dyanamicpage', $marathiImageName);
    
            $organizationchart_data = new DynamicWebPages();
            $organizationchart_data->english_title = $request['english_title'];
            $organizationchart_data->marathi_title = $request['marathi_title'];
            $organizationchart_data->english_description = $request['english_description'];
            $organizationchart_data->marathi_title = $request['marathi_title'];
            $organizationchart_data->english_image = $englishImageName; // Save the image filename to the database
            $organizationchart_data->marathi_image = $marathiImageName; // Save the image filename to the database
            $organizationchart_data->save();       
         

            return $organizationchart_data;
        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }
    


// 	public function addAll($request) {
//     // dd(isset($request['order_no']) ? $request['order_no'] : 0 );
//     try {

//         if (!$request->hasFile('english_image') || !$request->hasFile('marathi_image')) {
//             throw new \Exception('English or Marathi image not found');
//         }

//         $englishImageName = time() . '_english.' . $request->english_image->extension();
//         $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
//         $request->english_image->storeAs('public/images/DynamicPage', $englishImageName);
//         $request->marathi_image->storeAs('public/images/DynamicPage', $marathiImageName);

//         $dynamic_page_data = new DynamicWebPages();
//         $dynamic_page_data->english_title = $request['english_title'];
//         $dynamic_page_data->marathi_title = $request['marathi_title'];
//         $dynamic_page_data->english_description = $request['english_description'];
//         $dynamic_page_data->marathi_description = $request['marathi_description'];
//         $dynamic_page_data->english_image = $englishImageName; // Save the image filename to the database
//         $dynamic_page_data->marathi_image = $marathiImageName; // Save the image filename to the database
//         $dynamic_page_data->save();       
     
//         // echo $dynamic_page_data;
//         // die();
//         return $dynamic_page_data;
//     } catch (\Exception $e) {
//         dd($e);
//         return [
//             'msg' => $e,
//             'status' => 'error'
//         ];
//     }
// }

public function getById($id)
{
    try {
        $main_menu_data = DynamicWebPages::find($id);
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


