<?php
namespace App\Http\Repository\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	PublicAwarenessEducation
};
use Config;

class PublicAwarenessEducationRepository{
	public function getAll() {
        try {
            return PublicAwarenessEducation::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
        $awareness_data = new PublicAwarenessEducation();
        $awareness_data->english_title = $request['english_title'];
        $awareness_data->marathi_title = $request['marathi_title'];
        $awareness_data->english_description = $request['english_description'];
        $awareness_data->marathi_description = $request['marathi_description'];
        $awareness_data->save();       
              
        $last_insert_id = $awareness_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $awareness_data = PublicAwarenessEducation::find($last_insert_id); // Assuming $request directly contains the ID
        $awareness_data->english_image = $englishImageName; // Save the image filename to the database
        $awareness_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $awareness_data->save();
        
        return $last_insert_id;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id){
    try {
        $awareness = PublicAwarenessEducation::find($id);
        if ($awareness) {
            return $awareness;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Public Awareness Education.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request){
    try {
        $return_data = array();
        $awareness_data = PublicAwarenessEducation::find($request->id);
        
        if (!$awareness_data) {
            return [
                'msg' => 'Public Awareness Education not found.',
                'status' => 'error'
            ];
        }
         //Store the previous image name
         $previousEnglishImage = $awareness_data->english_image;
         $previousMarathiImage = $awareness_data->marathi_image;
 
       
        $awareness_data->english_title = $request['english_title'];
        $awareness_data->marathi_title = $request['marathi_title'];
        $awareness_data->english_description = $request['english_description'];
        $awareness_data->marathi_description = $request['marathi_description'];
        $awareness_data->save();        
     
        $last_insert_id = $awareness_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Public Awareness Education.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id){
    try {
        $awareness = PublicAwarenessEducation::find($id);
        if ($awareness) {
            removeImage(Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_DELETE') . $awareness->english_image);
            removeImage(Config::get('DocumentConstant.PUBLIC_AWARENESS_EDUCATION_DELETE') . $awareness->marathi_image);

            // Delete the record from the database
            
            $awareness->delete();
            
            return $awareness;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}