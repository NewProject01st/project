<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	EvacuationPlans
};

class EvacuationPlansRepository  {
	public function getAll()
    {
        try {
            return EvacuationPlans::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/emergency-response/evacuation-plans', $englishImageName);
        $request->marathi_image->storeAs('public/images/emergency-response/evacuation-plans', $marathiImageName);

        $evacuationplans_data = new EvacuationPlans();
        $evacuationplans_data->english_title = $request['english_title'];
        $evacuationplans_data->marathi_title = $request['marathi_title'];
        $evacuationplans_data->english_description = $request['english_description'];
        $evacuationplans_data->marathi_description = $request['marathi_description'];
        $evacuationplans_data->english_image = $englishImageName; // Save the image filename to the database
        $evacuationplans_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $evacuationplans_data->save();       
     
        return $evacuationplans_data;
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
        $statedisastermanagementauthority = EvacuationPlans::find($id);
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
        $evacuationplans_data = EvacuationPlans::find($request->id);
        
        if (!$evacuationplans_data) {
            return [
                'msg' => 'State Disaster Management Authority not found.',
                'status' => 'error'
            ];
        }
         
        //Store the previous image name
        $previousEnglishImage = $evacuationplans_data->english_image;
        $previousMarathiImage = $evacuationplans_data->marathi_image;
  


        $evacuationplans_data = EvacuationPlans::find($request->id);
        $evacuationplans_data->english_title = $request['english_title'];
        $evacuationplans_data->marathi_title = $request['marathi_title'];
        $evacuationplans_data->english_description = $request['english_description'];
        $evacuationplans_data->marathi_description = $request['marathi_description'];
        if($request->hasFile('english_image'))
        {
            if($previousEnglishImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/evacuation-plans/' . $previousEnglishImage);
            }
            
            //Store and update new image
             
        $englishImageName = time() . '_english.' . $request->english_image->extension(); 
        $request->english_image->storeAs('public/images/emergency-response/evacuation-plans/', $englishImageName);
        $evacuationplans_data->english_image = $englishImageName;

        }
        if($request->hasFile('marathi_image'))
        {
            if($previousMarathiImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/evacuation-plans/' . $previousMarathiImage);
            }
            
            //Store and update new image
             
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension(); 
        $request->marathi_image->storeAs('public/images/emergency-response/evacuation-plans/', $marathiImageName);
        $evacuationplans_data->marathi_image = $marathiImageName;

        }
        $evacuationplans_data->save();       
     
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
        $statedisastermanagementauthority = EvacuationPlans::find($id);
        if ($statedisastermanagementauthority) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/emergency-response/evacuation-plans/'.$statedisastermanagementauthority->english_image,
                'public/images/emergency-response/evacuation-plans/'.$statedisastermanagementauthority->marathi_image
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