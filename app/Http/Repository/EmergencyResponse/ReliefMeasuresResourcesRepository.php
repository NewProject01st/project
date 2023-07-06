<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ReliefMeasuresResources
};
use Config;

class ReliefMeasuresResourcesRepository  {
	public function getAll(){
        try {
            return ReliefMeasuresResources::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
       
        $reliefmeasuresresources_data = new ReliefMeasuresResources();
        $reliefmeasuresresources_data->english_title = $request['english_title'];
        $reliefmeasuresresources_data->marathi_title = $request['marathi_title'];
        $reliefmeasuresresources_data->english_description = $request['english_description'];
        $reliefmeasuresresources_data->marathi_description = $request['marathi_description'];
        $reliefmeasuresresources_data->save();       
        
        $last_insert_id = $reliefmeasuresresources_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $reliefmeasuresresources_data = ReliefMeasuresResources::find($last_insert_id); // Assuming $request directly contains the ID
        $reliefmeasuresresources_data->english_image = $englishImageName; // Save the image filename to the database
        $reliefmeasuresresources_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $reliefmeasuresresources_data->save();

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
        $reliefmeasuresresources = ReliefMeasuresResources::find($id);
        if ($reliefmeasuresresources) {
            return $reliefmeasuresresources;
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
        $reliefmeasuresresources_data = ReliefMeasuresResources::find($request->id);
        
        if (!$reliefmeasuresresources_data) {
            return [
                'msg' => 'Relief Measures Resources not found.',
                'status' => 'error'
            ];
        }
        
         
        //Store the previous image name
        $previousEnglishImage = $reliefmeasuresresources_data->english_image;
        $previousMarathiImage = $reliefmeasuresresources_data->marathi_image;
  

        $reliefmeasuresresources_data = ReliefMeasuresResources::find($request->id);
        $reliefmeasuresresources_data->english_title = $request['english_title'];
        $reliefmeasuresresources_data->marathi_title = $request['marathi_title'];
        $reliefmeasuresresources_data->english_description = $request['english_description'];
        $reliefmeasuresresources_data->marathi_description = $request['marathi_description'];
        $reliefmeasuresresources_data->save();       
     
        $last_insert_id = $reliefmeasuresresources_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update ReliefMeasures Resources.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id){
    try {
        $reliefmeasuresresources = ReliefMeasuresResources::find($id);
        if ($reliefmeasuresresources) {
            removeImage(Config::get('DocumentConstant.RELIEF_MEASURES_RESOURCES_DELETE') . $reliefmeasuresresources->english_image);
            removeImage(Config::get('DocumentConstant.RELIEF_MEASURES_RESOURCES_DELETE') . $reliefmeasuresresources->marathi_image);
            // Delete the record from the database
            $reliefmeasuresresources->delete();
            
            return $reliefmeasuresresources;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}