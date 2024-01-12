<?php
namespace App\Http\Repository\Website\Preparedness;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	HazardVulnerability,
    EarlyWarningSystem,
    CapacityTraining,
    PublicAwarenessEducation,
    GovtHospitals

};

class PreparednessRepository  {


	public function getAllHazardVulnerability()
    {
        try {
            $data_output = HazardVulnerability::where('is_active','=',true);
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
    public function getAllEarlyWarningSystem()
    {
        try {
            $data_output = EarlyWarningSystem::where('is_active','=',true);
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
    public function getAllCapacityTraining()
    {
        try {
            $data_output = CapacityTraining::where('is_active','=',true);
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

    public function getAllPublicAwarenessEducation()
    {
        try {
            $data_output = PublicAwarenessEducation::where('is_active','=',true);
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
    public function getAllGovtHospitals()
    {
        try {
            $data_output = GovtHospitals::where('is_active','=',true);
           
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('hospital_english_type','marathi_name', 'marathi_area','marathi_phone','email','marathi_pincode','marathi_address');
            } else {
                $data_output = $data_output->select('hospital_english_type', 'english_name','english_area','english_phone','email','english_pincode','english_address');
            }
            $data_output =  $data_output->get()
                            ->toArray();
                      
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
}