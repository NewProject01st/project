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
        
        $request->english_image->storeAs('public/images/disaster-webportal', $englishImageName);
        $request->marathi_image->storeAs('public/images/disaster-webportal', $marathiImageName);

        
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
                'msg' => 'Disaster Management Web Portal not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $disaster_data->english_image;
        $previousMarathiImage = $disaster_data->marathi_image;

        // Update the fields from the request
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];

        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/disaster-webportal/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/disaster-webportal/', $englishImageName);
            $disaster_data->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/disaster-webportal/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/disaster-webportal/', $marathiImageName);
            $disaster_data->marathi_image = $marathiImageName;
        }

        $disaster_data->save();

        return [
            'msg' => 'Report Incident Crowdsourcing updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Report Incident Crowdsourcing.',
            'status' => 'error',
            'error' => $e->getMessage() // Return the error message for debugging purposes
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
                'public/images/disaster-webportal/'.$disaster_web_portal->english_image,
                'public/images/disaster-webportal/'.$disaster_web_portal->marathi_image
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