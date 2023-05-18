<?php
namespace App\Http\Repository\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	PublicAwarenessEducation
};

class PublicAwarenessEducationRepository{
	public function getAll()
    {
        try {
            return PublicAwarenessEducation::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/awareness-education', $englishImageName);
        $request->marathi_image->storeAs('public/images/awareness-education', $marathiImageName);

        
        $awareness_data = new PublicAwarenessEducation();
        $awareness_data->english_title = $request['english_title'];
        $awareness_data->marathi_title = $request['marathi_title'];
        $awareness_data->english_description = $request['english_description'];
        $awareness_data->marathi_description = $request['marathi_description'];
        $awareness_data->english_image = $englishImageName;
        $awareness_data->marathi_image =   $marathiImageName;
        $awareness_data->save();       
              
		return $awareness_data;

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
        $awareness = PublicAwarenessEducation::find($id);
        if ($awareness) {
            return $awareness;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Public Awareness Education.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $awareness_data = PublicAwarenessEducation::find($request->id);
        
        if (!$awareness_data) {
            return [
                'msg' => 'Public Awareness Education not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/awareness-education/' . $awareness_data->english_image,
            'public/images/awareness-education/' . $awareness_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/awareness-education/', $englishImageName);
        $request->marathi_image->storeAs('public/images/awareness-education/', $marathiImageName);

                
        $awareness_data->english_title = $request['english_title'];
        $awareness_data->marathi_title = $request['marathi_title'];
        $awareness_data->english_description = $request['english_description'];
        $awareness_data->marathi_description = $request['marathi_description'];
        $awareness_data->english_image = $englishImageName;
        $awareness_data->marathi_image =   $marathiImageName;
        $awareness_data->save();        
     
        return [
            'msg' => 'Public Awareness Education updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Public Awareness Education.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $awareness = PublicAwarenessEducation::find($id);
        if ($awareness) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/awareness-education/'.$awareness->english_image,
                'public/images/awareness-education/'.$awareness->marathi_image
            ]);

            // Delete the record from the database
            
            $awareness->delete();
            
            return $awareness;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}