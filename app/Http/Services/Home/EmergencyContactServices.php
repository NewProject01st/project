<?php
namespace App\Http\Services\Home;

use App\Http\Repository\Home\EmergencyContactRepository;

use App\EmergencyContact;
use Carbon\Carbon;


class EmergencyContactServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new EmergencyContactRepository();
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
            $add_contact = $this->repo->addAll($request);
            if ($add_contact) {
                return ['status' => 'success', 'msg' => 'Contact Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Contact Not Added.'];
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
            $update_contact = $this->repo->updateAll($request);
            if ($update_contact) {
                return ['status' => 'success', 'msg' => 'Contact Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Contact Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
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