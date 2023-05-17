<?php
namespace App\Http\Services\EmergencyResponse;

use App\Http\Repository\EmergencyResponse\ReliefMeasuresResourcesRepository;

use App\ReliefMeasuresResources;
use Carbon\Carbon;


class ReliefMeasuresResourcesServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ReliefMeasuresResourcesRepository();
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
            $add_reliefmeasuresresources = $this->repo->addAll($request);
            if ($add_reliefmeasuresresources) {
                return ['status' => 'success', 'msg' => 'Relief Measures Resources Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Relief Measures Resources get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_reliefmeasuresresources = $this->repo->updateAll($request);
            if ($update_reliefmeasuresresources) {
                return ['status' => 'success', 'msg' => 'Relief Measures Resources Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Relief Measures Resources Not Updated.'];
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
   
    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}
