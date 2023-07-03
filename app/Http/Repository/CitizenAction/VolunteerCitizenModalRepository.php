<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	CitizenVolunteerModal
};
use Config;

class VolunteerCitizenModalRepository{
	public function getAll(){
        try {
            // return CitizenVolunteerModal::all();
            $modal_data = CitizenVolunteerModal::join('incident_type', 'incident_type.id','=', 'citizen_volunteer_modals.incident')
            ->get();
            return $modal_data;

        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getById($id){
        try {

            $citizenvolunteer = CitizenVolunteerModal::find($id);
            
            // dd($citizenvolunteer);
//             $citizenvolunteer = CitizenVolunteerModal::leftJoin('incident_type', 'incident_type.id', '=', 'citizen_volunteer_modals.incident')
// 				->where('citizen_volunteer_modals.id', $id)
// 				->first();
// dd($citizenvolunteer);
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
            $slider = CitizenVolunteerModal::find($id);
            if ($ciizen) {
                if (file_exists(storage_path(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $ciizen->media_upload))) {
                    unlink(storage_path(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $ciizen->media_upload));
                }
                if (file_exists(storage_path(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $ciizen->ngo_photo))) {
                    unlink(storage_path(Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_DELETE') . $ciizen->ngo_photo));
                }
                $ciizen->delete();
                return $ciizen;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
}

}