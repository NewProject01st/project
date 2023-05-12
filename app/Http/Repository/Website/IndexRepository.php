<?php
namespace App\Http\Repository\Website;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	Marquee,
    Slider

};

class IndexRepository  {


	public function getAllMarquee()
    {
        try {
            $data_output = Marquee::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title');
            } else {
                $data_output = $data_output->select('english_title');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        //    echo $data_output;
        //    die();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllSlider()
    {
        try {
            $data_output = Slider::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_image');
            } else {
                $data_output = $data_output->select('english_image');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	

}