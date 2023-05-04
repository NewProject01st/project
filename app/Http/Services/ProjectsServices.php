<?php
namespace App\Http\Services;

use App\Http\Repository\ProjectsRepository;

use App\Projects;
use Carbon\Carbon;


class ProjectsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ProjectsRepository();
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
            $add_projects = $this->repo->addAll($request);
            if ($add_projects) {
                return ['status' => 'success', 'msg' => 'Projects Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Projects Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($id, $request)
    {
        try {
            $update_projects = $this->repo->updateAll($request);
            if ($update_projects) {
                return ['status' => 'success', 'msg' => 'Projects Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Projects Not Updated.'];
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
