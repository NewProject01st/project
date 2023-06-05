<?php
namespace App\Http\Repository\Website\NewsAndEvents;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	DisasterManagementNews,
    SuccessStories

};

class NewsEventsRepository  {


	public function getAllDisasterManagementNews()
    {
        try {
            $data_output = DisasterManagementNews::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','english_url','disaster_date','marathi_image','id');
            } else {
                $data_output = $data_output->select('english_title','english_description','english_url','disaster_date','english_image','id');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }  
}
public function getAllSuccessStories()
    {
        try {
            $data_output = SuccessStories::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description','marathi_designation','marathi_image');
            } else {
                $data_output = $data_output->select('english_title','english_description','english_designation','english_image');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }  
}
}