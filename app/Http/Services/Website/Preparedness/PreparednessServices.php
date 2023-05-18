<?php
namespace App\Http\Services\Website\Preparedness;

use App\Http\Repository\Website\Preparedness\PreparednessRepository;

// use App\Marquee;
use Carbon\Carbon;


class PreparednessServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new PreparednessRepository();
    }
    public function getAllHazardVulnerability()
    {
        try {
            return $this->repo->getAllHazardVulnerability();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function getAllEarlyWarningSystem()
    {
        try {
            return $this->repo->getAllEarlyWarningSystem();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllCapacityTraining()
    {
        try {
            return $this->repo->getAllCapacityTraining();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllPublicAwarenessEducation()
    {
        try {
            return $this->repo->getAllPublicAwarenessEducation();
        } catch (\Exception $e) {
            return $e;
        }
    }   
     
}