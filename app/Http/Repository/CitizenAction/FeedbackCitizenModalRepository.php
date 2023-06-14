<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	CitizenFeedbackSuggestionModal
};

class FeedbackCitizenModalRepository{
	public function getAll(){
        try {
            // return CitizenFeedbackSuggestionModal::all();
            $modal_data = CitizenFeedbackSuggestionModal::join('incident_type', 'incident_type.id','=', 'citizen_feedback_suggestion_modals.incident')
            ->get();
            return $modal_data;
        } catch (\Exception $e) {
            return $e;
        }
    }

// 	public function addAll($request){
//     try {
//         $englishImageName = time() . '_media.' . $request->media_upload->extension();
        
//         $request->media_upload->storeAs('public/images/citizen-action/volunteer-modal', $englishImageName);

        
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