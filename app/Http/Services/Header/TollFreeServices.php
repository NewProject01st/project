<?php
namespace App\Http\Services\Header;

use App\Http\Repository\Header\TollFreeRepository;

use App\Tollfree;
use Carbon\Carbon;


class TollFreeServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new TollFreeRepository();
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
            $add_tollfree_no = $this->repo->addAll($request);
            if ($add_tollfree_no) {
                return ['status' => 'success', 'msg' => 'Tollfree number  Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Tollfree number Not Added.'];
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
            $update_tollfree_no = $this->repo->updateAll($request);
            if ($update_tollfree_no) {
                return ['status' => 'success', 'msg' => 'Tollfree number Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Tollfree number Not Updated.'];
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