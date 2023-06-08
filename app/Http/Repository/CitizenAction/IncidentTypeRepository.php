<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	IncidentType
};

class IncidentTypeRepository{
	public function getAll()
    {
        try {
            return IncidentType::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
    {
        try {
            $incidenttype_data = new IncidentType();
            $incidenttype_data->english_title = $request['english_title'];
            $incidenttype_data->marathi_title = $request['marathi_title'];
        //    dd($incidenttype_data);
            $incidenttype_data->save();       
                
            return $incidenttype_data;

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
            $incidenttype = IncidentType::find($id);
            if ($incidenttype) {
                return $incidenttype;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by Id Incident Type.',
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request)
    {
        try {
            $incidenttype_data = IncidentType::find($request->id);
            
            if (!$incidenttype_data) {
                return [
                    'msg' => 'Incident Type data not found.',
                    'status' => 'error'
                ];
            }
        // Store the previous image names
            $incidenttype_data->english_title = $request['english_title'];
            $incidenttype_data->marathi_title = $request['marathi_title'];
            $incidenttype_data->save();        
        
            return [
                'msg' => 'Incident Type data updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Incident Type data.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id)
    {
        try {
            $incidenttype = IncidentType::find($id);
            if ($incidenttype) {
                // Delete the images from the storage folder
                Storage::delete([
                    'public/images/citizen-action/incidenttype-suggestion/'.$incidenttype->english_image,
                    'public/images/citizen-action/incidenttype-suggestion/'.$incidenttype->marathi_image
                ]);

                // Delete the record from the database
                
                $incidenttype->delete();
                
                return $incidenttype;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
       
}