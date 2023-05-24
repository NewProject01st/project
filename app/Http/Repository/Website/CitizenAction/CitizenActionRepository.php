<?php
namespace App\Http\Repository\Website\CitizenAction;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    ReportIncidentCrowdsourcing,
	VolunteerCitizenSupport,
    CitizenFeedbackSuggestion

};

class CitizenActionRepository  {


	public function getAllReportIncidentCrowdsourcing()
    {
        try {
            $data_output = ReportIncidentCrowdsourcing::where('is_active','=',true);
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
    public function getAllVolunteerCitizenSupport()
    {
        try {
            $data_output = VolunteerCitizenSupport::where('is_active','=',true);
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
    public function getAllCitizenFeedbackSuggestions()
    {
        try {
            $data_output = CitizenFeedbackSuggestion::where('is_active','=',true);
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