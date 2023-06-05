<?php
namespace App\Http\Services\EmergencyResponse;

use App\Http\Repository\EmergencyResponse\EmergencyContactNumbersRepository;

use App\EmergencyContactNumbers;
use Carbon\Carbon;


class EmergencyContactNumbersServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EmergencyContactNumbersRepository();
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
            $add_emergencycontactnumbers = $this->repo->addAll($request);
            if ($add_emergencycontactnumbers) {
                return ['status' => 'success', 'msg' => 'Emergency Contact Numbers Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Emergency Contact Numbers get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_emergencycontactnumbers = $this->repo->updateAll($request);
            if ($update_emergencycontactnumbers) {
                return ['status' => 'success', 'msg' => 'Emergency Contact Numbers Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Emergency Contact Numbers Not Updated.'];
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