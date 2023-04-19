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

    public function budget($request)
    {
        try {
            $add_budget = $this->repo->budget($request);
            if ($add_budget) {
                return ['status' => 'success', 'msg' => 'Budget Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Budget Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateBudget($id, $request)
    {
        return $this->repo->updateBudget($id, $request);
    }

    public function getById($id)
    {
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function delete($id)
    {
        try {
            return $this->repo->delete($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}
