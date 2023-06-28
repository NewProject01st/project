<?php
namespace App\Http\Repository\Website\CitizenAction;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    ReportIncidentModal,
    CitizenVolunteerModal,
    IncidentType

};

class CitizenActionRepository  {


	public function getAllIncidentType()
    {
        try {
            $incidenttpe = IncidentType::where('is_active','=', true);
            if (Session::get('language') == 'mar') {
                $data_output_incident= $incidenttpe->select('id','marathi_title');
            } else {
                $data_output_incident= $incidenttpe->select('id','english_title');
            }
             $data_output_incident =  $data_output_incident->get()
                            ->toArray();
        return [
            'data_output_incident' => $data_output_incident
        ];
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllVolunteerCitizenSupport()
    {
        try {
            $incidenttpe = IncidentType::where('is_active', true);
            if (Session::get('language') == 'mar') {
                $data_output_incident= $incidenttpe->select('id','marathi_title');
            } else {
                $data_output_incident= $incidenttpe->select('id','english_title');
            }
            $data_output_incident =  $data_output_incident->get()
                            ->toArray();
        return [
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
                // dd($modal_data);
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

                $modal_data->ngo_name =   $request['ngo_name'];
                $modal_data->ngo_email =   $request['ngo_email'];
                $modal_data->ngo_contact_number =   $request['ngo_contact_number'];
                $modal_data->ngo_photo =   $request['ngo_photo'];
             
                // $modal_data->media_upload = $englishImageName;
                $modal_data->save();       
                    
                $last_insert_id = $modal_data->id;

                $englishImageName = $last_insert_id . '_english.' . $request->media_upload->extension();
                 $englishNGOImage = $last_insert_id . '_english1.' . $request->ngo_photo->extension();

                $modal_data = CitizenVolunteerModal::find($last_insert_id); // Assuming $request directly contains the ID
                $modal_data->media_upload = $englishImageName; // Save the image filename to the database
                $modal_data->media_upload = $englishNGOImage; // Save the image filename to the database
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