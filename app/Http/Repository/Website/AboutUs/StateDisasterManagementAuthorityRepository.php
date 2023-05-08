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

class StateDisasterManagementAuthorityRepository  {
	public function getAll()
    {
        try {
            return StateDisasterManagementAuthority::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
}


