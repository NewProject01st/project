<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	StateEmergencyOperationsCenter
};

class StateEmergencyOperationsCenterRepository  {
	public function getAll()
    {
        try {
            return StateEmergencyOperationsCenter::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/state-emergency-operations-center', $englishImageName);
        $request->marathi_image->storeAs('public/images/state-emergency-operations-center', $marathiImageName);

        $stateemergencyoperationscenter_data = new StateEmergencyOperationsCenter();
        $stateemergencyoperationscenter_data->english_title = $request['english_title'];
        $stateemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $stateemergencyoperationscenter_data->english_description = $request['english_description'];
        $stateemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        $stateemergencyoperationscenter_data->english_image = $englishImageName; // Save the image filename to the database
        $stateemergencyoperationscenter_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $stateemergencyoperationscenter_data->save();       
    dd($stateemergencyoperationscenter_data);
   
        return $stateemergencyoperationscenter_data;
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
        $stateemergencyoperationscenter = StateEmergencyOperationsCenter::find($id);
        if ($stateemergencyoperationscenter) {
            return $stateemergencyoperationscenter;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Organization Chart.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
   
    try {
        $stateemergencyoperationscenter_data = StateEmergencyOperationsCenter::find($request->id);
        
        if (!$stateemergencyoperationscenter_data) {
            return [
                'msg' => 'State Emergency Operations Center not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/state-emergency-operations-center/' . $stateemergencyoperationscenter_data->english_image,
            'public/images/state-emergency-operations-center/' . $stateemergencyoperationscenter_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/state-emergency-operations-center', $englishImageName);
        $request->marathi_image->storeAs('public/images/state-emergency-operations-center', $marathiImageName);


        $stateemergencyoperationscenter_data = StateEmergencyOperationsCenter::find($request->id);
        $stateemergencyoperationscenter_data->english_title = $request['english_title'];
        $stateemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $stateemergencyoperationscenter_data->english_description = $request['english_description'];
        $stateemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        $stateemergencyoperationscenter_data->english_image = $englishImageName; // Save the image filename to the database
        $stateemergencyoperationscenter_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $stateemergencyoperationscenter_data->save();       
     
        return [
            'msg' => 'State Emergency Operations Center updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Organization Chart.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $stateemergencyoperationscenter = StateEmergencyOperationsCenter::find($id);
        if ($stateemergencyoperationscenter) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/state-emergency-operations-center/'.$stateemergencyoperationscenter->english_image,
                'public/images/state-emergency-operations-center/'.$stateemergencyoperationscenter->marathi_image
            ]);

            // Delete the record from the database
            $stateemergencyoperationscenter->delete();
            
            return $stateemergencyoperationscenter;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}


