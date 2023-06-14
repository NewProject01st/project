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
            $last_id = $this->repo->addIncidentModalInfo($request);
            $path = Config::get('DocumentConstant.REPORT_INCIDENT_CROWDSOURCING_MODAL_ADD');
            $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
            uploadImage($request, 'media_upload', $path, $englishImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing Modal  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Modal Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function addVolunteerModalInfo($request)
    {
        try {
            $last_id = $this->repo->addVolunteerModalInfo($request);
            $path = Config::get('DocumentConstant.VOLUNTEER_CITIZEN_MODAL_ADD');
            $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
            uploadImage($request, 'media_upload', $path, $englishImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function addFeedbackModalInfo($request)
    {
        try {
            $last_id = $this->repo->addFeedbackModalInfo($request);
            $path = Config::get('DocumentConstant.FEEDBACK_CITIZEN_MODAL_ADD');
            $englishImageName = $last_id . '_english.' . $request->media_upload->extension();
            uploadImage($request, 'media_upload', $path, $englishImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
}