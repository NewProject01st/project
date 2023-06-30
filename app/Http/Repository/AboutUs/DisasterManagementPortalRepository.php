<?php
namespace App\Http\Repository\AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementPortal
};
use Config;

class DisasterManagementPortalRepository  {
	public function getAll()
    {
        try {
            return DisasterManagementPortal::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request) {
        try {
            

            $disastermanagementportal_data = new DisasterManagementPortal();
            $disastermanagementportal_data->english_title = $request['english_title'];
            $disastermanagementportal_data->marathi_title = $request['marathi_title'];
            $disastermanagementportal_data->english_description = $request['english_description'];
            $disastermanagementportal_data->marathi_description = $request['marathi_description'];
            $disastermanagementportal_data->save();       


            $last_insert_id = $disastermanagementportal_data->id;

            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            
            $disaster_mgt_portal_data = DisasterManagementPortal::find($last_insert_id); // Assuming $request directly contains the ID
            $disaster_mgt_portal_data->english_image = $englishImageName; // Save the image filename to the database
            $disaster_mgt_portal_data->marathi_image = $marathiImageName; // Save the image filename to the database
            $disaster_mgt_portal_data->save();
            
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
            $statedisastermanagementauthority = DisasterManagementPortal::find($id);
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
            $return_data = array();
            $disastermanagementportal_data = DisasterManagementPortal::find($request->id);
            if (!$disastermanagementportal_data) {
                return [
                    'msg' => 'State Disaster Management Authority not found.',
                    'status' => 'error'
                ];
            }
            // Store the previous images name
            $previousEnglishImage = $disastermanagementportal_data->english_image;
            $previousMarathiImage = $disastermanagementportal_data->marathi_image;
            
        // update the fields from request
            $disastermanagementportal_data->english_title = $request['english_title'];
            $disastermanagementportal_data->marathi_title = $request['marathi_title'];
            $disastermanagementportal_data->english_description = $request['english_description'];
            $disastermanagementportal_data->marathi_description = $request['marathi_description'];
        
            $disastermanagementportal_data->save();     

            $last_insert_id = $disastermanagementportal_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;
           
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteById($id)
    {
        try {
            $return_data = array();

            $statedisastermanagementauthority = DisasterManagementPortal::find($id);
            if ($statedisastermanagementauthority) {

                if (file_exists(storage_path(Config::get('DocumentConstant.ABOUT_US_DISASTER_MGT_PORTAL_DELETE') . $statedisastermanagementauthority->english_image))) {
                    unlink(storage_path(Config::get('DocumentConstant.ABOUT_US_DISASTER_MGT_PORTAL_DELETE') . $statedisastermanagementauthority->english_image));
                }
                if (file_exists(storage_path(Config::get('DocumentConstant.ABOUT_US_DISASTER_MGT_PORTAL_DELETE') . $statedisastermanagementauthority->marathi_image))) {
                    unlink(storage_path(Config::get('DocumentConstant.ABOUT_US_DISASTER_MGT_PORTAL_DELETE') . $statedisastermanagementauthority->marathi_image));
                }
                
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