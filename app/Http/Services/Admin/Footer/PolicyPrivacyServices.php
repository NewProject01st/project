<?php
namespace App\Http\Services\Admin\Footer;

use App\Http\Repository\Admin\Footer\PolicyPrivacyRepository;

use App\PolicyPrivacy;
use Carbon\Carbon;


class PolicyPrivacyServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new PolicyPrivacyRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function add($request)
    {
        try {
            $add_policy_privacy = $this->repo->add($request);
            if ($add_policy_privacy) {
                return ['status' => 'success', 'msg' => 'Policy Privacy Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Policy Privacy Not Added.'];
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
   
   
    public function update($request)
    {
        $update_policy = $this->repo->update($request);
        if ($update_policy) {
            return ['status' => 'success', 'msg' => 'Policy Privacy Updated Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Policy Privacy Not Updated.'];
        }  
       
    }
    // public function updateOne($id)
    // {
    //     return $this->repo->updateOne($id);
    // }
    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}