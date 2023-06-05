<?php
namespace App\Http\Repository\Website\TrainingEvent;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	Event

};

class EventRepository  {


	public function getAllEvent()
    {
        try {
            $data_output = Event::where('is_active','=',true);
            // dd($data_output);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_image','start_date', 'end_date');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image','start_date', 'end_date');
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
   
}