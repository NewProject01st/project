<?php
namespace App\Http\Services\Admin\PoliciesAndGuidelines;

use App\Http\Repository\Admin\PoliciesAndGuidelines\StateDisasterManagementPolicyRepository;

use App\Models\
{ StateDisasterManagementPolicy };
use Carbon\Carbon;
use Config;
use Storage;


class StateDisasterManagementPolicyServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct(){
        $this->repo = new StateDisasterManagementPolicyRepository();
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
            $path = Config::get('DocumentConstant.STATE_DISASTER_POLICY_ADD');
            $englishPdfName = $last_id['englishPdfName'];
            $marathiPdfName = $last_id['marathiPdfName'];
            uploadImage($request, 'english_pdf', $path, $englishPdfName);
            uploadImage($request, 'marathi_pdf', $path, $marathiPdfName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Policy Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Policy Not Added.'];
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
            
            $path = Config::get('DocumentConstant.STATE_DISASTER_POLICY_ADD');
            if ($request->hasFile('english_pdf')) {
                if ($return_data['english_pdf']) {
                    if (file_exists_s3(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $return_data['english_pdf'])) {
                        removeImage(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $return_data['english_pdf']);
                    }

                }
                $englishPDFName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_english.' . $request->english_pdf->extension();
                uploadImage($request, 'english_pdf', $path, $englishPDFName);
                $district_plan = StateDisasterManagementPolicy::find($return_data['last_insert_id']);
                $district_plan->english_pdf = $englishPDFName;
                $district_plan->save();
            }
    
            if ($request->hasFile('marathi_pdf')) {
                if ($return_data['marathi_pdf']) {
                    if (file_exists_s3(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $return_data['marathi_pdf'])) {
                        removeImage(Config::get('DocumentConstant.STATE_DISASTER_POLICY_DELETE') . $return_data['marathi_pdf']);
                    }

                }
                $marathiPDFName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_marathi.' . $request->marathi_pdf->extension();
                uploadImage($request, 'marathi_pdf', $path, $marathiPDFName);
                $district_plan = StateDisasterManagementPolicy::find($return_data['last_insert_id']);
                $district_plan->marathi_pdf = $marathiPDFName;
                $district_plan->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Policy Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Policy Not Updated.'];
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