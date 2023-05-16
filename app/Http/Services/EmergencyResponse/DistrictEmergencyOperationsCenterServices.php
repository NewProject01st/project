<?php
namespace App\Http\Services\EmergencyResponse;

use App\Http\Repository\EmergencyResponse\DistrictEmergencyOperationsCenterRepository;

use App\DistrictEmergencyOperationsCenter;
use Carbon\Carbon;


class DistrictEmergencyOperationsCenterServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DistrictEmergencyOperationsCenterRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request)
    {
        try {
            $add_districtemergencyoperationscenter = $this->repo->addAll($request);
            if ($add_districtemergencyoperationscenter) {
                return ['status' => 'success', 'msg' => 'District Emergency Operations Center Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'District Emergency Operations Center get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_districtemergencyoperationscenter = $this->repo->updateAll($request);
            if ($update_districtemergencyoperationscenter) {
                return ['status' => 'success', 'msg' => 'District Emergency Operations Center Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'District Emergency Operations Center Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function getById($id)
    {
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}
