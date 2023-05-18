<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	EmergencyContactNumbers
};

class EmergencyContactNumbersRepository  {
	public function getAll()
    {
        try {
            return EmergencyContactNumbers::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/emergency-response/emergency-contact-numbers', $englishImageName);
        $request->marathi_image->storeAs('public/images/emergency-response/emergency-contact-numbers', $marathiImageName);

        $emergencycontactnumbers_data = new EmergencyContactNumbers();
        $emergencycontactnumbers_data->english_title = $request['english_title'];
        $emergencycontactnumbers_data->marathi_title = $request['marathi_title'];
        $emergencycontactnumbers_data->english_description = $request['english_description'];
        $emergencycontactnumbers_data->marathi_description = $request['marathi_description'];
        $emergencycontactnumbers_data->english_image = $englishImageName; // Save the image filename to the database
        $emergencycontactnumbers_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $emergencycontactnumbers_data->save();       
     
        return $emergencycontactnumbers_data;
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
        $emergencycontactnumbers = EmergencyContactNumbers::find($id);
        if ($emergencycontactnumbers) {
            return $emergencycontactnumbers;
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
        $emergencycontactnumbers_data = EmergencyContactNumbers::find($request->id);
        
        if (!$emergencycontactnumbers_data) {
            return [
                'msg' => 'Emergency Contact Numbers not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/emergency-response/emergency-contact-numbers/' . $emergencycontactnumbers_data->english_image,
            'public/images/emergency-response/emergency-contact-numbers/' . $emergencycontactnumbers_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/emergency-response/emergency-contact-numbers', $englishImageName);
        $request->marathi_image->storeAs('public/images/emergency-response/emergency-contact-numbers', $marathiImageName);


        $emergencycontactnumbers_data = EmergencyContactNumbers::find($request->id);
        $emergencycontactnumbers_data->english_title = $request['english_title'];
        $emergencycontactnumbers_data->marathi_title = $request['marathi_title'];
        $emergencycontactnumbers_data->english_description = $request['english_description'];
        $emergencycontactnumbers_data->marathi_description = $request['marathi_description'];
        $emergencycontactnumbers_data->english_image = $englishImageName; // Save the image filename to the database
        $emergencycontactnumbers_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $emergencycontactnumbers_data->save();       
     
        return [
            'msg' => 'Emergency Contact Numbers updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update ReliefMeasures Resources.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $emergencycontactnumbers = EmergencyContactNumbers::find($id);
        if ($emergencycontactnumbers) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/emergency-response/emergency-contact-numbers/'.$emergencycontactnumbers->english_image,
                'public/images/emergency-response/emergency-contact-numbers/'.$emergencycontactnumbers->marathi_image
            ]);

            // Delete the record from the database
            $emergencycontactnumbers->delete();
            
            return $emergencycontactnumbers;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}


