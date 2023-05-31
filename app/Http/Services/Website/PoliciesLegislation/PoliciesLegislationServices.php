<?php
namespace App\Http\Services\Website\PoliciesLegislation;

use App\Http\Repository\Website\PoliciesLegislation\PoliciesLegislationRepository;

// use App\Marquee;
use Carbon\Carbon;


class PoliciesLegislationServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new PoliciesLegislationRepository();
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
}