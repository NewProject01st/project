<?php
namespace App\Http\Repository\Admin\PoliciesLegislation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DistrictDisasterManagementPlan
};
use Config;


class DistrictDisasterManagementPlanRepository{
	public function getAll(){
        try {
            return DistrictDisasterManagementPlan::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
            $district_data = new DistrictDisasterManagementPlan();
            $district_data->english_title = $request['english_title'];
            $district_data->marathi_title = $request['marathi_title'];
            $district_data->english_description = $request['english_description'];
            $district_data->marathi_description = $request['marathi_description'];

            $district_data->save();       
            $last_insert_id = $district_data->id;

            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            
            $district = DistrictDisasterManagementPlan::find($last_insert_id); // Assuming $request directly contains the ID
            $district->english_image = $englishImageName; // Save the image filename to the database
            $district->marathi_image = $marathiImageName; // Save the image filename to the database
            $district->save();
            
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
            $district_plan = DistrictDisasterManagementPlan::find($id);
            if ($district_plan) {
                return $district_plan;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id District Disaster Management Plan.',
                'status' => 'error'
            ];
        }
    }
    
    public function updateAll($request){
        try {
            $return_data = array();
            $district_data = DistrictDisasterManagementPlan::find($request->id);
            
            if (!$district_data) {
                return [
                    'msg' => 'District Disaster Management Plan data not found.',
                    'status' => 'error'
                ];
            }
        // Store the previous image names
        $previousEnglishImage = $district_data->english_image;
        $previousMarathiImage = $district_data->marathi_image;

            $district_data->english_title = $request['english_title'];
            $district_data->marathi_title = $request['marathi_title'];
            $district_data->english_description = $request['english_description'];
            $district_data->marathi_description = $request['marathi_description'];
        
            $district_data->save();
            $last_insert_id = $district_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;

        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update District Disaster Management Plan data.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id){
        try {
            $district_plan = DistrictDisasterManagementPlan::find($id);
            if ($district_plan) {
                // Delete the images from the storage folder
                unlink(storage_path(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $district_plan->english_image));
                unlink(storage_path(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $district_plan->marathi_image));
                $district_plan->delete();
                // Delete the record from the database
                
                $district_plan->delete();
                
                return $district_plan;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
       
}