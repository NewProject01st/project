<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\DisasterManagementWebPortalRepository;

use App\DisasterManagementWebPortal;
use Carbon\Carbon;


class DisasterManagementWebPortalServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DisasterManagementWebPortalRepository();
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
            $add_disaster_web_portal = $this->repo->addAll($request);
            if ($add_disaster_web_portal) {
                return ['status' => 'success', 'msg' => 'Disaster Web Portal Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Web Portal  Not Added.'];
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
            $update_disaster_web_portal = $this->repo->updateAll($request);
            if ($update_disaster_web_portal) {
                return ['status' => 'success', 'msg' => 'Disaster Web Portal  Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Web Portal  Not Updated.'];
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