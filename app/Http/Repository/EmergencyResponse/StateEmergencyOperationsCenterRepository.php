<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	StateEmergencyOperationsCenter
};
use Config;

class StateEmergencyOperationsCenterRepository  {
	public function getAll(){
        try {
            return StateEmergencyOperationsCenter::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
        
        $stateemergencyoperationscenter_data = new StateEmergencyOperationsCenter();
        $stateemergencyoperationscenter_data->english_title = $request['english_title'];
        $stateemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $stateemergencyoperationscenter_data->english_description = $request['english_description'];
        $stateemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        $stateemergencyoperationscenter_data->save();       
    
        $last_insert_id = $stateemergencyoperationscenter_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $stateemergencyoperationscenter_data = StateEmergencyOperationsCenter::find($last_insert_id); // Assuming $request directly contains the ID
        $stateemergencyoperationscenter_data->english_image = $englishImageName; // Save the image filename to the database
        $stateemergencyoperationscenter_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $stateemergencyoperationscenter_data->save();

        return $last_insert_id;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id){
    try {
        $stateemergencyoperationscenter = StateEmergencyOperationsCenter::find($id);
        if ($stateemergencyoperationscenter) {
            return $stateemergencyoperationscenter;
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
public function updateAll($request){
   
    try {
        $return_data = array();
        $stateemergencyoperationscenter_data = StateEmergencyOperationsCenter::find($request->id);
        
        if (!$stateemergencyoperationscenter_data) {
            return [
                'msg' => 'State Emergency Operations Center not found.',
                'status' => 'error'
            ];
        }
        
        
        //Store the previous image name
        $previousEnglishImage = $stateemergencyoperationscenter_data->english_image;
        $previousMarathiImage = $stateemergencyoperationscenter_data->marathi_image;
  


        $stateemergencyoperationscenter_data = StateEmergencyOperationsCenter::find($request->id);
        $stateemergencyoperationscenter_data->english_title = $request['english_title'];
        $stateemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $stateemergencyoperationscenter_data->english_description = $request['english_description'];
        $stateemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        $stateemergencyoperationscenter_data->save();       
     
      
        $last_insert_id = $stateemergencyoperationscenter_data->id;

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

public function deleteById($id){
    try {
        $stateemergencyoperationscenter = StateEmergencyOperationsCenter::find($id);
        if ($stateemergencyoperationscenter) {
            removeImage(Config::get('DocumentConstant.STATE_OPERATION_CENTER_DELETE') . $stateemergencyoperationscenter->english_image);
            removeImage(Config::get('DocumentConstant.STATE_OPERATION_CENTER_DELETE') . $stateemergencyoperationscenter->marathi_image);
            // Delete the record from the database
            $stateemergencyoperationscenter->delete();
            
            return $stateemergencyoperationscenter;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}