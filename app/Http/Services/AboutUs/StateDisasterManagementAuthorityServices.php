<?php
namespace App\Http\Services\AboutUs;

use App\Http\Repository\AboutUs\StateDisasterManagementAuthorityRepository;

use App\StateDisasterManagementAuthority;
use Carbon\Carbon;


class StateDisasterManagementAuthorityServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new StateDisasterManagementAuthorityRepository();
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
            $add_StateDisasterManagementAuthority = $this->repo->addAll($request);
            if ($add_StateDisasterManagementAuthority) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Authority Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Authority get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_StateDisasterManagementAuthority = $this->repo->updateAll($request);
            if ($update_StateDisasterManagementAuthority) {
                return ['status' => 'success', 'msg' => 'State Disaster Management Authority Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'State Disaster Management Authority Not Updated.'];
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
