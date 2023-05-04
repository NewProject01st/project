<?php
namespace App\Http\Repository\AboutUs;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Budget
};

class BudgetRepository  {
	public function getAllBudgets()
    {
        try {
            return Budget::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $budget_data = new Budget();
        $budget_data->english_title = $request['english_title'];
        $budget_data->marathi_title = $request['marathi_title'];
        $budget_data->english_description = $request['english_description'];
        $budget_data->marathi_description = $request['marathi_description'];
        $budget_data->save();       
     
		return $budget_data;
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
        $budget = Budget::find($id);
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
public function updateBudget($request)
{
    try {
        $budget_data = Budget::find($request->id);
        $budget_data->english_title = $request['english_title'];
        $budget_data->marathi_title = $request['marathi_title'];
        $budget_data->english_description = $request['english_description'];
        $budget_data->marathi_description = $request['marathi_description'];
        $budget_data->update();  
        
    //    dd($budget_data);
        // print_r($budget_data);
        // die();
     
        return [
            'msg' => 'Budget updated successfully.',
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
        $budget = Budget::destroy($id);
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


