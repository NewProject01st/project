<?php
namespace App\Http\Repository\PoliciesLegislation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DistrictDisasterManagementPlan
};

class DistrictDisasterManagementPlanRepository{
	public function getAll()
    {
        try {
            return DistrictDisasterManagementPlan::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/policies-legislation/district-plan', $englishImageName);
        $request->marathi_image->storeAs('public/images/policies-legislation/district-plan', $marathiImageName);

        
        $district_data = new DistrictDisasterManagementPlan();
        $district_data->english_title = $request['english_title'];
        $district_data->marathi_title = $request['marathi_title'];
        $district_data->english_description = $request['english_description'];
        $district_data->marathi_description = $request['marathi_description'];
        $district_data->english_image = $englishImageName;
        $district_data->marathi_image =   $marathiImageName;
        $district_data->save();       
              
		return $district_data;

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
        $district_plan = DistrictDisasterManagementPlan::find($id);
        if ($district_plan) {
            return $district_plan;
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
        $district_data = DistrictDisasterManagementPlan::find($request->id);
        
        if (!$district_data) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $district_data->english_image;
       $previousMarathiImage = $district_data->marathi_image;

        $district_data->english_title = $request['english_title'];
        $district_data->marathi_title = $request['marathi_title'];
        $district_data->english_description = $request['english_description'];
        $district_data->marathi_description = $request['marathi_description'];
       
        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/policies-legislation/district-plan/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/policies-legislation/district-plan/', $englishImageName);
            $district_data->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/policies-legislation/district-plan/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/policies-legislation/district-plan/', $marathiImageName);
            $district_data->marathi_image = $marathiImageName;
        }

        $district_data->save();        
     
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
        $district_plan = DistrictDisasterManagementPlan::find($id);
        if ($district_plan) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/policies-legislation/district-plan/'.$district_plan->english_image,
                'public/images/policies-legislation/district-plan/'.$district_plan->marathi_image
            ]);

            // Delete the record from the database
            
            $district_plan->delete();
            
            return $district_plan;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}