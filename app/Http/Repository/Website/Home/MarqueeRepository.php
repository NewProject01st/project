<?php
namespace App\Http\Repository\Website\Home;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Marquee
};

class MarqueeRepository  {
	public function getAllMarquee()
    {
        try {
            $data_output = Marquee::where('is_active','=',true);
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
}