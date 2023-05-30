<?php
namespace App\Http\Repository\PoliciesLegislation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	StateDisasterManagementPolicy
};

class StateDisasterManagementPolicyRepository{
	public function getAll()
    {
        try {
            return StateDisasterManagementPolicy::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/policies-legislation/state-policy', $englishImageName);
        $request->marathi_image->storeAs('public/images/policies-legislation/state-policy', $marathiImageName);

        
        $state_data = new StateDisasterManagementPolicy();
        $state_data->english_title = $request['english_title'];
        $state_data->marathi_title = $request['marathi_title'];
        $state_data->english_description = $request['english_description'];
        $state_data->marathi_description = $request['marathi_description'];
        $state_data->english_image = $englishImageName;
        $state_data->marathi_image =   $marathiImageName;
        $state_data->save();       
              
		return $state_data;

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
        $state_plan = StateDisasterManagementPolicy::find($id);
        if ($state_plan) {
            return $state_plan;
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
        $state_data = StateDisasterManagementPolicy::find($request->id);
        
        if (!$state_data) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $state_data->english_image;
       $previousMarathiImage = $state_data->marathi_image;

        $state_data->english_title = $request['english_title'];
        $state_data->marathi_title = $request['marathi_title'];
        $state_data->english_description = $request['english_description'];
        $state_data->marathi_description = $request['marathi_description'];
       
        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/policies-legislation/state-policy/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/policies-legislation/state-policy/', $englishImageName);
            $state_data->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/citizen-action/state-policy/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/policies-legislation/state-policy/', $marathiImageName);
            $state_data->marathi_image = $marathiImageName;
        }

        $state_data->save();        
     
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
        $state_plan = StateDisasterManagementPolicy::find($id);
        if ($state_plan) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/policies-legislation/state-policy/'.$state_plan->english_image,
                'public/images/policies-legislation/state-policy/'.$state_plan->marathi_image
            ]);

            // Delete the record from the database
            
            $state_plan->delete();
            
            return $state_plan;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}