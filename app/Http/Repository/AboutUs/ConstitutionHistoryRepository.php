<?php
namespace App\Http\Repository\AboutUs;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ConstitutionHistory
};

class ConstitutionHistoryRepository  {
	public function getAll()
    {
        try {
            return ConstitutionHistory::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $constitutionhistory_data = new ConstitutionHistory();
        $constitutionhistory_data->english_title = $request['english_title'];
        $constitutionhistory_data->marathi_title = $request['marathi_title'];
        $constitutionhistory_data->english_description = $request['english_description'];
        $constitutionhistory_data->marathi_description = $request['marathi_description'];
        $constitutionhistory_data->save();       
     
		return $constitutionhistory_data;
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
        $constitutionhistory = ConstitutionHistory::find($id);
        if ($constitutionhistory) {
            return $constitutionhistory;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id constitution history.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $constitutionhistory_data = ConstitutionHistory::find($request->id);
        $constitutionhistory_data->english_title = $request['english_title'];
        $constitutionhistory_data->marathi_title = $request['marathi_title'];
        $constitutionhistory_data->english_description = $request['english_description'];
        $constitutionhistory_data->marathi_description = $request['marathi_description'];
        $constitutionhistory_data->save();       
     
        return [
            'msg' => 'constitution history updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update constitution history.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $constitutionhistory = ConstitutionHistory::destroy($id);
        if ($constitutionhistory) {
            return $constitutionhistory;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete constitution history.',
            'status' => 'error'
        ];
    }
}

}


