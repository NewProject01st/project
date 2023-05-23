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
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/citizen-action/feedback-suggestion', $englishImageName);
        $request->marathi_image->storeAs('public/images/citizen-action/feedback-suggestion', $marathiImageName);

        
        $feedback_data = new CitizenFeedbackSuggestion();
        $feedback_data->english_title = $request['english_title'];
        $feedback_data->marathi_title = $request['marathi_title'];
        $feedback_data->english_description = $request['english_description'];
        $feedback_data->marathi_description = $request['marathi_description'];
        $feedback_data->english_image = $englishImageName;
        $feedback_data->marathi_image =   $marathiImageName;
        $feedback_data->save();       
              
		return $feedback_data;

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
        $feedback_data = CitizenFeedbackSuggestion::find($request->id);
        
        if (!$feedback_data) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/citizen-action/feedback-suggestion/' . $feedback_data->english_image,
            'public/images/citizen-action/feedback-suggestion/' . $feedback_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/citizen-action/feedback-suggestion/', $englishImageName);
        $request->marathi_image->storeAs('public/images/citizen-action/feedback-suggestion/', $marathiImageName);

                
        $feedback_data->english_title = $request['english_title'];
        $feedback_data->marathi_title = $request['marathi_title'];
        $feedback_data->english_description = $request['english_description'];
        $feedback_data->marathi_description = $request['marathi_description'];
        $feedback_data->english_image = $englishImageName;
        $feedback_data->marathi_image =   $marathiImageName;
        $feedback_data->save();        
     
        return [
            'msg' => 'volunteer data updated successfully.',
            'status' => 'success'
        ];
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
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/citizen-action/feedback-suggestion/'.$feedback->english_image,
                'public/images/citizen-action/feedback-suggestion/'.$feedback->marathi_image
            ]);

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