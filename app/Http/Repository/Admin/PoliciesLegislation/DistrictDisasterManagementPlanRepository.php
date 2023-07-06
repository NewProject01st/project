<?php
namespace App\Http\Repository\Admin\PoliciesLegislation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DistrictDisasterManagementPlan
};
use Config;


class DistrictDisasterManagementPlanRepository{
	public function getAll(){
        try {
            return DistrictDisasterManagementPlan::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request){
        try {
            $district_data = new DistrictDisasterManagementPlan();
            $district_data->english_title = $request['english_title'];
            $district_data->marathi_title = $request['marathi_title'];
            $district_data->url = $request['url'];
            $district_data->policies_year = $request['policies_year'];

            $district_data->save();       
            $last_insert_id = $district_data->id;

            $englishPDFName = $last_insert_id . '_english.' . $request->english_pdf->extension();
            $marathiPDFName = $last_insert_id . '_marathi.' . $request->marathi_pdf->extension();
            
            $state = DistrictDisasterManagementPlan::find($last_insert_id); // Assuming $request directly contains the ID
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
            $district_plan = DistrictDisasterManagementPlan::find($id);
            if ($district_plan) {
                return $district_plan;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id District Disaster Management Plan.',
                'status' => 'error'
            ];
        }
    }
    
    public function updateAll($request){
        try {
            $return_data = array();
            $district_data = DistrictDisasterManagementPlan::find($request->id);
            
            if (!$district_data) {
                return [
                    'msg' => 'District Disaster Management Plan data not found.',
                    'status' => 'error'
                ];
            }
        // Store the previous image names
        $previousEnglishPDF = $district_data->english_pdf;
        $previousMarathiPDF = $district_data->marathi_pdf;

        $district_data->english_title = $request['english_title'];
        $district_data->marathi_title = $request['marathi_title'];
        $district_data->url = $request['url'];
        $district_data->policies_year = $request['policies_year'];
    
        $district_data->save();
        $last_insert_id = $district_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_pdf'] = $previousEnglishPDF;
        $return_data['marathi_pdf'] = $previousMarathiPDF;
        return  $return_data;

        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update District Disaster Management Plan data.',
                'status' => 'error'
            ];
        }
    }
    public function updateOne($request){
        try {
            $vacancy = DistrictDisasterManagementPlan::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($vacancy) {
                $is_active = $vacancy->is_active === 1 ? 0 : 1;
                $vacancy->is_active = $is_active;
                $vacancy->save();

                return [
                    'msg' => 'State Disaster Management Plan data updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'State Disaster Management Plan data not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update State Disaster Management Plan data.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id){
        try {
            $district_plan = DistrictDisasterManagementPlan::find($id);
            if ($district_plan) {
                // Delete the images from the storage folder
                if (file_exists_s3(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $district_plan->english_pdf)) {
                    removeImage(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $district_plan->english_pdf);
                }
                if (file_exists_s3(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $district_plan->marathi_pdf)) {
                    removeImage(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $district_plan->marathi_pdf);
                }
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