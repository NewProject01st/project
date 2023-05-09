<?php
namespace App\Http\Repository\Website\AboutUs;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementPortal
};

class DisasterManagementPortalRepository  {
	public function getAll()
    {
        try {
            $data_output = DisasterManagementPortal::where('is_active','=',true);
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
}


