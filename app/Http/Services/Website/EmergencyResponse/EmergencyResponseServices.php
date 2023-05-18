<?php
namespace App\Http\Services\Website\EmergencyResponse;

use App\Http\Repository\Website\EmergencyResponse\EmergencyResponseRepository;

// use App\Marquee;
use Carbon\Carbon;


class EmergencyResponseServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EmergencyResponseRepository();
    }
    public function getAllStateEmergencyOperationsCenter()
    {
        try {
            return $this->repo->getAllStateEmergencyOperationsCenter();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function getAllDistrictEmergencyOperationsCenter()
    {
        try {
            return $this->repo->getAllDistrictEmergencyOperationsCenter();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllEmergencyContactNumbers()
    {
        try {
            return $this->repo->getAllEmergencyContactNumbers();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllSearchRescueTeams()
    {
        try {
            return $this->repo->getAllSearchRescueTeams();
        } catch (\Exception $e) {
            return $e;
        }
    }   
    public function getAllReliefMeasuresResources()
    {
        try {
            return $this->repo->getAllReliefMeasuresResources();
        } catch (\Exception $e) {
            return $e;
        }
    }  
    public function getAllEvacuationPlans()
    {
        try {
            return $this->repo->getAllEvacuationPlans();
        } catch (\Exception $e) {
            return $e;
        }
    }    
}