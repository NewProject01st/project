<?php
namespace App\Http\Services\Header;

use App\Http\Repository\Header\RTIRepository;

use App\RTI;
use Carbon\Carbon;


class RTIServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new RTIRepository();
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
            $add_rti = $this->repo->addAll($request);
            if ($add_rti) {
                return ['status' => 'success', 'msg' => 'Tender Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Tender Not Added.'];
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
            $update_rti = $this->repo->updateAll($request);
            if ($update_rti) {
                return ['status' => 'success', 'msg' => 'Tender Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Tender Not Updated.'];
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