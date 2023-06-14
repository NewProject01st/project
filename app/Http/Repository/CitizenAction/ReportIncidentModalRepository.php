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

// 	public function addAll($request){
//     try {
//         $englishImageName = time() . '_media.' . $request->media_upload->extension();
        
//         $request->media_upload->storeAs('public/images/citizen-action/modal/incident-modal', $englishImageName);

        
//         $modal_data = new ReportIncidentModal();
//         $modal_data->incident = $request['incident'];
//         $modal_data->location = $request['location'];
//         $modal_data->datetime = $request['datetime'];
//         $modal_data->mobile_number = $request['mobile_number'];
//         $modal_data->description =   $request['description'];
//         $modal_data->media_upload = $englishImageName;
//         $modal_data->save();       
              
// 		return $modal_data;

//     } catch (\Exception $e) {
//         return [
//             'msg' => $e,
//             'status' => 'error'
//         ];
//     }
// }
}