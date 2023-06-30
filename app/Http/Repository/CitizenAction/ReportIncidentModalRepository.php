<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ReportIncidentModal
};
use Config;

class ReportIncidentModalRepository{
	public function getAll(){
        try {
            // return ReportIncidentModal::all();
        $modal_data = ReportIncidentModal::join('incident_type', 'incident_type.id','=', 'report_incident_modals.incident')
        ->get();
        return $modal_data;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteById($id){
        try {
            $ciizen = ReportIncidentModal::find($id);
            if ($ciizen) {
                if (file_exists(storage_path(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $ciizen->media_upload))) {
                    unlink(storage_path(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $ciizen->media_upload));
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