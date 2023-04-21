<?php
namespace App\Http\Services;

use App\Http\Repository\PoliciesActsRepository;

use App\PoliciesActs;
use Carbon\Carbon;


class PoliciesActsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new PoliciesActsRepository();
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
            $add_policiesacts = $this->repo->addAll($request);
            if ($add_policiesacts) {
                return ['status' => 'success', 'msg' => 'Policies Acts Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Policies Acts Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($id, $request)
    {
        try {
            $update_policiesacts = $this->repo->updateAll($request);
            if ($update_policiesacts) {
                return ['status' => 'success', 'msg' => 'Policies Acts Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Policies Acts Not Updated.'];
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
