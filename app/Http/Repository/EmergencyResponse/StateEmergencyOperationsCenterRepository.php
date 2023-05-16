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

        $disastermanagementportal_data = new StateEmergencyOperationsCenter();
        $disastermanagementportal_data->english_title = $request['english_title'];
        $disastermanagementportal_data->marathi_title = $request['marathi_title'];
        $disastermanagementportal_data->english_description = $request['english_description'];
        $disastermanagementportal_data->marathi_description = $request['marathi_description'];
        $disastermanagementportal_data->english_image = $englishImageName; // Save the image filename to the database
        $disastermanagementportal_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $disastermanagementportal_data->save();       
     
        return $disastermanagementportal_data;
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
        $statedisastermanagementauthority = StateEmergencyOperationsCenter::find($id);
        if ($statedisastermanagementauthority) {
            return $statedisastermanagementauthority;
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
        $disastermanagementportal_data = StateEmergencyOperationsCenter::find($request->id);
        
        if (!$disastermanagementportal_data) {
            return [
                'msg' => 'State Disaster Management Authority not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/aboutus/' . $disastermanagementportal_data->english_image,
            'public/images/aboutus/' . $disastermanagementportal_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/disaster-management-portal', $englishImageName);
        $request->marathi_image->storeAs('public/images/disaster-management-portal', $marathiImageName);


        $disastermanagementportal_data = StateEmergencyOperationsCenter::find($request->id);
        $disastermanagementportal_data->english_title = $request['english_title'];
        $disastermanagementportal_data->marathi_title = $request['marathi_title'];
        $disastermanagementportal_data->english_description = $request['english_description'];
        $disastermanagementportal_data->marathi_description = $request['marathi_description'];
        $disastermanagementportal_data->english_image = $englishImageName; // Save the image filename to the database
        $disastermanagementportal_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $disastermanagementportal_data->save();       
     
        return [
            'msg' => 'State Disaster Management Authority updated successfully.',
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
        $statedisastermanagementauthority = StateEmergencyOperationsCenter::find($id);
        if ($statedisastermanagementauthority) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/aboutus/'.$statedisastermanagementauthority->english_image,
                'public/images/aboutus/'.$statedisastermanagementauthority->marathi_image
            ]);

            // Delete the record from the database
            $statedisastermanagementauthority->delete();
            
            return $statedisastermanagementauthority;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}


