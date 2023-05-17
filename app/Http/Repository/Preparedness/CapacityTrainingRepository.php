<?php
namespace App\Http\Repository\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	CapacityTraining
};

class CapacityTrainingRepository{
	public function getAll()
    {
        try {
            return CapacityTraining::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/capacity-training', $englishImageName);
        $request->marathi_image->storeAs('public/images/capacity-training', $marathiImageName);

        
        $training_data = new CapacityTraining();
        $training_data->english_title = $request['english_title'];
        $training_data->marathi_title = $request['marathi_title'];
        $training_data->english_description = $request['english_description'];
        $training_data->marathi_description = $request['marathi_description'];
        $training_data->english_image = $englishImageName;
        $training_data->marathi_image =   $marathiImageName;
        $training_data->save();       
              
		return $training_data;

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
public function updateAll($request)
{
    try {
        $training_data = CapacityTraining::find($request->id);
        
        if (!$training_data) {
            return [
                'msg' => 'Capacity buildind and Training not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/capacity-training/' . $training_data->english_image,
            'public/images/capacity-training/' . $training_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/capacity-training/', $englishImageName);
        $request->marathi_image->storeAs('public/images/capacity-training/', $marathiImageName);

                
        $training_data->english_title = $request['english_title'];
        $training_data->marathi_title = $request['marathi_title'];
        $training_data->english_description = $request['english_description'];
        $training_data->marathi_description = $request['marathi_description'];
        $training_data->english_image = $englishImageName;
        $training_data->marathi_image =   $marathiImageName;
        $training_data->save();        
     
        return [
            'msg' => 'Capacity buildind and Training updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Capacity buildind and Training.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $training = CapacityTraining::find($id);
        if ($training) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/capacity-training/'.$training->english_image,
                'public/images/capacity-training/'.$training->marathi_image
            ]);

            // Delete the record from the database
            
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