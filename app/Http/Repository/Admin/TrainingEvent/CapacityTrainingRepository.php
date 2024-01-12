<?php
namespace App\Http\Repository\Admin\TrainingEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	CapacityTraining
};
use Config;

class CapacityTrainingRepository{
	public function getAll(){
        try {
            return CapacityTraining::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
       
        $training_data = new CapacityTraining();
        $training_data->english_title = $request['english_title'];
        $training_data->marathi_title = $request['marathi_title'];
        $training_data->english_description = $request['english_description'];
        $training_data->marathi_description = $request['marathi_description'];
        $training_data->save();      
        $last_insert_id = $training_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $training_data = CapacityTraining::find($last_insert_id); // Assuming $request directly contains the ID
        $training_data->english_image = $englishImageName; // Save the image filename to the database
        $training_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $training_data->save();
        
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
        $training = CapacityTraining::find($id);
        if ($training) {
            return $training;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Capacity buildind and Training.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request){
    try {
        $return_data = array();
        $training_data = CapacityTraining::find($request->id);
        
        if (!$training_data) {
            return [
                'msg' => 'Capacity buildind and Training not found.',
                'status' => 'error'
            ];
        }
        //Store the previous image name
        $previousEnglishImage = $training_data->english_image;
        $previousMarathiImage = $training_data->marathi_image;

                
        $training_data->english_title = $request['english_title'];
        $training_data->marathi_title = $request['marathi_title'];
        $training_data->english_description = $request['english_description'];
        $training_data->marathi_description = $request['marathi_description'];
        $training_data->save();        
     
        $last_insert_id = $training_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Capacity buildind and Training.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id){
    try {
        $training = CapacityTraining::find($id);
        if ($training) {
            removeImage(Config::get('DocumentConstant.CAPACITY_TRAINING_DELETE') . $training->english_image);
            removeImage(Config::get('DocumentConstant.CAPACITY_TRAINING_DELETE') . $training->marathi_image);
            $training->delete();
            
            
            return $training;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}