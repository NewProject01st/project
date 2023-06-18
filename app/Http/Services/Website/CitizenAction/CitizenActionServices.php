<?php
namespace App\Http\Services\Website\CitizenAction;

use App\Http\Repository\Website\CitizenAction\CitizenActionRepository;

use Carbon\Carbon;
use Config;
use Storage;


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
    public function getAllIncidentType()
    {
        try {
            return $this->repo->getAllIncidentType();
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
                return ['status' => 'success', 'msg' => 'Volunteer Citizen Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Volunteer Citizen  Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }


}