<?php
namespace App\Http\Repository\Website\CitizenAction;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    ReportIncidentCrowdsourcing,
	VolunteerCitizenSupport,
    CitizenFeedbackSuggestion,
    ReportIncidentModal,
    CitizenVolunteerModal,
    CitizenFeedbackSuggestionModal

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

    
		public function addIncidentModalInfo($request)
        {
            try {
                // dd($request);
                $englishImageName = time() . '_media.' . $request->media_upload->extension();
        
                $request->media_upload->storeAs('public/images/citizen-action/modal/incident-modal', $englishImageName);
        
                $modal_data = new ReportIncidentModal();
                $modal_data->incident = $request['incident'];
                $modal_data->location = $request['location'];
                $modal_data->datetime = $request['datetime'];
                $modal_data->mobile_number = $request['mobile_number'];
                $modal_data->description =   $request['description'];
                $modal_data->media_upload = $englishImageName;
                $modal_data->save();       
                    
                return $modal_data;
        
        
            } catch (\Exception $e) {
                return [
                    'msg' => $e,
                    'status' => 'error'
                ];
            }
        }       

        
		public function addVolunteerModalInfo($request)
        {
            try {
                // dd($request);
                $englishImageName = time() . '_media.' . $request->media_upload->extension();
        
                $request->media_upload->storeAs('public/images/citizen-action/modal/volunteer-modal', $englishImageName);
        
                $modal_data = new CitizenVolunteerModal();
                $modal_data->volunteer = $request['volunteer'];
                $modal_data->location = $request['location'];
                $modal_data->datetime = $request['datetime'];
                $modal_data->mobile_number = $request['mobile_number'];
                $modal_data->description =   $request['description'];
                $modal_data->media_upload = $englishImageName;
                $modal_data->save();       
                    
                return $modal_data;
        
        
            } catch (\Exception $e) {
                return [
                    'msg' => $e,
                    'status' => 'error'
                ];
            }
        }       

        public function addFeedbackModalInfo($request)
        {
            try {
                // dd($request);
                $englishImageName = time() . '_media.' . $request->media_upload->extension();
        
                $request->media_upload->storeAs('public/images/citizen-action/modal/feedback-modal', $englishImageName);
        
                $modal_data = new CitizenFeedbackSuggestionModal();
                $modal_data->feedback = $request['feedback'];
                $modal_data->location = $request['location'];
                $modal_data->datetime = $request['datetime'];
                $modal_data->mobile_number = $request['mobile_number'];
                $modal_data->description =   $request['description'];
                $modal_data->media_upload = $englishImageName;
                $modal_data->save();       
                    
                return $modal_data;
        
        
            } catch (\Exception $e) {
                return [
                    'msg' => $e,
                    'status' => 'error'
                ];
            }
        }       
}