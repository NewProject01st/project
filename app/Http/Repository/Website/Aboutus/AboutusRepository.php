<?php
namespace App\Http\Repository\Website\Aboutus;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	DisasterManagementPortal,
    ObjectiveGoals,
    StateDisasterManagementAuthority

};

class AboutusRepository  {


	public function getAllDisasterManagmentPortal()
    {
        try {
            $data_output = DisasterManagementPortal::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_image');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
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
    public function getAllObjectiveGoals()
    {
        try {
            $data_output = ObjectiveGoals::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_image');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	
    public function getAllStateDisasterManagementAuthority()
    {
        try {
            $data_output = StateDisasterManagementAuthority::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description', 'marathi_image');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

}