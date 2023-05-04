<?php
namespace App\Http\Services\Menu;

use App\Http\Repository\Menu\SubMenuRepository;


class SubMenuServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new SubMenuRepository();
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
            $add_constitutionhistory = $this->repo->addAll($request);
            if ($add_constitutionhistory) {
                return ['status' => 'success', 'msg' => 'Constitution History Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Constitution History Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request) {
        try {
            $update_constitutionhistory = $this->repo->updateAll($request);
            if ($update_constitutionhistory) {
                return ['status' => 'success', 'msg' => 'Constitution History Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Constitution History Not Updated.'];
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
