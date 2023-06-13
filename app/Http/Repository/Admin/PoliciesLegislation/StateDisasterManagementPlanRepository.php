<?php
namespace App\Http\Repository\Admin\PoliciesLegislation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	StateDisasterManagementPlan
};
use Config;

class StateDisasterManagementPlanRepository{
	public function getAll(){
        try {
            return StateDisasterManagementPlan::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
        
            $state_data = new StateDisasterManagementPlan();
            $state_data->english_title = $request['english_title'];
            $state_data->marathi_title = $request['marathi_title'];
            $state_data->english_description = $request['english_description'];
            $state_data->marathi_description = $request['marathi_description'];

            $state_data->save();       
            $last_insert_id = $state_data->id;

            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            
            $state = StateDisasterManagementPlan::find($last_insert_id); // Assuming $request directly contains the ID
            $state->english_image = $englishImageName; // Save the image filename to the database
            $state->marathi_image = $marathiImageName; // Save the image filename to the database
            $state->save();
            
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
            $state_plan = StateDisasterManagementPlan::find($id);
            if ($state_plan) {
                return $state_plan;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id State Disaster Management Plan.',
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request){
        try {
            $return_data = array();
            $state_data = StateDisasterManagementPlan::find($request->id);
            
            if (!$state_data) {
                return [
                    'msg' => 'State Disaster Management Plan data not found.',
                    'status' => 'error'
                ];
            }
        // Store the previous image names
        $previousEnglishImage = $state_data->english_image;
        $previousMarathiImage = $state_data->marathi_image;

            $state_data->english_title = $request['english_title'];
            $state_data->marathi_title = $request['marathi_title'];
            $state_data->english_description = $request['english_description'];
            $state_data->marathi_description = $request['marathi_description'];
        
            $state_data->save();
            $last_insert_id = $state_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;
    
            return [
                'msg' => 'State Disaster Management Plan data updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update State Disaster Management Plan data.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id){
        try {
            $state_plan = StateDisasterManagementPlan::find($id);
            if ($state_plan) {
                // dd($state_plan);
                // Delete the images from the storage folder
                unlink(storage_path(Config::get('DocumentConstant.STATE_DISASTER_PLAN_DELETE') . $state_plan->english_image));
                unlink(storage_path(Config::get('DocumentConstant.STATE_DISASTER_PLAN_DELETE') . $state_plan->marathi_image));
                $state_plan->delete();
                
                // Delete the record from the database
                
                $state_plan->delete();
                
                return $state_plan;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
       
}