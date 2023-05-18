<?php
namespace App\Http\Repository\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	HazardVulnerability
};

class HazardVulnerabilitiesRepository{
	public function getAll()
    {
        try {
            return HazardVulnerability::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/preparedness/hazard-vulnerability', $englishImageName);
        $request->marathi_image->storeAs('public/images/preparedness/hazard-vulnerability', $marathiImageName);

        
        $hazard_data = new HazardVulnerability();
        $hazard_data->english_title = $request['english_title'];
        $hazard_data->marathi_title = $request['marathi_title'];
        $hazard_data->english_description = $request['english_description'];
        $hazard_data->marathi_description = $request['marathi_description'];
        $hazard_data->english_image = $englishImageName;
        $hazard_data->marathi_image =   $marathiImageName;
        $hazard_data->save();       
              
		return $hazard_data;

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
        $hazard = HazardVulnerability::find($id);
        if ($hazard) {
            return $hazard;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Hazard and Vulnerability.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $hazard_data = HazardVulnerability::find($request->id);
        
        if (!$hazard_data) {
            return [
                'msg' => 'Hazard Vulnerability not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/preparedness/hazard-vulnerability/' . $hazard_data->english_image,
            'public/images/preparedness/hazard-vulnerability/' . $hazard_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/preparedness/hazard-vulnerability/', $englishImageName);
        $request->marathi_image->storeAs('public/images/preparedness/hazard-vulnerability/', $marathiImageName);

                
        $hazard_data->english_title = $request['english_title'];
        $hazard_data->marathi_title = $request['marathi_title'];
        $hazard_data->english_description = $request['english_description'];
        $hazard_data->marathi_description = $request['marathi_description'];
        $hazard_data->english_image = $englishImageName;
        $hazard_data->marathi_image =   $marathiImageName;
        $hazard_data->save();        
     
        return [
            'msg' => 'Hazard Vulnerability updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Hazard Vulnerability.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $hazard = HazardVulnerability::find($id);
        if ($hazard) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/preparedness/hazard-vulnerability/'.$hazard->english_image,
                'public/images/preparedness/hazard-vulnerability/'.$hazard->marathi_image
            ]);

            // Delete the record from the database
            
            $hazard->delete();
            
            return $hazard;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}