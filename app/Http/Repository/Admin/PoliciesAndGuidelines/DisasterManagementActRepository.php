<?php
namespace App\Http\Repository\Admin\PoliciesAndGuidelines;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementAct
};
use Config;

class DisasterManagementActRepository{
	public function getAll()
    {
        try {
            return DisasterManagementAct::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
            $data =array();
            $relevant_data = new DisasterManagementAct();
            $relevant_data->english_title = $request['english_title'];
            $relevant_data->marathi_title = $request['marathi_title'];
            $relevant_data->policies_year = $request['policies_year'];

            $relevant_data->save();       
            $last_insert_id = $relevant_data->id;

            $englishPdfName = $last_insert_id . '_' . rand(100000, 999999) . '_english.' . $request->english_pdf->extension();
            $marathiPdfName = $last_insert_id . '_' . rand(100000, 999999) . '_marathi.' . $request->marathi_pdf->extension();
            
            $state = DisasterManagementAct::find($last_insert_id); // Assuming $request directly contains the ID
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
            $disaster_act = DisasterManagementAct::find($id);
            if ($disaster_act) {
                return $disaster_act;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Data.',
                'status' => 'error'
            ];
        }
    }

    public function updateAll($request){
        try {
            $return_data = array();
            $state_data = DisasterManagementAct::find($request->id);
            
            if (!$state_data) {
                return [
                    'msg' => 'Data not found.',
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
    
            return [
                'msg' => 'Data updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Data.',
                'status' => 'error'
            ];
        }
    }

    public function updateOne($request){
        try {
            $vacancy = DisasterManagementAct::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($vacancy) {
                $is_active = $vacancy->is_active === 1 ? 0 : 1;
                $vacancy->is_active = $is_active;
                $vacancy->save();

                return [
                    'msg' => 'Data updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'Data not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update Data.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id){
        try {
            $disaster_act = DisasterManagementAct::find($id);
            if ($disaster_act) {
                // Delete the images from the storage folder
                if (file_exists_s3(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->english_pdf)) {
                    removeImage(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->english_pdf);
                }
                if (file_exists_s3(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->marathi_pdf)) {
                    removeImage(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->marathi_pdf);
                }
                $disaster_act->delete();
                return $disaster_act;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
       
}