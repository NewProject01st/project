<?php
namespace App\Http\Services\EmergencyResponse;

use App\Http\Repository\EmergencyResponse\StateEmergencyOperationsCenterRepository;

use App\StateEmergencyOperationsCenter;
use Carbon\Carbon;


class StateEmergencyOperationsCenterServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new StateEmergencyOperationsCenterRepository();
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
            $add_stateemergencyoperationscenter = $this->repo->addAll($request);
            if ($add_stateemergencyoperationscenter) {
                return ['status' => 'success', 'msg' => 'State Emergency Operations Center Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Emergency Operations Center get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_stateemergencyoperationscenter = $this->repo->updateAll($request);
            if ($update_stateemergencyoperationscenter) {
                return ['status' => 'success', 'msg' => 'State Emergency Operations Center Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Emergency Operations Center Not Updated.'];
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
