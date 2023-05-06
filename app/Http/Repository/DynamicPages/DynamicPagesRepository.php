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
            return DynamicWebPages::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

    // public function getAll()
    // {
    //     try {

    //         //return MainSubMenus::all();
    //         $main_menuses = MainSubMenus::join('main_menuses', 'main_menuses.id','=', 'dynamic_web_pages.main_menu_id')
    //         ->select(
    //             'main_menuses.menu_name_marathi as menu_name_marathi_main', 
    //             'main_menuses.menu_name_english as menu_name_english_main', 
    //             'dynamic_web_pages.english_title',
    //             'dynamic_web_pages.marathi_title',
    //             'dynamic_web_pages.english_description',
    //             'dynamic_web_pages.marathi_description',
    //             'dynamic_web_pages.id',
    //             )
    //         ->get();
    //          return $main_menuses;
    //         // return MainSubMenus::all();

    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }

    public function addAll($request)
    {
        try {
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            
            $request->english_image->storeAs('public/images/dyanamicpage', $englishImageName);
            $request->marathi_image->storeAs('public/images/dyanamicpage', $marathiImageName);
    
            $dynamic_page_data = new DynamicWebPages();
            $dynamic_page_data->english_title = $request['english_title'];
            $dynamic_page_data->marathi_title = $request['marathi_title'];
            $dynamic_page_data->english_description = $request['english_description'];
            $dynamic_page_data->marathi_title = $request['marathi_title'];
            $dynamic_page_data->english_image = $englishImageName; // Save the image filename to the database
            $dynamic_page_data->marathi_image = $marathiImageName; // Save the image filename to the database
            $dynamic_page_data->save();       
         

            return $dynamic_page_data;
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

        // $englishImageName = time() . '_english.' . $request->english_image->extension();
        // $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        // $request->english_image->storeAs('public/images/dyanamicpage', $englishImageName);
        // $request->marathi_image->storeAs('public/images/dyanamicpage', $marathiImageName);
        $dynamic_page_data = DynamicWebPages::find($request['edit_id']);
        $dynamic_page_data->english_title = $request['english_title'];
        $dynamic_page_data->marathi_title = $request['marathi_title'];
        $dynamic_page_data->english_description = $request['english_description'];
        $dynamic_page_data->marathi_title = $request['marathi_title'];
        // $dynamic_page_data->english_image = $englishImageName; // Save the image filename to the database
        // $dynamic_page_data->marathi_image = $marathiImageName; // Save the image filename to the database
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


