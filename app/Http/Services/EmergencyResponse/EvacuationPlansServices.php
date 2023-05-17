<?php
namespace App\Http\Services\EmergencyResponse;

use App\Http\Repository\EmergencyResponse\EvacuationPlansRepository;

use App\EvacuationPlans;
use Carbon\Carbon;

class EvacuationPlansServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EvacuationPlansRepository();
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
            $add_evacuationplans = $this->repo->addAll($request);
            if ($add_evacuationplans) {
                return ['status' => 'success', 'msg' => 'Evacuation Plans Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Evacuation Plans get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_evacuationplans = $this->repo->updateAll($request);
            if ($update_evacuationplans) {
                return ['status' => 'success', 'msg' => 'Evacuation Plans Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Evacuation Plans Not Updated.'];
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
