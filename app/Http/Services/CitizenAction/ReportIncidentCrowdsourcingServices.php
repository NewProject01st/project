<?php
namespace App\Http\Services\CitizenAction;

use App\Http\Repository\CitizenAction\ReportIncidentCrowdsourcingRepository;

use App\ReportIncidentCrowdsourcing;
use Carbon\Carbon;


class ReportIncidentCrowdsourcingServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ReportIncidentCrowdsourcingRepository();
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
            $add_crowdsourcing = $this->repo->addAll($request);
            if ($add_crowdsourcing) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Added.'];
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

    public function updateAll($request)
    {
        try {
            $update_crowdsourcing = $this->repo->updateAll($request);
            if ($update_crowdsourcing) {
                return ['status' => 'success', 'msg' => 'Report Incident Crowdsourcing Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Report Incident Crowdsourcing Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
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