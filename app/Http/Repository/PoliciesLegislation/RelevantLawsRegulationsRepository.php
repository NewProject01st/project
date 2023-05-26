<?php
namespace App\Http\Repository\PoliciesLegislation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	RelevantLawsRegulation
};

class RelevantLawsRegulationsRepository{
	public function getAll()
    {
        try {
            return RelevantLawsRegulation::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/policies-legislation/relevant-laws', $englishImageName);
        $request->marathi_image->storeAs('public/images/policies-legislation/relevant-laws', $marathiImageName);

        
        $relevant_data = new RelevantLawsRegulation();
        $relevant_data->english_title = $request['english_title'];
        $relevant_data->marathi_title = $request['marathi_title'];
        $relevant_data->english_description = $request['english_description'];
        $relevant_data->marathi_description = $request['marathi_description'];
        $relevant_data->english_image = $englishImageName;
        $relevant_data->marathi_image =   $marathiImageName;
        $relevant_data->save();       
              
		return $relevant_data;

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
        $relevant_laws = RelevantLawsRegulation::find($id);
        if ($relevant_laws) {
            return $relevant_laws;
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
        $relevant_laws = RelevantLawsRegulation::find($request->id);
        
        if (!$relevant_laws) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $relevant_laws->english_image;
       $previousMarathiImage = $relevant_laws->marathi_image;

        $relevant_laws->english_title = $request['english_title'];
        $relevant_laws->marathi_title = $request['marathi_title'];
        $relevant_laws->english_description = $request['english_description'];
        $relevant_laws->marathi_description = $request['marathi_description'];
       
        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/policies-legislation/relevant-laws/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/policies-legislation/relevant-laws/', $englishImageName);
            $relevant_laws->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/citizen-action/relevant-laws/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/policies-legislation/state-policy/', $marathiImageName);
            $relevant_laws->marathi_image = $marathiImageName;
        }

        $relevant_laws->save();        
     
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
        $relevant_laws = RelevantLawsRegulation::find($id);
        if ($relevant_laws) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/policies-legislation/relevant-laws/'.$relevant_laws->english_image,
                'public/images/policies-legislation/relevant-laws/'.$relevant_laws->marathi_image
            ]);

            // Delete the record from the database
            
            $relevant_laws->delete();
            
            return $relevant_laws;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}