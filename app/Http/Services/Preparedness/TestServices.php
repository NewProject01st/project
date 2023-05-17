<?php
namespace App\Http\Services\Preparedness;

use App\Http\Repository\Preparedness\TestRepository;

use App\Test;
use Carbon\Carbon;


class TestServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new TestRepository();
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
            $add_hazard = $this->repo->addAll($request);
            if ($add_hazard) {
                return ['status' => 'success', 'msg' => 'Test Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Test Not Added.'];
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
            $update_hazard = $this->repo->updateAll($request);
            if ($update_hazard) {
                return ['status' => 'success', 'msg' => 'Test Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Test Not Updated.'];
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