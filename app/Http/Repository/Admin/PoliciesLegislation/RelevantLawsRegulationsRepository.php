<?php
namespace App\Http\Repository\Admin\PoliciesLegislation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	RelevantLawsRegulation
};
use Config;

class RelevantLawsRegulationsRepository{
	public function getAll()
    {
        try {
            return RelevantLawsRegulation::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
        
            $relevant_data = new RelevantLawsRegulation();
            $relevant_data->english_title = $request['english_title'];
            $relevant_data->marathi_title = $request['marathi_title'];
            $relevant_data->english_description = $request['english_description'];
            $relevant_data->marathi_description = $request['marathi_description'];
    
            $relevant_data->save();       
            $last_insert_id = $relevant_data->id;

            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            
            $relevant = RelevantLawsRegulation::find($last_insert_id); // Assuming $request directly contains the ID
            $relevant->english_image = $englishImageName; // Save the image filename to the database
            $relevant->marathi_image = $marathiImageName; // Save the image filename to the database
            $relevant->save();
            
            return $last_insert_id;

        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }

    public function getById($id){
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
                'msg' => 'Failed to get by id Relevant Laws Regulations.',
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request){
        try {
            $return_data = array();
            $relevant_laws = RelevantLawsRegulation::find($request->id);
            
            if (!$relevant_laws) {
                return [
                    'msg' => 'Relevant Laws Regulations data not found.',
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
        
            $relevant_laws->save();
            $last_insert_id = $relevant_laws->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;

        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Relevant Laws Regulations data.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id){
        try {
            $relevant_laws = RelevantLawsRegulation::find($id);
            if ($relevant_laws) {
                // Delete the images from the storage folder
                unlink(storage_path(Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_DELETE') . $relevant_laws->english_image));
                unlink(storage_path(Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_DELETE') . $relevant_laws->marathi_image));
                $relevant_laws->delete();
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