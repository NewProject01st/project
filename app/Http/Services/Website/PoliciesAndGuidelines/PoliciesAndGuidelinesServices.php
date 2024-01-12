<?php
namespace App\Http\Services\Website\PoliciesAndGuidelines;

use App\Http\Repository\Website\PoliciesAndGuidelines\PoliciesAndGuidelinesRepository;

// use App\Marquee;
use Carbon\Carbon;


class PoliciesAndGuidelinesServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new PoliciesAndGuidelinesRepository();
    }
    public function getAllStateDisasterManagementPlan()
    {
        try {
            return $this->repo->getAllStateDisasterManagementPlan();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function getAllDistrictDisasterManagementPlan()
    {
        try {
            return $this->repo->getAllDistrictDisasterManagementPlan();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllStateDisasterManagementPolicy()
    {
        try {
            return $this->repo->getAllStateDisasterManagementPolicy();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllRelevantLawsRegulation()
    {
        try {
            return $this->repo->getAllRelevantLawsRegulation();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllDisasterManagementAct()
    {
        try {
            return $this->repo->getAllDisasterManagementAct();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllDisasterManagementGuidelines()
    {
        try {
            return $this->repo->getAllDisasterManagementGuidelines();
        } catch (\Exception $e) {
            return $e;
        }
    }   
}