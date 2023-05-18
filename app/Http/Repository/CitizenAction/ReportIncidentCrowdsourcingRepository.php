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

class ReportIncidentCrowdsourcingRepository{
	public function getAll()
    {
        try {
            return ReportIncidentCrowdsourcing::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/citizen-action', $englishImageName);
        $request->marathi_image->storeAs('public/images/citizen-action', $marathiImageName);

        
        $crowdsourcing_data = new ReportIncidentCrowdsourcing();
        $crowdsourcing_data->english_title = $request['english_title'];
        $crowdsourcing_data->marathi_title = $request['marathi_title'];
        $crowdsourcing_data->english_description = $request['english_description'];
        $crowdsourcing_data->marathi_description = $request['marathi_description'];
        $crowdsourcing_data->english_image = $englishImageName;
        $crowdsourcing_data->marathi_image =   $marathiImageName;
        $crowdsourcing_data->save();       
              
		return $crowdsourcing_data;

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
public function updateAll($request)
{
    try {
        $crowdsourcing_data = ReportIncidentCrowdsourcing::find($request->id);
        
        if (!$crowdsourcing_data) {
            return [
                'msg' => 'Report Incident Crowdsourcing not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/capacity-training/' . $training_data->english_image,
            'public/images/capacity-training/' . $training_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/citizen-action/', $englishImageName);
        $request->marathi_image->storeAs('public/images/citizen-action/', $marathiImageName);

                
        $crowdsourcing_data->english_title = $request['english_title'];
        $crowdsourcing_data->marathi_title = $request['marathi_title'];
        $crowdsourcing_data->english_description = $request['english_description'];
        $crowdsourcing_data->marathi_description = $request['marathi_description'];
        $crowdsourcing_data->english_image = $englishImageName;
        $crowdsourcing_data->marathi_image =   $marathiImageName;
        $crowdsourcing_data->save();        
     
        return [
            'msg' => 'Report Incident Crowdsourcing updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Report Incident Crowdsourcing.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $crowdsourcing = ReportIncidentCrowdsourcing::find($id);
        if ($crowdsourcing) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/citizen-action/'.$crowdsourcing->english_image,
                'public/images/citizen-action/'.$crowdsourcing->marathi_image
            ]);

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