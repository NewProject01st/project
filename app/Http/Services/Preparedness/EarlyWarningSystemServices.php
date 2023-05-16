<?php
namespace App\Http\Services\Preparedness;

use App\Http\Repository\Preparedness\EarlyWarningSystemRepository;

use App\EarlyWarningSystem;
use Carbon\Carbon;


class EarlyWarningSystemServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EarlyWarningSystemRepository();
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
            $add_warning = $this->repo->addAll($request);
            if ($add_warning) {
                return ['status' => 'success', 'msg' => 'Early Warning System Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Early Warning System Not Added.'];
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
            $update_warning = $this->repo->updateAll($request);
            if ($update_warning) {
                return ['status' => 'success', 'msg' => 'Early Warning System Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Early Warning System Not Updated.'];
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