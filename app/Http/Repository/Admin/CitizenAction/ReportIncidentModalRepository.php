<?php
namespace App\Http\Repository\Admin\CitizenAction;
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
            $citizen = ReportIncidentModal::find($id);
            // dd($citizen);
            if ($citizen) {
                if (file_exists_s3(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $citizen->media_upload)) {
                    removeImage(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $citizen->media_upload);
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