<?php
namespace App\Http\Repository\Admin\AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ObjectiveGoals
};
use Config;

class ObjectiveGoalsRepository  {

	public function getAll()
    {
        try {
            return ObjectiveGoals::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request) {
        try {

            $objective_data = new ObjectiveGoals();
            $objective_data->english_title = $request['english_title'];
            $objective_data->marathi_title = $request['marathi_title'];
            $objective_data->english_description = $request['english_description'];
            $objective_data->marathi_description = $request['marathi_description'];
            $objective_data->save();     
            
            $last_insert_id = $objective_data->id;

            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            
            $objective_goals_data = ObjectiveGoals::find($last_insert_id); 
            $objective_goals_data->english_image = $englishImageName; 
            $objective_goals_data->marathi_image = $marathiImageName;
            $objective_goals_data->save();
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
            $objective = ObjectiveGoals::find($id);
            if ($objective) {
                return $objective;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateAll($request) {
    
        try {
            $return_data = array();
            $objectivegoals_data = ObjectiveGoals::find($request->id);
            if (!$objectivegoals_data) {
                return [
                    'msg' => 'State Disaster Management Authority not found.',
                    'status' => 'error'
                ];
            }
            // Store the previous images name
            $previousEnglishImage = $objectivegoals_data->english_image;
            $previousMarathiImage = $objectivegoals_data->marathi_image;
            
        // update the fields from request
            $objectivegoals_data->english_title = $request['english_title'];
            $objectivegoals_data->marathi_title = $request['marathi_title'];
            $objectivegoals_data->english_description = $request['english_description'];
            $objectivegoals_data->marathi_description = $request['marathi_description'];
        
            $objectivegoals_data->save();     

            $last_insert_id = $objectivegoals_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;
           
        } catch (\Exception $e) {
            return $e;
        }
    }


    // public function updateAll($request) {
    //     try {
    //         $return_data = array();
    //         $objectivegoals_data = ObjectiveGoals::find($request->id);

    //         if (!$objectivegoals_data) {
    //             return [
    //                 'msg' => 'Objective Goals not found.',
    //                 'status' => 'error'
    //             ];
    //         }
    //         //Store the previous image name
    //         $previousEnglishImage = $objectivegoals_data->english_image;
    //         $previousMarathiImage = $objectivegoals_data->marathi_image;

    //         //Update the fields from request
    //         $objectivegoals_data->english_title = $request['english_title'];
    //         $objectivegoals_data->marathi_title = $request['marathi_title'];
    //         $objectivegoals_data->english_description = $request['english_description'];
    //         $objectivegoals_data->marathi_description = $request['marathi_description'];
           
    //         $objectivegoals_data->update();  

    //         $last_insert_id = $objectivegoals_data->id;

    //         $return_data['last_insert_id'] = $last_insert_id;
    //         $return_data['english_image'] = $previousEnglishImage;
    //         $return_data['marathi_image'] = $previousMarathiImage;
    //         return  $return_data;
       
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }


    public function deleteById($id) {
        try {
          
            $objectivegoals = ObjectiveGoals::find($id);
            if ($objectivegoals) {
                $delete_path_for_english_file = Config::get('DocumentConstant.OBJECTIVE_GOALS_DELETE') . $objectivegoals->english_image;
                if (file_exists_s3($delete_path_for_english_file)) {
                    removeImage($delete_path_for_english_file);
                }
                $delete_path_for_marathi_file = Config::get('DocumentConstant.OBJECTIVE_GOALS_DELETE') . $objectivegoals->marathi_image;
                if (file_exists_s3($delete_path_for_marathi_file)) {
                    removeImage($delete_path_for_marathi_file);
                }
                
                $objectivegoals->delete();
                
                return $objectivegoals;
            } else {
                return null;
            }

        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to delete Objective Goals.',
                'status' => 'error'
            ];
        }
    }

}