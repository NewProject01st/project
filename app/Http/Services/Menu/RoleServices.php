<?php
namespace App\Http\Services\Menu;

use App\Http\Repository\Menu\RoleRepository;

use App\Roles;
use Carbon\Carbon;


class RoleServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new RoleRepository();
    }
    public function getAllRole()
    {
        try {
            return $this->repo->getAllRole();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addRole($request)
    {
        try {
            $add_role = $this->repo->addRole($request);
            if ($add_role) {
                return ['status' => 'success', 'msg' => 'Marquee Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Marquee Not Added.'];
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
   
   
    public function updateRole($request)
    {
        $update_role = $this->repo->updateRole($request);
        if ($update_role) {
            return ['status' => 'success', 'msg' => 'Marquee Added Successfully.'];
        } else {
            return ['status' => 'error', 'msg' => 'Marquee Not Added.'];
        }  
       
    }
    public function updateOneRole($id)
    {
        return $this->repo->updateOneRole($id);
    }
    public function deleteById($id)
    {
        try {
            return $this->repo->deleteById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }

    
    public function listRoleWisePermission($id)
    {
        try {
            return $this->repo->listRoleWisePermission($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   



}