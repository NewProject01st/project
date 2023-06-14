<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	VolunteerCitizenSupport
};
use Config;

class VolunteerCitizenSupportRepository{
	public function getAll()
    {
        try {
            return VolunteerCitizenSupport::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        
        $volunteer_data = new VolunteerCitizenSupport();
        $volunteer_data->english_title = $request['english_title'];
        $volunteer_data->marathi_title = $request['marathi_title'];
        $volunteer_data->english_description = $request['english_description'];
        $volunteer_data->marathi_description = $request['marathi_description'];
        $volunteer_data->save();       
              
        $last_insert_id = $volunteer_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $volunteer_data = VolunteerCitizenSupport::find($last_insert_id); // Assuming $request directly contains the ID
        $volunteer_data->english_image = $englishImageName; // Save the image filename to the database
        $volunteer_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $volunteer_data->save();
        
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
        $volunteer = VolunteerCitizenSupport::find($id);
        if ($volunteer) {
            return $volunteer;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Volunteer Citizen Support.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $return_data = array();
        $volunteer_data = VolunteerCitizenSupport::find($request->id);
        
        if (!$volunteer_data) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
        // Store the previous image names
        $previousEnglishImage = $volunteer_data->english_image;
        $previousMarathiImage = $volunteer_data->marathi_image;
                
        $volunteer_data->english_title = $request['english_title'];
        $volunteer_data->marathi_title = $request['marathi_title'];
        $volunteer_data->english_description = $request['english_description'];
        $volunteer_data->marathi_description = $request['marathi_description'];
        $volunteer_data->save();        
     
        $last_insert_id = $volunteer_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update volunteer data.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $volunteer = VolunteerCitizenSupport::find($id);
        if ($volunteer) {
            unlink(storage_path(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_SUPPORT_DELETE') . $volunteer->english_image));
            unlink(storage_path(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_SUPPORT_DELETE') . $volunteer->marathi_image));
            // Delete the record from the database
            
            
            $volunteer->delete();
            
            return $volunteer;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}