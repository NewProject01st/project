<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\HomeTenderRepository;

use App\HomeTender;
use Carbon\Carbon;


class HomeTenderServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new HomeTenderRepository();
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
            $add_tender = $this->repo->addAll($request);
            if ($add_tender) {
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
            $update_tender = $this->repo->updateAll($request);
            if ($update_tender) {
                return ['status' => 'success', 'msg' => 'Tender Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Tender Not Updated.'];
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