<?php
namespace App\Http\Services\ContactUs;

use App\Http\Repository\ContactUs\ContactUsRepository;

use App\Contact;
use Carbon\Carbon;


class ContactUsServives
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ContactUsRepository();
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
            $update_contact = $this->repo->updateAll($request);
            if ($update_contact) {
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