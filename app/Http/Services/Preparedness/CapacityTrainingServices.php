<?php
namespace App\Http\Services\Preparedness;

use App\Http\Repository\Preparedness\CapacityTrainingRepository;

use App\CapacityTraining;
use Carbon\Carbon;


class CapacityTrainingServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new CapacityTrainingRepository();
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
            $add_capacity_training = $this->repo->addAll($request);
            if ($add_capacity_training) {
                return ['status' => 'success', 'msg' => 'Capacity Building and Training  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Capacity Building and Training Not Added.'];
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

    public function updateAll($request)
    {
        try {
            $update_capacity_training = $this->repo->updateAll($request);
            if ($update_capacity_training) {
                return ['status' => 'success', 'msg' => 'Capacity Building and Training Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Capacity Building and Training Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
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