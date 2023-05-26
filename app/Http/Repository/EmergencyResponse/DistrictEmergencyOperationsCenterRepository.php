<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DistrictEmergencyOperationsCenter
};

class DistrictEmergencyOperationsCenterRepository  {
	public function getAll()
    {
        try {
            return DistrictEmergencyOperationsCenter::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/emergency-response/district-emergency-operations-center', $englishImageName);
        $request->marathi_image->storeAs('public/images/emergency-response/district-emergency-operations-center', $marathiImageName);

        $districtemergencyoperationscenter_data = new DistrictEmergencyOperationsCenter();
        $districtemergencyoperationscenter_data->english_title = $request['english_title'];
        $districtemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $districtemergencyoperationscenter_data->english_description = $request['english_description'];
        $districtemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        $districtemergencyoperationscenter_data->english_image = $englishImageName; // Save the image filename to the database
        $districtemergencyoperationscenter_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $districtemergencyoperationscenter_data->save();       
    // dd($districtemergencyoperationscenter_data);
   
        return $districtemergencyoperationscenter_data;
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
        $districtemergencyoperationscenter = DistrictEmergencyOperationsCenter::find($id);
        if ($districtemergencyoperationscenter) {
            return $districtemergencyoperationscenter;
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
        $districtemergencyoperationscenter_data = DistrictEmergencyOperationsCenter::find($request->id);
        
        if (!$districtemergencyoperationscenter_data) {
            return [
                'msg' => 'State Emergency Operations Center not found.',
                'status' => 'error'
            ];
        }
        
        //Store the previous image name
        $previousEnglishImage = $districtemergencyoperationscenter_data->english_image;
        $previousMarathiImage = $districtemergencyoperationscenter_data->marathi_image;
  

        $districtemergencyoperationscenter_data->english_title = $request['english_title'];
        $districtemergencyoperationscenter_data->marathi_title = $request['marathi_title'];
        $districtemergencyoperationscenter_data->english_description = $request['english_description'];
        $districtemergencyoperationscenter_data->marathi_description = $request['marathi_description'];
        if($request->hasFile('english_image'))
        {
            if($previousEnglishImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/district-emergency-operations-center/' . $previousEnglishImage);
            }
            
            //Store and update new image
             
        $englishImageName = time() . '_english.' . $request->english_image->extension(); 
        $request->english_image->storeAs('public/images/emergency-response/district-emergency-operations-center/', $englishImageName);
        $districtemergencyoperationscenter_data->english_image = $englishImageName;

        }
        if($request->hasFile('marathi_image'))
        {
            if($previousMarathiImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/district-emergency-operations-center/' . $previousMarathiImage);
            }
            
            //Store and update new image
             
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension(); 
        $request->marathi_image->storeAs('public/images/emergency-response/district-emergency-operations-center/', $marathiImageName);
        $districtemergencyoperationscenter_data->marathi_image = $marathiImageName;

        }
        $districtemergencyoperationscenter_data->save();       
     
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
        $districtemergencyoperationscenter = DistrictEmergencyOperationsCenter::find($id);
        if ($districtemergencyoperationscenter) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/emergency-response/district-emergency-operations-center/'.$districtemergencyoperationscenter->english_image,
                'public/images/emergency-response/district-emergency-operations-center/'.$districtemergencyoperationscenter->marathi_image
            ]);

            // Delete the record from the database
            $districtemergencyoperationscenter->delete();
            
            return $districtemergencyoperationscenter;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}