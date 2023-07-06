<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	CitizenVolunteerModal,
    IncidentType
};
use Config;

class VolunteerCitizenModalRepository{
	public function getAll(){
        try {
            // return CitizenVolunteerModal::all();
            $modal_data = IncidentType::join('citizen_volunteer_modals', 'citizen_volunteer_modals.incident','=', 'incident_type.id')
            ->select('citizen_volunteer_modals.*', 'incident_type.english_title')
            ->get();
            return $modal_data;

        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getById($id){
        try {

            $citizenvolunteer = CitizenVolunteerModal::find($id);
            
            $citizenvolunteer = CitizenVolunteerModal::join('incident_type', 'incident_type.id','=', 'citizen_volunteer_modals.incident')
            ->select('citizen_volunteer_modals.*', 'incident_type.english_title')
            ->find($id);

            if ($citizenvolunteer) {
                return $citizenvolunteer;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Citizen Volunteer.',
                'status' => 'error'
            ];
        }
    }

    
    public function deleteById($id){
        try {
            $citizen = CitizenVolunteerModal::find($id);
            // dd($ciizen);
            if ($citizen) {
                if (file_exists_s3(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $citizen->media_upload)) {
                    removeImage(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $citizen->media_upload);
                }
                if (file_exists_s3(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $citizen->ngo_photo)) {
                    removeImage(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $citizen->ngo_photo);
                }
                $citizen->delete();
                return $citizen;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
}

}