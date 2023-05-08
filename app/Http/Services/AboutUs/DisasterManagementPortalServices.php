<?php
namespace App\Http\Services\AboutUs;

use App\Http\Repository\AboutUs\DisasterManagementPortalRepository;

use App\DisasterManagementPortal;
use Carbon\Carbon;


class DisasterManagementPortalServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DisasterManagementPortalRepository();
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
            $add_disastermanagementportal = $this->repo->addAll($request);
            if ($add_disastermanagementportal) {
                return ['status' => 'success', 'msg' => 'Disaster Management Portal Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Management Portal Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_disastermanagementportal = $this->repo->updateAll($request);
            if ($update_disastermanagementportal) {
                return ['status' => 'success', 'msg' => 'Disaster Management Portal Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Management Portal Not Updated.'];
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
