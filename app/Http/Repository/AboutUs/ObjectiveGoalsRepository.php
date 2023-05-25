<?php
namespace App\Http\Repository\AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ObjectiveGoals
};

class ObjectiveGoalsRepository  {

	public function getAll()
    {
        try {
            return ObjectiveGoals::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/aboutus/objective-goals', $englishImageName);
        $request->marathi_image->storeAs('public/images/aboutus/objective-goals', $marathiImageName);

        $objective_data = new ObjectiveGoals();
        $objective_data->english_title = $request['english_title'];
        $objective_data->marathi_title = $request['marathi_title'];
        $objective_data->english_description = $request['english_description'];
        $objective_data->marathi_description = $request['marathi_description'];
        $objective_data->english_image =  $englishImageName;
        $objective_data->marathi_image =  $marathiImageName;
        $objective_data->save();       
     
		return $objective_data;
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
        $objective = ObjectiveGoals::find($id);
        if ($objective) {
            return $objective;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id budget.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {

        $objectivegoals_data = ObjectiveGoals::find($request->id);

        if (!$objectivegoals_data) {
            return [
                'msg' => 'Objective Goals not found.',
                'status' => 'error'
            ];
        }
        //Store the previous image name
        $previousEnglishImage = $objectivegoals_data->english_image;
        $previousMarathiImage = $objectivegoals_data->marathi_image;

        //Update the fields from request
        $objectivegoals_data->english_title = $request['english_title'];
        $objectivegoals_data->marathi_title = $request['marathi_title'];
        $objectivegoals_data->english_description = $request['english_description'];
        $objectivegoals_data->marathi_description = $request['marathi_description'];
        if($request->hasFile('english_image'))
        {
            if($previousEnglishImage)
            {
                //delete the image if exist
                Storage::delete('public/images/aboutus/objective-goals/' .$previousEnglishImage);
            }

            //store and update new image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/aboutus/objective-goals', $englishImageName);
            $objectivegoals_data->english_image =  $englishImageName;

        }
        if($request->hasFile('marathi_image'))
        {
            if($previousMarathiImage)
            {
                //delete the image if exist
                Storage::delete('public/images/aboutus/objective-goals/' .$previousMarathiImage);
            }

            //store and update new image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/aboutus/objective-goals', $marathiImageName);
            $objectivegoals_data->marathi_image =  $marathiImageName;

        }
        $objectivegoals_data->update();  
        
    //    dd($objectivegoals_data);
        // print_r($objectivegoals_data);
        // die();
     
        return [
            'msg' => 'Objective Goals updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Objective Goals.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $objectivegoals = ObjectiveGoals::destroy($id);
        if ($objectivegoals) {
            Storage::delete([
                'public/images/objective-goals/'.$objectivegoals->marathi_image,
                'public/images/objective-goals/'.$objectivegoals->english_image,
            ]);

            // Delete the record from the database
            $objectivegoals->delete();
            
            return $objectivegoals;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete Objective Goals.',
            'status' => 'error'
        ];
    }
}

}