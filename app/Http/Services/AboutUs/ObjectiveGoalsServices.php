<?php
namespace App\Http\Services\AboutUs;

use App\Http\Repository\AboutUs\ObjectiveGoalsRepository;

use App\ObjectiveGoals;
use Carbon\Carbon;


class ObjectiveGoalsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ObjectiveGoalsRepository();
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
            $add_budget = $this->repo->addAll($request);
            if ($add_budget) {
                return ['status' => 'success', 'msg' => 'Objective Goals Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'BudgObjective Goalset Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
   
    public function updateAll($request)
    {
        $update_budget = $this->repo->updateAll($request);
        if ($update_budget) {
            return ['status' => 'success', 'msg' => 'Objective Goals Added Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Objective Goals Not Added.'];
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
