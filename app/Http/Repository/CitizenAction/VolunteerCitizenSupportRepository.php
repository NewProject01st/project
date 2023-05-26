<?php
namespace App\Http\Repository\CitizenAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	VolunteerCitizenSupport
};

class VolunteerCitizenSupportRepository{
	public function getAll()
    {
        try {
            return VolunteerCitizenSupport::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/citizen-action/volunteer', $englishImageName);
        $request->marathi_image->storeAs('public/images/citizen-action/volunteer', $marathiImageName);

        
        $volunteer_data = new VolunteerCitizenSupport();
        $volunteer_data->english_title = $request['english_title'];
        $volunteer_data->marathi_title = $request['marathi_title'];
        $volunteer_data->english_description = $request['english_description'];
        $volunteer_data->marathi_description = $request['marathi_description'];
        $volunteer_data->english_image = $englishImageName;
        $volunteer_data->marathi_image =   $marathiImageName;
        $volunteer_data->save();       
              
		return $volunteer_data;

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
        $volunteer = VolunteerCitizenSupport::find($id);
        if ($volunteer) {
            return $volunteer;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Volunteer Citizen Support.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $volunteer_data = VolunteerCitizenSupport::find($request->id);
        
        if (!$volunteer_data) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
        // Store the previous image names
        $previousEnglishImage = $volunteer_data->english_image;
        $previousMarathiImage = $volunteer_data->marathi_image;
                
        $volunteer_data->english_title = $request['english_title'];
        $volunteer_data->marathi_title = $request['marathi_title'];
        $volunteer_data->english_description = $request['english_description'];
        $volunteer_data->marathi_description = $request['marathi_description'];
       
        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/citizen-action/volunteer/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/citizen-action/volunteer/', $englishImageName);
            $volunteer_data->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/citizen-action/volunteer/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/citizen-action/volunteer/', $marathiImageName);
            $volunteer_data->marathi_image = $marathiImageName;
        }

        $volunteer_data->save();        
     
        return [
            'msg' => 'volunteer data updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update volunteer data.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $volunteer = VolunteerCitizenSupport::find($id);
        if ($volunteer) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/citizen-action/volunteer/'.$volunteer->english_image,
                'public/images/citizen-action/volunteer/'.$volunteer->marathi_image
            ]);

            // Delete the record from the database
            
            $volunteer->delete();
            
            return $volunteer;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}