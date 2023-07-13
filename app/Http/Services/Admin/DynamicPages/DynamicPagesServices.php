<?php
namespace App\Http\Services\Admin\DynamicPages;

use App\Http\Repository\Admin\DynamicPages\DynamicPagesRepository;


class DynamicPagesServices {

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DynamicPagesRepository();
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
            $add_dynamic_page = $this->repo->addAll($request);
            if ($add_dynamic_page) {
                return ['status' => 'success', 'msg' => 'Dynamic Page Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Dynamic Page Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request) {
        try {
            $update_dynamic_page = $this->repo->updateAll($request);
            if ($update_dynamic_page) {
                return ['status' => 'success', 'msg' => 'Dynamic Page Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Dynamic Page Not Updated.'];
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
