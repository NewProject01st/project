<?php
namespace App\Http\Services\AboutUs;

use App\Http\Repository\AboutUs\BudgetRepository;

use App\Budget;
use Carbon\Carbon;


class BudgetServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new BudgetRepository();
    }
    public function getAllBudgets()
    {
        try {
            return $this->repo->getAllBudgets();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request)
    {
        try {
            $add_budget = $this->repo->addAll($request);
            if ($add_budget) {
                return ['status' => 'success', 'msg' => 'Budget Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Budget Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
   
    public function updateAll($id, $request)
    {
        $update_budget = $this->repo->updateAll($request);
        if ($update_budget) {
            return ['status' => 'success', 'msg' => 'Budget Added Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Budget Not Added.'];
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
