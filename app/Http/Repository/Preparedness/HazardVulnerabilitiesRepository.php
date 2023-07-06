<?php
namespace App\Http\Repository\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	HazardVulnerability
};
use Config;

class HazardVulnerabilitiesRepository{
	public function getAll(){
        try {
            return HazardVulnerability::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
        
        $hazard_data = new HazardVulnerability();
        $hazard_data->english_title = $request['english_title'];
        $hazard_data->marathi_title = $request['marathi_title'];
        $hazard_data->english_description = $request['english_description'];
        $hazard_data->marathi_description = $request['marathi_description'];
        $hazard_data->save();       
              
        $last_insert_id = $hazard_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $hazard_data = HazardVulnerability::find($last_insert_id); // Assuming $request directly contains the ID
        $hazard_data->english_image = $englishImageName; // Save the image filename to the database
        $hazard_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $hazard_data->save();
        
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
        $hazard = HazardVulnerability::find($id);
        if ($hazard) {
            return $hazard;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Hazard and Vulnerability.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request){
    try {
        $return_data = array();
        $hazard_data = HazardVulnerability::find($request->id);
        
        if (!$hazard_data) {
            return [
                'msg' => 'Hazard and Vulnerability not found.',
                'status' => 'error'
            ];
        }
          //Store the previous image name
        $previousEnglishImage = $hazard_data->english_image;
        $previousMarathiImage = $hazard_data->marathi_image;

       
                
        $hazard_data->english_title = $request['english_title'];
        $hazard_data->marathi_title = $request['marathi_title'];
        $hazard_data->english_description = $request['english_description'];
        $hazard_data->marathi_description = $request['marathi_description'];
        $hazard_data->save();        
     
        $last_insert_id = $hazard_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Hazard Vulnerability.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id){
    try {
        $hazard = HazardVulnerability::find($id);
        if ($hazard) {
            removeImage(Config::get('DocumentConstant.HAZARD_VULNERABILITY_DELETE') . $hazard->english_image);
            removeImage(Config::get('DocumentConstant.HAZARD_VULNERABILITY_DELETE') . $hazard->marathi_image);

            // Delete the record from the database
            
            $hazard->delete();
            
            return $hazard;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}