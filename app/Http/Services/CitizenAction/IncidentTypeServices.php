<?php
namespace App\Http\Services\CitizenAction;

use App\Http\Repository\CitizenAction\IncidentTypeRepository;

use App\IncidentType;
use Carbon\Carbon;


class IncidentTypeServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new IncidentTypeRepository();
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
            $add_Incidenttype = $this->repo->addAll($request);
            if ($add_Incidenttype) {
                return ['status' => 'success', 'msg' => 'Incident Type Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Incident Type Not Added.'];
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
            $update_Incidenttype = $this->repo->updateAll($request);
            if ($update_Incidenttype) {
                return ['status' => 'success', 'msg' => 'Incident Type Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Incident Type Not Updated.'];
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