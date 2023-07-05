<?php
namespace App\Http\Services\Footer;

use App\Http\Repository\Footer\TermsConditionRepository;

use App\TermsCondition;
use Carbon\Carbon;


class TermsConditionServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new TermsConditionRepository();
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
            $add_terms_condition = $this->repo->add($request);
            if ($add_terms_condition) {
                return ['status' => 'success', 'msg' => 'Terms Condition Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Terms Condition Not Added.'];
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
        $update_terms = $this->repo->update($request);
        if ($update_terms) {
            return ['status' => 'success', 'msg' => 'Terms Condition Updated Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Terms Condition Not Updated.'];
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