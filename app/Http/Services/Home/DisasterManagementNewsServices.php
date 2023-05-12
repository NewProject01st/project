<?php
namespace App\Http\Services\Home;

use App\Http\Repository\Home\DisasterManagementNewsRepository;

use App\DisasterManagementNews;
use Carbon\Carbon;


class DisasterManagementNewsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DisasterManagementNewsRepository();
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
            $add_disaster = $this->repo->addAll($request);
            if ($add_disaster) {
                return ['status' => 'success', 'msg' => 'Disaster Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Not Added.'];
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
            $update_disaster = $this->repo->updateAll($request);
            if ($update_disaster) {
                return ['status' => 'success', 'msg' => 'Disaster Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Not Updated.'];
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