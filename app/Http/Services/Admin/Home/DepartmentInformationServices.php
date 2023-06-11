<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\DepartmentInformationRepository;

use App\DepartmentInformation;
use Carbon\Carbon;


class DepartmentInformationServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DepartmentInformationRepository();
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
            $add_department = $this->repo->addAll($request);
            if ($add_department) {
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
            $update_department = $this->repo->updateAll($request);
            if ($update_department) {
                return ['status' => 'success', 'msg' => 'Disaster Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    
    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
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