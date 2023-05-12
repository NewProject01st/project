<?php
namespace App\Http\Repository\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementWebPortal
};

class DisasterManagementWebPortalRepository  {
	public function getAll()
    {
        try {
            return DisasterManagementWebPortal::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/disaster_webportal', $englishImageName);
        $request->marathi_image->storeAs('public/images/disaster_webportal', $marathiImageName);

        
        $disaster_data = new DisasterManagementWebPortal();
        $disaster_data->english_name = $request['english_name'];
        $disaster_data->marathi_name = $request['marathi_name'];
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_designation = $request['english_designation'];
        $disaster_data->marathi_designation = $request['marathi_designation'];
        $disaster_data->english_image = $englishImageName;
        $disaster_data->marathi_image = $marathiImageName;
        $disaster_data->save();       
              
		return $disaster_data;

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
        $disaster_web_portal = DisasterManagementWebPortal::find($id);
        if ($disaster_web_portal) {
            return $disaster_web_portal;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id DisasterManagementWebPortal.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $disaster_data = DisasterManagementWebPortal::find($request->id);
        
        if (!$disaster_data) {
            return [
                'msg' => 'DisasterManagementWebPortal not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/disaster_webportal/' . $disaster_data->english_image,
            'public/images/disaster_webportal/' . $disaster_data->marathi_image
        ]);
                
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/disaster_webportal', $englishImageName);
        $request->marathi_image->storeAs('public/images/disaster_webportal', $marathiImageName);

        $disaster_data->english_name = $request['english_name'];
        $disaster_data->marathi_name = $request['marathi_name'];
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_designation = $request['english_designation'];
        $disaster_data->marathi_designation = $request['marathi_designation'];
        $disaster_data->english_image = $englishImageName;
        $disaster_data->marathi_image = $marathiImageName;
        $disaster_data->save();        
     
        return [
            'msg' => 'DisasterManagementWebPortal updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update DisasterManagementWebPortal.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $disaster_web_portal = DisasterManagementWebPortal::find($id);
        if ($disaster_web_portal) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/images/disaster_webportal/'.$disaster_web_portal->english_image,
                'public/images/disaster_webportal/'.$disaster_web_portal->marathi_image
            ]);

            // Delete the record from the database
            $disaster_web_portal->delete();
            
            return $disaster_web_portal;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}