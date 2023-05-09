<?php
namespace App\Http\Repository\AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	StateDisasterManagementAuthority
};

class StateDisasterManagementAuthorityRepository  {
	public function getAll()
    {
        try {
            return StateDisasterManagementAuthority::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/state-disaster-management-authority', $englishImageName);
        $request->marathi_image->storeAs('public/images/state-disaster-management-authority', $marathiImageName);

        $statedisastermanagementauthority_data = new StateDisasterManagementAuthority();
        $statedisastermanagementauthority_data->english_title = $request['english_title'];
        $statedisastermanagementauthority_data->marathi_title = $request['marathi_title'];
        $statedisastermanagementauthority_data->english_description = $request['english_description'];
        $statedisastermanagementauthority_data->marathi_description = $request['marathi_description'];
        $statedisastermanagementauthority_data->english_image = $englishImageName; // Save the image filename to the database
        $statedisastermanagementauthority_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $statedisastermanagementauthority_data->save();       
     
        return $statedisastermanagementauthority_data;
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
        $statedisastermanagementauthority = StateDisasterManagementAuthority::find($id);
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
        $statedisastermanagementauthority_data = StateDisasterManagementAuthority::find($request->id);
        
        if (!$statedisastermanagementauthority_data) {
            return [
                'msg' => 'State Disaster Management Authority not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/aboutus/' . $statedisastermanagementauthority_data->english_image,
            'public/images/aboutus/' . $statedisastermanagementauthority_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/state-disaster-management-authority', $englishImageName);
        $request->marathi_image->storeAs('public/images/state-disaster-management-authority', $marathiImageName);


        $statedisastermanagementauthority_data = StateDisasterManagementAuthority::find($request->id);
        $statedisastermanagementauthority_data->english_title = $request['english_title'];
        $statedisastermanagementauthority_data->marathi_title = $request['marathi_title'];
        $statedisastermanagementauthority_data->english_description = $request['english_description'];
        $statedisastermanagementauthority_data->marathi_description = $request['marathi_description'];
        $statedisastermanagementauthority_data->english_image = $englishImageName; // Save the image filename to the database
        $statedisastermanagementauthority_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $statedisastermanagementauthority_data->save();       
     
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
        $statedisastermanagementauthority = StateDisasterManagementAuthority::find($id);
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


