<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ReportIncidentCrowdsourcing
};
use Config;

class ReportIncidentCrowdsourcingRepository{
	public function getAll(){
        try {
            return ReportIncidentCrowdsourcing::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
       
        $crowdsourcing_data = new ReportIncidentCrowdsourcing();
        $crowdsourcing_data->english_title = $request['english_title'];
        $crowdsourcing_data->marathi_title = $request['marathi_title'];
        $crowdsourcing_data->english_description = $request['english_description'];
        $crowdsourcing_data->marathi_description = $request['marathi_description'];
        $crowdsourcing_data->save();       
                      
		$last_insert_id = $crowdsourcing_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $crowdsourcing_data = ReportIncidentCrowdsourcing::find($last_insert_id); // Assuming $request directly contains the ID
        $crowdsourcing_data->english_image = $englishImageName; // Save the image filename to the database
        $crowdsourcing_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $crowdsourcing_data->save();
        
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
        $crowdsourcing = ReportIncidentCrowdsourcing::find($id);
        if ($crowdsourcing) {
            return $crowdsourcing;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Incidient Crowdsourcing.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request){
    try {
        $return_data = array();
        $crowdsourcing_data = ReportIncidentCrowdsourcing::find($request->id);

        if (!$crowdsourcing_data) {
            return [
                'msg' => 'Report Incident Crowdsourcing not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $crowdsourcing_data->english_image;
        $previousMarathiImage = $crowdsourcing_data->marathi_image;

        // Update the fields from the request
        $crowdsourcing_data->english_title = $request['english_title'];
        $crowdsourcing_data->marathi_title = $request['marathi_title'];
        $crowdsourcing_data->english_description = $request['english_description'];
        $crowdsourcing_data->marathi_description = $request['marathi_description'];
        $crowdsourcing_data->save();
 
        $last_insert_id = $crowdsourcing_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Report Incident Crowdsourcing.',
            'status' => 'error',
            'error' => $e->getMessage() // Return the error message for debugging purposes
        ];
    }
}

public function deleteById($id){
    try {
        $crowdsourcing = ReportIncidentCrowdsourcing::find($id);
        if ($crowdsourcing) {
            unlink(storage_path(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_DELETE') . $crowdsourcing->english_image));
            unlink(storage_path(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_DELETE') . $crowdsourcing->marathi_image));
            // Delete the record from the database
            
            $crowdsourcing->delete();
            
            return $crowdsourcing;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}