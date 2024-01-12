<?php
namespace App\Http\Repository\Website\PoliciesAndGuidelines;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    StateDisasterManagementPlan,
	DistrictDisasterManagementPlan,
    StateDisasterManagementPolicy,
    RelevantLawsRegulation,
    DisasterManagementAct,
    DisasterManagementGuidelines

};

class PoliciesAndGuidelinesRepository  {


	public function getAllStateDisasterManagementPlan()
    {
        try {
            $data_output = StateDisasterManagementPlan::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_pdf','policies_year');
            } else {
                $data_output = $data_output->select('english_title', 'english_pdf','policies_year');
            }
            $data_output =  $data_output->orderBy('policies_year', 'desc')->get()
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
            $data_output =  $data_output->orderBy('policies_year', 'desc')->get()
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
            $data_output =  $data_output->orderBy('policies_year', 'desc')->get()
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
            $data_output =  $data_output->orderBy('policies_year', 'desc')->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllDisasterManagementAct()
    {
        try {
            $data_output = DisasterManagementAct::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_pdf','policies_year');
            } else {
                $data_output = $data_output->select('english_title', 'english_pdf','policies_year');
            }
            $data_output =  $data_output->orderBy('policies_year', 'desc')->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllDisasterManagementGuidelines()
    {
        try {
            $data_output = DisasterManagementGuidelines::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_pdf','policies_year');
            } else {
                $data_output = $data_output->select('english_title', 'english_pdf','policies_year');
            }
            $data_output =  $data_output->orderBy('policies_year', 'desc')->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
}