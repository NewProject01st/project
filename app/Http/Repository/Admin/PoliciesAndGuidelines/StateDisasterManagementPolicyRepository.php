<?php
namespace App\Http\Repository\Admin\PoliciesAndGuidelines;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	StateDisasterManagementPolicy
};
use Config;

class StateDisasterManagementPolicyRepository{
	public function getAll(){
        try {
            return StateDisasterManagementPolicy::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
            $data =array();
            $state_data = new StateDisasterManagementPolicy();
            $state_data->english_title = $request['english_title'];
            $state_data->marathi_title = $request['marathi_title'];
            $state_data->policies_year = $request['policies_year'];

            $state_data->save();       
            $last_insert_id = $state_data->id;

            $englishPdfName = $last_insert_id . '_' . rand(100000, 999999) . '_english.' . $request->english_pdf->extension();
            $marathiPdfName = $last_insert_id . '_' . rand(100000, 999999) . '_marathi.' . $request->marathi_pdf->extension();
            
            $state = StateDisasterManagementPolicy::find($last_insert_id); // Assuming $request directly contains the ID
            $state->english_pdf = $englishPdfName; // Save the image filename to the database
            $state->marathi_pdf = $marathiPdfName; // Save the image filename to the database
            $state->save();
            
            $data['englishPdfName'] =$englishPdfName;
            $data['marathiPdfName'] =$marathiPdfName;
            return $data;

        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }

    public function getById($id){
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
                'msg' => 'Failed to get by id State Disaster Management Policy.',
                'status' => 'error'
            ];
        }
    }
    
    public function updateAll($request){
        try {
            $return_data = array();
            $state_data = StateDisasterManagementPolicy::find($request->id);
            
            if (!$state_data) {
                return [
                    'msg' => 'State Disaster Management Policy data not found.',
                    'status' => 'error'
                ];
            }
       // Store the previous image names
       $previousEnglishPDF = $state_data->english_pdf;
       $previousMarathiPDF = $state_data->marathi_pdf;

       $state_data->english_title = $request['english_title'];
       $state_data->marathi_title = $request['marathi_title'];
       $state_data->policies_year = $request['policies_year'];
   
       $state_data->save();
       $last_insert_id = $state_data->id;

       $return_data['last_insert_id'] = $last_insert_id;
       $return_data['english_pdf'] = $previousEnglishPDF;
       $return_data['marathi_pdf'] = $previousMarathiPDF;
       
     
       return  $return_data;

        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update State Disaster Management Policy data.',
                'status' => 'error'
            ];
        }
    }
    public function updateOne($request){
        try {
            $vacancy = StateDisasterManagementPolicy::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($vacancy) {
                $is_active = $vacancy->is_active === 1 ? 0 : 1;
                $vacancy->is_active = $is_active;
                $vacancy->save();

                return [
                    'msg' => 'State Disaster Management Policy data updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'State Disaster Management Policy data not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update State Disaster Management Policy data.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id){
        try {
            $state_plan = StateDisasterManagementPolicy::find($id);
            if ($state_plan) {
                // Delete the images from the storage folder
                if (file_exists_s3(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $state_plan->english_pdf)) {
                    removeImage(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $state_plan->english_pdf);
                }
                if (file_exists_s3(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $state_plan->marathi_pdf)) {
                    removeImage(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $state_plan->marathi_pdf);
                }
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