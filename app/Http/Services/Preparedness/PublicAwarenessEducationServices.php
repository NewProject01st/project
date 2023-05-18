<?php
namespace App\Http\Services\Preparedness;

use App\Http\Repository\Preparedness\PublicAwarenessEducationRepository;

use App\PublicAwarenessEducation;
use Carbon\Carbon;


class PublicAwarenessEducationServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new PublicAwarenessEducationRepository();
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
            $add_awareness = $this->repo->addAll($request);
            if ($add_awareness) {
                return ['status' => 'success', 'msg' => 'Public Awareness Education  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Public Awareness Education Not Added.'];
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
            $update_awareness = $this->repo->updateAll($request);
            if ($update_awareness) {
                return ['status' => 'success', 'msg' => 'Public Awareness Education Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Public Awareness Education Not Updated.'];
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