<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DistrictEmergencyOperationsCenter
};
use Config;

class DistrictEmergencyOperationsCenterRepository  {
	public function getAll()
    {
        try {
            return DistrictEmergencyOperationsCenter::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $districtemergencyoperationscenter_data = new DistrictEmergencyOperationsCenter();
        $districtemergencyoperationscenter_data->english_title = $request['english_title'];
        $districtemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $districtemergencyoperationscenter_data->english_description = $request['english_description'];
        $districtemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        $districtemergencyoperationscenter_data->save();       
    // dd($districtemergencyoperationscenter_data);
        $last_insert_id = $districtemergencyoperationscenter_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $districtemergencyoperationscenter_data = DistrictEmergencyOperationsCenter::find($last_insert_id); // Assuming $request directly contains the ID
        $districtemergencyoperationscenter_data->english_image = $englishImageName; // Save the image filename to the database
        $districtemergencyoperationscenter_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $districtemergencyoperationscenter_data->save();
        
        return $last_insert_id;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $districtemergencyoperationscenter = DistrictEmergencyOperationsCenter::find($id);
        if ($districtemergencyoperationscenter) {
            return $districtemergencyoperationscenter;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Organization Chart.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
   
    try {
        $return_data = array();
        $districtemergencyoperationscenter_data = DistrictEmergencyOperationsCenter::find($request->id);
        
        if (!$districtemergencyoperationscenter_data) {
            return [
                'msg' => 'State Emergency Operations Center not found.',
                'status' => 'error'
            ];
        }
        
        //Store the previous image name
        $previousEnglishImage = $districtemergencyoperationscenter_data->english_image;
        $previousMarathiImage = $districtemergencyoperationscenter_data->marathi_image;
  

        $districtemergencyoperationscenter_data->english_title = $request['english_title'];
        $districtemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $districtemergencyoperationscenter_data->english_description = $request['english_description'];
        $districtemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        $districtemergencyoperationscenter_data->save();       
     
        $last_insert_id = $districtemergencyoperationscenter_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Organization Chart.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $districtemergencyoperationscenter = DistrictEmergencyOperationsCenter::find($id);
        if ($districtemergencyoperationscenter) {
            unlink(storage_path(Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_DELETE') . $districtemergencyoperationscenter->english_image));
            unlink(storage_path(Config::get('DocumentConstant.DISTRICT_OPERATION_CENTER_DELETE') . $districtemergencyoperationscenter->marathi_image));
            // Delete the record from the database
            $districtemergencyoperationscenter->delete();
            
            return $districtemergencyoperationscenter;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}