<?php
namespace App\Http\Services;

use App\Http\Repository\MetadataRepository;

use App\Metadata;
use Carbon\Carbon;


class MetadataServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new MetadataRepository();
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
            $add_metadata = $this->repo->addAll($request);
            if ($add_metadata) {
                return ['status' => 'success', 'msg' => 'Metadata Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Metadata Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_metadata = $this->repo->updateAll($request);
            if ($update_metadata) {
                return ['status' => 'success', 'msg' => 'Metadata Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Metadata Not Updated.'];
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
   
    public function deleteById($id){
        try {
            $delete = $this->repo->deleteById($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }




}