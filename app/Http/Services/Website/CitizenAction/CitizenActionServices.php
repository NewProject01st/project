<?php
namespace App\Http\Services\Website\CitizenAction;

use App\Http\Repository\Website\CitizenAction\CitizenActionRepository;

// use App\Marquee;
use Carbon\Carbon;


class CitizenActionServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new CitizenActionRepository();
    }
    public function getAllReportIncidentCrowdsourcing()
    {
        try {
            return $this->repo->getAllReportIncidentCrowdsourcing();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function getAllVolunteerCitizenSupport()
    {
        try {
            return $this->repo->getAllVolunteerCitizenSupport();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllCitizenFeedbackSuggestions()
    {
        try {
            return $this->repo->getAllCitizenFeedbackSuggestions();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
}