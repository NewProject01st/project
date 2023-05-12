<?php
namespace App\Http\Repository\AboutUs;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ObjectiveGoals
};

class ObjectiveGoalsRepository  {

	public function getAll()
    {
        try {
            return ObjectiveGoals::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $objectivegoals_data = new ObjectiveGoals();
        $objectivegoals_data->english_title = $request['english_title'];
        $objectivegoals_data->marathi_title = $request['marathi_title'];
        $objectivegoals_data->english_description = $request['english_description'];
        $objectivegoals_data->marathi_description = $request['marathi_description'];
        $objectivegoals_data->save();       
     
		return $objectivegoals_data;
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
        $budget = ObjectiveGoals::find($id);
        if ($budget) {
            return $budget;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id budget.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $objectivegoals_data = ObjectiveGoals::find($request->id);
        $objectivegoals_data->english_title = $request['english_title'];
        $objectivegoals_data->marathi_title = $request['marathi_title'];
        $objectivegoals_data->english_description = $request['english_description'];
        $objectivegoals_data->marathi_description = $request['marathi_description'];
        $objectivegoals_data->update();  
        
    //    dd($objectivegoals_data);
        // print_r($objectivegoals_data);
        // die();
     
        return [
            'msg' => 'Objective Goals updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update budget.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $budget = ObjectiveGoals::destroy($id);
        if ($budget) {
            return $budget;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete budget.',
            'status' => 'error'
        ];
    }
}

}

