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
	public function getAll()
    {
        try {
            return CitizenFeedbackSuggestionModal::all();
            // $modal_data = CitizenFeedbackSuggestionModal::join('incident_type', 'incident_type.id','=', 'citizen_feedback_suggestion_modals.feedback')
            // ->get();
            // return $modal_data;
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_media.' . $request->media_upload->extension();
        
        $request->media_upload->storeAs('public/images/citizen-action/volunteer-modal', $englishImageName);

        
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

// public function getById($id)
// {
//     try {
//         $crowdsourcing = ReportIncidentCrowdsourcing::find($id);
//         if ($crowdsourcing) {
//             return $crowdsourcing;
//         } else {
//             return null;
//         }
//     } catch (\Exception $e) {
//         return $e;
// 		return [
//             'msg' => 'Failed to get by id Incidient Crowdsourcing.',
//             'status' => 'error'
//         ];
//     }
// }
// public function updateAll($request)
// {
//     try {
//         $crowdsourcing_data = ReportIncidentCrowdsourcing::find($request->id);

//         if (!$crowdsourcing_data) {
//             return [
//                 'msg' => 'Report Incident Crowdsourcing not found.',
//                 'status' => 'error'
//             ];
//         }

//         // Store the previous image names
//         $previousEnglishImage = $crowdsourcing_data->english_image;
//         $previousMarathiImage = $crowdsourcing_data->marathi_image;

//         // Update the fields from the request
//         $crowdsourcing_data->english_title = $request['english_title'];
//         $crowdsourcing_data->marathi_title = $request['marathi_title'];
//         $crowdsourcing_data->english_description = $request['english_description'];
//         $crowdsourcing_data->marathi_description = $request['marathi_description'];

//         if ($request->hasFile('english_image')) {
//             // Delete previous English image if it exists
//             if ($previousEnglishImage) {
//                 Storage::delete('public/images/citizen-action/crowdsourcing/' . $previousEnglishImage);
//             }

//             // Store the new English image
//             $englishImageName = time() . '_english.' . $request->english_image->extension();
//             $request->english_image->storeAs('public/images/citizen-action/crowdsourcing/', $englishImageName);
//             $crowdsourcing_data->english_image = $englishImageName;
//         }

//         if ($request->hasFile('marathi_image')) {
//             // Delete previous Marathi image if it exists
//             if ($previousMarathiImage) {
//                 Storage::delete('public/images/citizen-action/crowdsourcing/' . $previousMarathiImage);
//             }

//             // Store the new Marathi image
//             $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
//             $request->marathi_image->storeAs('public/images/citizen-action/crowdsourcing/', $marathiImageName);
//             $crowdsourcing_data->marathi_image = $marathiImageName;
//         }

//         $crowdsourcing_data->save();

//         return [
//             'msg' => 'Report Incident Crowdsourcing updated successfully.',
//             'status' => 'success'
//         ];
//     } catch (\Exception $e) {
//         return [
//             'msg' => 'Failed to update Report Incident Crowdsourcing.',
//             'status' => 'error',
//             'error' => $e->getMessage() // Return the error message for debugging purposes
//         ];
//     }
// }

// public function deleteById($id)
// {
//     try {
//         $crowdsourcing = ReportIncidentCrowdsourcing::find($id);
//         if ($crowdsourcing) {
//               // Delete the images from the storage folder
//               Storage::delete([
//                 'public/images/citizen-action/crowdsourcing/'.$crowdsourcing->english_image,
//                 'public/images/citizen-action/crowdsourcing/'.$crowdsourcing->marathi_image
//             ]);

//             // Delete the record from the database
            
//             $crowdsourcing->delete();
            
//             return $crowdsourcing;
//         } else {
//             return null;
//         }
//     } catch (\Exception $e) {
//         return $e;
//     }
// }
       
}