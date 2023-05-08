<?php
namespace App\Http\Repository\AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementPortal
};

class DisasterManagementPortalRepository  {
	public function getAll()
    {
        try {
            return DisasterManagementPortal::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/disaster-management-portal', $englishImageName);
        $request->marathi_image->storeAs('public/images/disaster-management-portal', $marathiImageName);

        $statedisastermanagementauthority_data = new DisasterManagementPortal();
        $statedisastermanagementauthority_data->english_title = $request['english_title'];
        $statedisastermanagementauthority_data->marathi_title = $request['marathi_title'];
        $statedisastermanagementauthority_data->english_image = $englishImageName; // Save the image filename to the database
        $statedisastermanagementauthority_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $statedisastermanagementauthority_data->save();       
     
        return $statedisastermanagementauthority_data;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}







// 	public function addAll($request)
// {
//     try {
//         $englishImageName = time() . '_english.' . $request->english_image->extension();
//         $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
//         $request->english_image->storeAs('public/images/disaster-management-portal', $englishImageName);
//         $request->marathi_image->storeAs('public/images/disaster-management-portal', $marathiImageName);

//         $disastermanagementportal_data = new DisasterManagementPortal();
//         $disastermanagementportal_data->english_title = $request['english_title'];
//         $disastermanagementportal_data->marathi_title = $request['marathi_title'];
//         $disastermanagementportal_data->english_description = $request['english_description'];
//         $disastermanagementportal_data->marathi_description = $request['marathi_description'];
//         $disastermanagementportal_data->english_image = $englishImageName; // Save the image filename to the database
//         $disastermanagementportal_data->marathi_image = $marathiImageName; // Save the image filename to the database
//         $disastermanagementportal_data->save();       
     
// 		return $disastermanagementportal_data;
//     } catch (\Exception $e) {
//         return [
//             'msg' => $e,
//             'status' => 'error'
//         ];
//     }
// }

public function getById($id)
{
    try {
        $disastermanagementportal = DisasterManagementPortal::find($id);
        if ($disastermanagementportal) {
            return $disastermanagementportal;
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
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/disaster-management-portal', $englishImageName);
        $request->marathi_image->storeAs('public/images/disaster-management-portal', $marathiImageName);

        $disastermanagementportal_data = DisasterManagementPortal::find($request->id);
        $disastermanagementportal_data->english_title = $request['english_title'];
        $disastermanagementportal_data->marathi_title = $request['marathi_title'];
        $disastermanagementportal_data->english_description = $request['english_description'];
        $disastermanagementportal_data->marathi_description = $request['marathi_description'];
        $disastermanagementportal_data->english_image = $englishImageName; // Save the image filename to the database
        $disastermanagementportal_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $disastermanagementportal_data->save();       
     
        return [
            'msg' => 'disaster management portal updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update disaster management portal.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $disastermanagementportal = DisasterManagementPortal::destroy($id);
        if ($disastermanagementportal) {
            return $disastermanagementportal;
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


