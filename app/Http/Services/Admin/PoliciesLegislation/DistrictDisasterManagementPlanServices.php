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
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);

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
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    unlink(storage_path(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $return_data['english_image']));
                }
    
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $district_plan = DistrictDisasterManagementPlan::find($return_data['last_insert_id']);
                $district_plan->english_image = $englishImageName;
                $district_plan->save();
    
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    unlink(storage_path(Config::get('DocumentConstant.DISTRICT_DISATSER_PLAN_DELETE') . $return_data['marathi_image']));
                }
    
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $district_plan = DistrictDisasterManagementPlan::find($return_data['last_insert_id']);
                $district_plan->marathi_image = $marathiImageName;
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
   
    public function deleteById($id){
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}