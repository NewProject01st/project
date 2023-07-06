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

    // public function deleteById($id){
    //     try {
    //         $ciizen = ReportIncidentModal::find($id);
    //         if ($ciizen) {
    //             if (file_exists_s3(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $ciizen->media_upload)) {
    //                 removeImage(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $ciizen->media_upload);
    //             }
                
    //             $ciizen->delete();
    //           dd($ciizen);
    //             return $ciizen;
    //         } else {
    //             return null;
    //         }
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }



    public function deleteById($id){
        try {
            $citizen = ReportIncidentModal::find($id);
            if ($citizen) {
                if (file_exists_s3(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $citizen->media_upload)) {
                    removeImage(Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_DELETE') . $citizen->media_upload);
                }
             
                $citizen->delete();
        //   dd($citizen);
                return $citizen;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
}
}