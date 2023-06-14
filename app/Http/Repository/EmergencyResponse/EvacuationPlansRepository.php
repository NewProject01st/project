<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	EvacuationPlans
};
use Config;

class EvacuationPlansRepository  {
	public function getAll(){
        try {
            return EvacuationPlans::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
        $evacuationplans_data = new EvacuationPlans();
        $evacuationplans_data->english_title = $request['english_title'];
        $evacuationplans_data->marathi_title = $request['marathi_title'];
        $evacuationplans_data->english_description = $request['english_description'];
        $evacuationplans_data->marathi_description = $request['marathi_description'];
        $evacuationplans_data->save();       
     
        $last_insert_id = $evacuationplans_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $evacuationplans_data = EvacuationPlans::find($last_insert_id); // Assuming $request directly contains the ID
        $evacuationplans_data->english_image = $englishImageName; // Save the image filename to the database
        $evacuationplans_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $evacuationplans_data->save();

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
        $statedisastermanagementauthority = EvacuationPlans::find($id);
        if ($statedisastermanagementauthority) {
            return $statedisastermanagementauthority;
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
        $evacuationplans_data = EvacuationPlans::find($request->id);
        
        if (!$evacuationplans_data) {
            return [
                'msg' => 'State Disaster Management Authority not found.',
                'status' => 'error'
            ];
        }
         
        //Store the previous image name
        $previousEnglishImage = $evacuationplans_data->english_image;
        $previousMarathiImage = $evacuationplans_data->marathi_image;
  


        $evacuationplans_data = EvacuationPlans::find($request->id);
        $evacuationplans_data->english_title = $request['english_title'];
        $evacuationplans_data->marathi_title = $request['marathi_title'];
        $evacuationplans_data->english_description = $request['english_description'];
        $evacuationplans_data->marathi_description = $request['marathi_description'];
        $evacuationplans_data->save();       
     
        $last_insert_id = $evacuationplans_data->id;

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
        $evacuationplans = EvacuationPlans::find($id);
        if ($evacuationplans) {
            unlink(storage_path(Config::get('DocumentConstant.EVACUATION_PLAN_DELETE') . $evacuationplans->english_image));
            unlink(storage_path(Config::get('DocumentConstant.EVACUATION_PLAN_DELETE') . $evacuationplans->marathi_image));
            // Delete the record from the database
            $evacuationplans->delete();
            
            return $evacuationplans;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}