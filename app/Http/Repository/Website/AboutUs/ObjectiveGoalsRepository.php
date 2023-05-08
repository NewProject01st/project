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

}


