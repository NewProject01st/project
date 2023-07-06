<?php
namespace App\Http\Services\Admin\PoliciesLegislation;

use App\Http\Repository\Admin\PoliciesLegislation\DistrictDisasterManagementPlanRepository;

use App\Models\
{ DistrictDisasterManagementPlan };
use Carbon\Carbon;
use Config;
use Storage;



class DistrictDisasterManagementPlanServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct(){
        $this->repo = new DistrictDisasterManagementPlanRepository();
    }
    public function getAll(){
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request){
        try {          
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_ADD');
            $englishPDFName = $last_id . '_english.' . $request->english_pdf->extension();
            $marathiPDFName = $last_id . '_marathi.' . $request->marathi_pdf->extension();
            uploadImage($request, 'english_pdf', $path, $englishPDFName);
            uploadImage($request, 'marathi_pdf', $path, $marathiPDFName);
                   
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'District Disaster Management Plan Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'District Disaster Management Plan Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateAll($request){
        try {
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_ADD');
            if ($request->hasFile('english_pdf')) {
                if ($return_data['english_pdf']) {
                    $delete_file_eng= Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $return_data['english_pdf'];
                    if(file_exists_s3($delete_file_eng)){
                        removeImage($delete_file_eng);
                    }
                }
    
                $englishPDFName = $return_data['last_insert_id'] . '_english.' . $request->english_pdf->extension();
                uploadImage($request, 'english_pdf', $path, $englishPDFName);
                $district_plan = DistrictDisasterManagementPlan::find($return_data['last_insert_id']);
                $district_plan->english_pdf = $englishPDFName;
                $district_plan->save();
            }
    
            if ($request->hasFile('marathi_pdf')) {
                if ($return_data['marathi_pdf']) {
                    $delete_file_mar= Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $return_data['marathi_pdf'];
                    if(file_exists_s3($delete_file_mar)){
                        removeImage($delete_file_mar);
                    }
                }
    
                $marathiPDFName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_pdf->extension();
                uploadImage($request, 'marathi_pdf', $path, $marathiPDFName);
                $district_plan = DistrictDisasterManagementPlan::find($return_data['last_insert_id']);
                $district_plan->marathi_pdf = $marathiPDFName;
                $district_plan->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'District Disaster Management Plan Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'District Disaster Management Plan Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
    }
    
    public function deleteById($id){
        try {
            $delete = $this->repo->deleteById($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }
   



}