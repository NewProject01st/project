<?php
namespace App\Http\Repository\Website\PoliciesLegislation;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    StateDisasterManagementPlan,
	DistrictDisasterManagementPlan,
    StateDisasterManagementPolicy,
    RelevantLawsRegulation

};

class PoliciesLegislationRepository  {


	public function getAllStateDisasterManagementPlan()
    {
        try {
            $data_output = StateDisasterManagementPlan::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_pdf','policies_year');
            } else {
                $data_output = $data_output->select('english_title', 'english_pdf','policies_year');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllDistrictDisasterManagementPlan()
    {
        try {
            $data_output = DistrictDisasterManagementPlan::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_pdf','policies_year');
            } else {
                $data_output = $data_output->select('english_title', 'english_pdf','policies_year');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	
    public function getAllStateDisasterManagementPolicy()
    {
        try {
            $data_output = StateDisasterManagementPolicy::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_pdf','policies_year');
            } else {
                $data_output = $data_output->select('english_title', 'english_pdf','policies_year');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllRelevantLawsRegulation()
    {
        try {
            $data_output = RelevantLawsRegulation::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_pdf','policies_year');
            } else {
                $data_output = $data_output->select('english_title', 'english_pdf','policies_year');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
}