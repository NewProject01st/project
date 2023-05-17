<?php
namespace App\Http\Repository\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Test
};

class TestRepository{
	public function getAll()
    {
        try {
            return Test::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/test', $englishImageName);
        $request->marathi_image->storeAs('public/images/test', $marathiImageName);

        
        $test = new Test();
        $test->english_title = $request['english_title'];
        $test->marathi_title = $request['marathi_title'];
        $test->english_description = $request['english_description'];
        $test->marathi_description = $request['marathi_description'];
        $test->english_image = $englishImageName;
        $test->marathi_image =   $marathiImageName;
        $test->save();       
              
		return $test;

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
        $hazard = Test::find($id);
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
        $test = Test::find($request->id);
        
        if (!$test) {
            return [
                'msg' => 'Hazard Vulnerability not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/test/' . $test->english_image,
            'public/images/test/' . $test->marathi_image
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/test/', $englishImageName);
        $request->marathi_image->storeAs('public/images/test/', $marathiImageName);

                
        $test->english_title = $request['english_title'];
        $test->marathi_title = $request['marathi_title'];
        $test->english_description = $request['english_description'];
        $test->marathi_description = $request['marathi_description'];
        $test->english_image = $englishImageName;
        $test->marathi_image =   $marathiImageName;
        $test->save();        
     
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
        $hazard = Test::find($id);
        if ($hazard) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/test/'.$hazard->english_image,
                'public/images/test/'.$hazard->marathi_image
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