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
    CitizenFeedbackSuggestionModal,
    IncidentType

};

class CitizenActionRepository  {


	public function getAllReportIncidentCrowdsourcing()
    {
        try {
            $data_output = ReportIncidentCrowdsourcing::where('is_active','=',true);
            $incidenttpe = IncidentType::where('is_active','=', true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_image');
                $data_output_incident= $incidenttpe->select('id','marathi_title');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
                $data_output_incident= $incidenttpe->select('id','english_title');
            }
            $data_output =  $data_output->get()
                            ->toArray();
                            $data_output_incident =  $data_output_incident->get()
                            ->toArray();
        return [
            'data_output' => $data_output,
            'data_output_incident' => $data_output_incident
        ];
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllVolunteerCitizenSupport()
    {
        try {
            $data_output = VolunteerCitizenSupport::where('is_active','=',true);
            $incidenttpe = IncidentType::where('is_active', true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_image');
                $data_output_incident= $incidenttpe->select('id','marathi_title');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
                $data_output_incident= $incidenttpe->select('id','english_title');
            }
            $data_output =  $data_output->get()
                            ->toArray();
                            $data_output_incident =  $data_output_incident->get()
                            ->toArray();
        return [
            'data_output' => $data_output,
            'data_output_incident' => $data_output_incident
        ];
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllCitizenFeedbackSuggestions()
    {
        try {
            $data_output = CitizenFeedbackSuggestion::where('is_active','=',true);
            $incidenttpe = IncidentType::where('is_active', true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_image');
                $data_output_incident= $incidenttpe->select('id','marathi_title');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_image');
                $data_output_incident= $incidenttpe->select('id','english_title');
                // dd( $data_output_incident);
            }
            $data_output =  $data_output->get()
                            ->toArray();
            $data_output_incident =  $data_output_incident->get()
                            ->toArray();
                          
        return [
            'data_output' => $data_output,
            'data_output_incident' => $data_output_incident
        ];
        } catch (\Exception $e) {
            return $e;
        }
    }
		public function addIncidentModalInfo($request)
        {
            try {
               
                $modal_data = new ReportIncidentModal();
                $modal_data->incident = $request['incident'];
                $modal_data->location = $request['location'];
                $modal_data->datetime = $request['datetime'];
                $modal_data->mobile_number = $request['mobile_number'];
                $modal_data->description =   $request['description'];
                // $modal_data->media_upload = $englishImageName;
                $modal_data->save();       
                    
                $last_insert_id = $modal_data->id;

                $englishImageName = $last_insert_id . '_english.' . $request->media_upload->extension();
                
                $modal_data = ReportIncidentModal::find($last_insert_id); // Assuming $request directly contains the ID
                $modal_data->media_upload = $englishImageName; // Save the image filename to the database
                $modal_data->save();
                
                return $last_insert_id;

        
        
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
                $modal_data = new CitizenVolunteerModal();
                $modal_data->incident = $request['incident'];
                $modal_data->location = $request['location'];
                $modal_data->datetime = $request['datetime'];
                $modal_data->mobile_number = $request['mobile_number'];
                $modal_data->description =   $request['description'];
                // $modal_data->media_upload = $englishImageName;
                $modal_data->save();       
                    
                $last_insert_id = $modal_data->id;

                $englishImageName = $last_insert_id . '_english.' . $request->media_upload->extension();
                
                $modal_data = CitizenVolunteerModal::find($last_insert_id); // Assuming $request directly contains the ID
                $modal_data->media_upload = $englishImageName; // Save the image filename to the database
                $modal_data->save();
                
                return $last_insert_id;
        
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
              
                $modal_data = new CitizenFeedbackSuggestionModal();
                $modal_data->incident = $request['incident'];
                $modal_data->location = $request['location'];
                $modal_data->datetime = $request['datetime'];
                $modal_data->mobile_number = $request['mobile_number'];
                $modal_data->description =   $request['description'];
                // $modal_data->media_upload = $englishImageName;
                $modal_data->save();       
                    
                $last_insert_id = $modal_data->id;

                $englishImageName = $last_insert_id . '_english.' . $request->media_upload->extension();
                
                $modal_data = CitizenFeedbackSuggestionModal::find($last_insert_id); // Assuming $request directly contains the ID
                $modal_data->media_upload = $englishImageName; // Save the image filename to the database
                $modal_data->save();
                
                return $last_insert_id;
        
            } catch (\Exception $e) {
                return [
                    'msg' => $e,
                    'status' => 'error'
                ];
            }
        }       
}