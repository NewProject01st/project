<?php
namespace App\Http\Repository\Website\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Slider
};

class SliderRepository  {
	public function getAll()
    {
        try {
            $data_output = Slider::where('is_active','=',true);
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	
}