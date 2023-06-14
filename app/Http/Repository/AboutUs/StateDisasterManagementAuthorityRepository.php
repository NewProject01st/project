<?php
namespace App\Http\Repository\AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	StateDisasterManagementAuthority
};
use Config;

class StateDisasterManagementAuthorityRepository  {
	public function getAll()
    {
        try {
            return StateDisasterManagementAuthority::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request) {
        try {
            $statedisastermanagementauthority_data = new StateDisasterManagementAuthority();
            $statedisastermanagementauthority_data->english_title = $request['english_title'];
            $statedisastermanagementauthority_data->marathi_title = $request['marathi_title'];
            $statedisastermanagementauthority_data->english_description = $request['english_description'];
            $statedisastermanagementauthority_data->marathi_description = $request['marathi_description'];
            $statedisastermanagementauthority_data->save(); 
            
            $last_insert_id = $statedisastermanagementauthority_data->id;

            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            
            $statedisaster_mgt_authority_data_update = StateDisasterManagementAuthority::find($last_insert_id); // Assuming $request directly contains the ID
            $statedisaster_mgt_authority_data_update->english_image = $englishImageName; // Save the image filename to the database
            $statedisaster_mgt_authority_data_update->marathi_image = $marathiImageName; // Save the image filename to the database
            $statedisaster_mgt_authority_data_update->save();
        
            return $last_insert_id;
        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }

    public function getById($id) {
        try {
            $statedisastermanagementauthority = StateDisasterManagementAuthority::find($id);
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
    public function updateAll($request) {
    
        try {
            $statedisastermanagementauthority_data = StateDisasterManagementAuthority::find($request->id);
            
            if (!$statedisastermanagementauthority_data) {
                return [
                    'msg' => 'State Disaster Management Authority not found.',
                    'status' => 'error'
                ];
            }
            
            //Store the previous image name
            $previousEnglishImage = $statedisastermanagementauthority_data->english_image;
            $previousMarathiImage = $statedisastermanagementauthority_data->marathi_image;

            //Update the fields from request
            $statedisastermanagementauthority_data = StateDisasterManagementAuthority::find($request->id);
            $statedisastermanagementauthority_data->english_title = $request['english_title'];
            $statedisastermanagementauthority_data->marathi_title = $request['marathi_title'];
            $statedisastermanagementauthority_data->english_description = $request['english_description'];
            $statedisastermanagementauthority_data->marathi_description = $request['marathi_description'];
        
            $statedisastermanagementauthority_data->save();       
            $last_insert_id = $statedisastermanagementauthority_data->id;
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

    public function deleteById($id) {
        try {
            $statedisastermanagementauthority = StateDisasterManagementAuthority::find($id);
            if ($statedisastermanagementauthority) {
                if (file_exists(storage_path(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $statedisastermanagementauthority->english_image))) {
                    unlink(storage_path(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $statedisastermanagementauthority->english_image));
                }
                if (file_exists(storage_path(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $statedisastermanagementauthority->marathi_image))) {
                    unlink(storage_path(Config::get('DocumentConstant.ABOUT_US_STATE_DISASTER_MGTAUTHORITY_DELETE') . $statedisastermanagementauthority->marathi_image));
                }
                // Delete the record from the database
                $statedisastermanagementauthority->delete();
                
                return $statedisastermanagementauthority;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }


}