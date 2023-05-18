<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ReliefMeasuresResources
};

class ReliefMeasuresResourcesRepository  {
	public function getAll()
    {
        try {
            return ReliefMeasuresResources::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/emergency-response/relief-measures-resources', $englishImageName);
        $request->marathi_image->storeAs('public/images/emergency-response/relief-measures-resources', $marathiImageName);

        $reliefmeasuresresources_data = new ReliefMeasuresResources();
        $reliefmeasuresresources_data->english_title = $request['english_title'];
        $reliefmeasuresresources_data->marathi_title = $request['marathi_title'];
        $reliefmeasuresresources_data->english_description = $request['english_description'];
        $reliefmeasuresresources_data->marathi_description = $request['marathi_description'];
        $reliefmeasuresresources_data->english_image = $englishImageName; // Save the image filename to the database
        $reliefmeasuresresources_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $reliefmeasuresresources_data->save();       
        
        return $reliefmeasuresresources_data;

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
        $reliefmeasuresresources = ReliefMeasuresResources::find($id);
        if ($reliefmeasuresresources) {
            return $reliefmeasuresresources;
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
        $reliefmeasuresresources_data = ReliefMeasuresResources::find($request->id);
        
        if (!$reliefmeasuresresources_data) {
            return [
                'msg' => 'Relief Measures Resources not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/emergency-response/relief-measures-resources/' . $reliefmeasuresresources_data->english_image,
            'public/images/emergency-response/relief-measures-resources/' . $reliefmeasuresresources_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/emergency-response/relief-measures-resources', $englishImageName);
        $request->marathi_image->storeAs('public/images/emergency-response/relief-measures-resources', $marathiImageName);


        $reliefmeasuresresources_data = ReliefMeasuresResources::find($request->id);
        $reliefmeasuresresources_data->english_title = $request['english_title'];
        $reliefmeasuresresources_data->marathi_title = $request['marathi_title'];
        $reliefmeasuresresources_data->english_description = $request['english_description'];
        $reliefmeasuresresources_data->marathi_description = $request['marathi_description'];
        $reliefmeasuresresources_data->english_image = $englishImageName; // Save the image filename to the database
        $reliefmeasuresresources_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $reliefmeasuresresources_data->save();       
     
        return [
            'msg' => 'Relief Measures Resources updated successfully.',
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
        $reliefmeasuresresources = ReliefMeasuresResources::find($id);
        if ($reliefmeasuresresources) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/emergency-response/relief-measures-resources/'.$reliefmeasuresresources->english_image,
                'public/images/emergency-response/relief-measures-resources/'.$reliefmeasuresresources->marathi_image
            ]);

            // Delete the record from the database
            $reliefmeasuresresources->delete();
            
            return $reliefmeasuresresources;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}


