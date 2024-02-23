<?php
namespace App\Http\Repository\Website\EmergencyResponse;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	StateEmergencyOperationsCenter,
    DistrictEmergencyOperationsCenter,
    EmergencyContactNumbers,
    SearchRescueTeams,
    ReliefMeasuresResources,
    EvacuationPlans,
    AddMoreEmergencyContactNumbers

};

class EmergencyResponseRepository  {

	public function getAllStateEmergencyOperationsCenter()
    {
        try {
            $data_output = StateEmergencyOperationsCenter::where('is_active','=',true);
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
    public function getAllDistrictEmergencyOperationsCenter()
    {
        try {
            $data_output = DistrictEmergencyOperationsCenter::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description', 'marathi_image');
            } else {
                $data_output = $data_output->select('english_title', 'english_description', 'english_image');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }	
    public function getAllEmergencyContactNumbers()
    {
        try {
            $data_output = EmergencyContactNumbers::where('is_active','=',true);
            $data_output_array = AddMoreEmergencyContactNumbers::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title','marathi_description', 'marathi_image');
                $data_output_array= $data_output_array->select('marathi_emergency_contact_title', 'marathi_emergency_contact_number')
                ->where('marathi_emergency_contact_title', 'REGEXP', '^[a-zA-Z]');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
                $data_output_array = $data_output_array->select('english_emergency_contact_title', 'english_emergency_contact_number')
                ->where('english_emergency_contact_title', 'REGEXP', '^[a-zA-Z]');
            }
            $data_output = $data_output->get()->toArray();
            // $data_output_array = $data_output_array->get()->toArray();
            // $data_output_array =  $data_output_array->orderBy('id', 'desc')->get()
            //                 ->toArray();
            if (Session::get('language') == 'mar') {
                $data_output_array =  $data_output_array->orderBy('marathi_emergency_contact_title')->get()
                                ->toArray();
                }
                else{
                    $data_output_array =  $data_output_array->orderBy('english_emergency_contact_title')->get()
                    ->toArray();
                }
                            
            // dd($data_output_array);
            return ['data_output' => $data_output, 'data_output_array' => $data_output_array];
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllSearchRescueTeams()
    {
        try {
            $data_output = SearchRescueTeams::where('is_active','=',true);
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

    public function getAllReliefMeasuresResources()
    {
        try {
            $data_output = ReliefMeasuresResources::where('is_active','=',true);
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
    public function getAllEvacuationPlans()
    {
        try {
            $data_output = EvacuationPlans::where('is_active','=',true);
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