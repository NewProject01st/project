<?php
namespace App\Http\Repository\Website\AboutUs;
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
            $data_output = StateDisasterManagementAuthority::where('is_active','=',true);
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
}


