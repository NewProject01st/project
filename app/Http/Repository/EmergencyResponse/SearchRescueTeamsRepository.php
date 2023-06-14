<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	SearchRescueTeams
};
use Config;

class SearchRescueTeamsRepository  {
	public function getAll(){
        try {
            return SearchRescueTeams::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
        
        $searchrescueteams_data = new SearchRescueTeams();
        $searchrescueteams_data->english_title = $request['english_title'];
        $searchrescueteams_data->marathi_title = $request['marathi_title'];
        $searchrescueteams_data->english_description = $request['english_description'];
        $searchrescueteams_data->marathi_description = $request['marathi_description'];
        $searchrescueteams_data->save();       
     
        $last_insert_id = $searchrescueteams_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $searchrescueteams_data = SearchRescueTeams::find($last_insert_id); // Assuming $request directly contains the ID
        $searchrescueteams_data->english_image = $englishImageName; // Save the image filename to the database
        $searchrescueteams_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $searchrescueteams_data->save();

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
        $searchrescueteams = SearchRescueTeams::find($id);
        if ($searchrescueteams) {
            return $searchrescueteams;
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
        $searchrescueteams_data = SearchRescueTeams::find($request->id);
        
        if (!$searchrescueteams_data) {
            return [
                'msg' => 'Relief Measures Resources not found.',
                'status' => 'error'
            ];
        }
        
         
        //Store the previous image name
        $previousEnglishImage = $searchrescueteams_data->english_image;
        $previousMarathiImage = $searchrescueteams_data->marathi_image;
  


        $searchrescueteams_data = SearchRescueTeams::find($request->id);
        $searchrescueteams_data->english_title = $request['english_title'];
        $searchrescueteams_data->marathi_title = $request['marathi_title'];
        $searchrescueteams_data->english_description = $request['english_description'];
        $searchrescueteams_data->marathi_description = $request['marathi_description'];
        $searchrescueteams_data->save();       
     
        $last_insert_id = $searchrescueteams_data->id;

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
        $searchrescueteams = SearchRescueTeams::find($id);
        if ($searchrescueteams) {
            unlink(storage_path(Config::get('DocumentConstant.SEARCH_RESCUE_TEAM_DELETE') . $searchrescueteams->english_image));
            unlink(storage_path(Config::get('DocumentConstant.SEARCH_RESCUE_TEAM_DELETE') . $searchrescueteams->marathi_image));
            // Delete the record from the database
            $searchrescueteams->delete();
            
            return $searchrescueteams;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}