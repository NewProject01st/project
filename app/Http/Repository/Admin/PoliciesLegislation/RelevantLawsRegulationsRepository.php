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
            $relevant_data->url = $request['url'];

            $relevant_data->save();       
            $last_insert_id = $relevant_data->id;

            $englishPDFName = $last_insert_id . '_english.' . $request->english_pdf->extension();
            $marathiPDFName = $last_insert_id . '_marathi.' . $request->marathi_pdf->extension();
            
            $state = RelevantLawsRegulation::find($last_insert_id); // Assuming $request directly contains the ID
            $state->english_pdf = $englishPDFName; // Save the image filename to the database
            $state->marathi_pdf = $marathiPDFName; // Save the image filename to the database
            $state->save();
            
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
            $previousEnglishPDF = $relevant_laws->english_pdf;
            $previousMarathiPDF = $relevant_laws->marathi_pdf;

            $relevant_laws->english_title = $request['english_title'];
            $relevant_laws->marathi_title = $request['marathi_title'];
            $relevant_laws->url = $request['url'];
        
            $relevant_laws->save();
            $last_insert_id = $relevant_laws->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_pdf'] = $previousEnglishPDF;
            $return_data['marathi_pdf'] = $previousMarathiPDF;
            return  $return_data;

        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Relevant Laws Regulations data.',
                'status' => 'error'
            ];
        }
    }
    public function updateOne($request){
        try {
            $vacancy = RelevantLawsRegulation::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($vacancy) {
                $is_active = $vacancy->is_active === 1 ? 0 : 1;
                $vacancy->is_active = $is_active;
                $vacancy->save();

                return [
                    'msg' => 'Relevant Laws Regulations data updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'Relevant Laws Regulations data not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
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
                if (file_exists(storage_path(Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_DELETE') . $relevant_laws->english_pdf))) {
                    unlink(storage_path(Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_DELETE') . $relevant_laws->english_pdf));
                }
                if (file_exists(storage_path(Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_DELETE') . $relevant_laws->marathi_pdf))) {
                    unlink(storage_path(Config::get('DocumentConstant.RELEVANT_LAWS_REGULATIONS_DELETE') . $relevant_laws->marathi_pdf));
                }
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