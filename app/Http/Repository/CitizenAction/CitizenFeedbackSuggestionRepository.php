<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	CitizenFeedbackSuggestion
};
use Config;

class CitizenFeedbackSuggestionRepository{
	public function getAll()
    {
        try {
            return CitizenFeedbackSuggestion::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
       
        $feedback_data = new CitizenFeedbackSuggestion();
        $feedback_data->english_title = $request['english_title'];
        $feedback_data->marathi_title = $request['marathi_title'];
        $feedback_data->english_description = $request['english_description'];
        $feedback_data->marathi_description = $request['marathi_description'];
        $feedback_data->save();       
              
		$last_insert_id = $feedback_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $feedback_data = CitizenFeedbackSuggestion::find($last_insert_id); // Assuming $request directly contains the ID
        $feedback_data->english_image = $englishImageName; // Save the image filename to the database
        $feedback_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $feedback_data->save();
        
        return $last_insert_id;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $feedback = CitizenFeedbackSuggestion::find($id);
        if ($feedback) {
            return $feedback;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Volunteer Citizen Support.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $return_data = array();
        $feedback_data = CitizenFeedbackSuggestion::find($request->id);
        
        if (!$feedback_data) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $feedback_data->english_image;
       $previousMarathiImage = $feedback_data->marathi_image;

        $feedback_data->english_title = $request['english_title'];
        $feedback_data->marathi_title = $request['marathi_title'];
        $feedback_data->english_description = $request['english_description'];
        $feedback_data->marathi_description = $request['marathi_description'];
        $feedback_data->save();        
     
        $last_insert_id = $feedback_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update volunteer data.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $feedback = CitizenFeedbackSuggestion::find($id);
        if ($feedback) {
            unlink(storage_path(Config::get('DocumentConstant.CITIZEN_FEEDBACK_SUGGESTION_DELETE') . $feedback->english_image));
            unlink(storage_path(Config::get('DocumentConstant.CITIZEN_FEEDBACK_SUGGESTION_DELETE') . $feedback->marathi_image));
            // Delete the record from the database
            
            $feedback->delete();
            
            return $feedback;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}