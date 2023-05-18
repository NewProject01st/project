<?php
namespace App\Http\Repository\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	EarlyWarningSystem
};

class EarlyWarningSystemRepository{
	public function getAll()
    {
        try {
            return EarlyWarningSystem::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/preparedness/early-warning', $englishImageName);
        $request->marathi_image->storeAs('public/images/preparedness/early-warning', $marathiImageName);

        
        $warning_data = new EarlyWarningSystem();
        $warning_data->english_title = $request['english_title'];
        $warning_data->marathi_title = $request['marathi_title'];
        $warning_data->english_description = $request['english_description'];
        $warning_data->marathi_description = $request['marathi_description'];
        $warning_data->english_image = $englishImageName;
        $warning_data->marathi_image =   $marathiImageName;
        $warning_data->save();       
              
		return $warning_data;

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
        $warning = EarlyWarningSystem::find($id);
        if ($warning) {
            return $warning;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Early Warning System.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $warning_data = EarlyWarningSystem::find($request->id);
        
        if (!$warning_data) {
            return [
                'msg' => 'Early Warning System not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/preparedness/early-warning/' . $warning_data->english_image,
            'public/images/preparedness/early-warning/' . $warning_data->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/preparedness/early-warning/', $englishImageName);
        $request->marathi_image->storeAs('public/images/preparedness/early-warning/', $marathiImageName);

                
        $warning_data->english_title = $request['english_title'];
        $warning_data->marathi_title = $request['marathi_title'];
        $warning_data->english_description = $request['english_description'];
        $warning_data->marathi_description = $request['marathi_description'];
        $warning_data->english_image = $englishImageName;
        $warning_data->marathi_image =   $marathiImageName;
        $warning_data->save();        
     
        return [
            'msg' => 'Early Warning System updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Early Warning System.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $warning = EarlyWarningSystem::find($id);
        if ($warning) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/preparedness/early-warning/'.$warning->english_image,
                'public/images/preparedness/early-warning/'.$warning->marathi_image
            ]);

            // Delete the record from the database
            
            $warning->delete();
            
            return $warning;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}