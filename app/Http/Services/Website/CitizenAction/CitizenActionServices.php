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
    
    public function addIncidentModalInfo($request)
    {
        try {
            $add_modal = $this->repo->addIncidentModalInfo($request);
            if ($add_modal) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function addVolunteerModalInfo($request)
    {
        try {
            $add_modal = $this->repo->addVolunteerModalInfo($request);
            if ($add_modal) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
}