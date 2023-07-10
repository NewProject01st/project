<?php
namespace App\Http\Repository\Admin\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	EarlyWarningSystem
};
use Config;

class EarlyWarningSystemRepository{
	public function getAll(){
        try {
            return EarlyWarningSystem::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
    try {
        
        $warning_data = new EarlyWarningSystem();
        $warning_data->english_title = $request['english_title'];
        $warning_data->marathi_title = $request['marathi_title'];
        $warning_data->english_description = $request['english_description'];
        $warning_data->marathi_description = $request['marathi_description'];
        $warning_data->save();       
              
        $last_insert_id = $warning_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $warning_data = EarlyWarningSystem::find($last_insert_id); // Assuming $request directly contains the ID
        $warning_data->english_image = $englishImageName; // Save the image filename to the database
        $warning_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $warning_data->save();
        
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
        $warning = EarlyWarningSystem::find($id);
        if ($warning) {
            return $warning;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Early Warning System.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request){
    try {
        $return_data = array();
        $warning_data = EarlyWarningSystem::find($request->id);
        
        if (!$warning_data) {
            return [
                'msg' => 'Early Warning System not found.',
                'status' => 'error'
            ];
        }
          //Store the previous image name
        $previousEnglishImage = $warning_data->english_image;
        $previousMarathiImage = $warning_data->marathi_image;

       
                
        $warning_data->english_title = $request['english_title'];
        $warning_data->marathi_title = $request['marathi_title'];
        $warning_data->english_description = $request['english_description'];
        $warning_data->marathi_description = $request['marathi_description'];
        $warning_data->save();        
     
        $last_insert_id = $warning_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Early Warning System.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id){
    try {
        $warning = EarlyWarningSystem::find($id);
        if ($warning) {
            removeImage(Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_DELETE') . $warning->english_image);
            removeImage(Config::get('DocumentConstant.EARLY_WARNING_SYSTEM_DELETE') . $warning->marathi_image);
             
            // Delete the record from the database
            
            $warning->delete();
            
            return $warning;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}