<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	SearchRescueTeams
};

class SearchRescueTeamsRepository  {
	public function getAll()
    {
        try {
            return SearchRescueTeams::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/emergency-response/search-rescue-teams', $englishImageName);
        $request->marathi_image->storeAs('public/images/emergency-response/search-rescue-teams', $marathiImageName);

        $searchrescueteams_data = new SearchRescueTeams();
        $searchrescueteams_data->english_title = $request['english_title'];
        $searchrescueteams_data->marathi_title = $request['marathi_title'];
        $searchrescueteams_data->english_description = $request['english_description'];
        $searchrescueteams_data->marathi_description = $request['marathi_description'];
        $searchrescueteams_data->english_image = $englishImageName; // Save the image filename to the database
        $searchrescueteams_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $searchrescueteams_data->save();       
     
        return $searchrescueteams_data;
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
        $searchrescueteams = SearchRescueTeams::find($id);
        if ($searchrescueteams) {
            return $searchrescueteams;
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
        $searchrescueteams_data = SearchRescueTeams::find($request->id);
        
        if (!$searchrescueteams_data) {
            return [
                'msg' => 'Relief Measures Resources not found.',
                'status' => 'error'
            ];
        }
        
         
        //Store the previous image name
        $previousEnglishImage = $searchrescueteams_data->english_image;
        $previousMarathiImage = $searchrescueteams_data->marathi_image;
  


        $searchrescueteams_data = SearchRescueTeams::find($request->id);
        $searchrescueteams_data->english_title = $request['english_title'];
        $searchrescueteams_data->marathi_title = $request['marathi_title'];
        $searchrescueteams_data->english_description = $request['english_description'];
        $searchrescueteams_data->marathi_description = $request['marathi_description'];
        if($request->hasFile('english_image'))
        {
            if($previousEnglishImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/search-rescue-teams/' . $previousEnglishImage);
            }
            
            //Store and update new image
             
        $englishImageName = time() . '_english.' . $request->english_image->extension(); 
        $request->english_image->storeAs('public/images/emergency-response/search-rescue-teams/', $englishImageName);
        $searchrescueteams_data->english_image = $englishImageName;

        }
        if($request->hasFile('marathi_image'))
        {
            if($previousMarathiImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/search-rescue-teams/' . $previousMarathiImage);
            }
            
            //Store and update new image
             
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension(); 
        $request->marathi_image->storeAs('public/images/emergency-response/search-rescue-teams/', $marathiImageName);
        $searchrescueteams_data->marathi_image = $marathiImageName;

        }
        $searchrescueteams_data->save();       
     
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
        $searchrescueteams = SearchRescueTeams::find($id);
        if ($searchrescueteams) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/emergency-response/search-rescue-teams/'.$searchrescueteams->english_image,
                'public/images/emergency-response/search-rescue-teams/'.$searchrescueteams->marathi_image
            ]);

            // Delete the record from the database
            $searchrescueteams->delete();
            
            return $searchrescueteams;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}