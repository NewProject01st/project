<?php
namespace App\Http\Repository\Menu;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Roles,
    Permissions,
    RolesPermissions

};

class RoleRepository  {
	public function getAllRole()
    {
        try {
            return Roles::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addRole($request) {
        try {
            $role_data = new Roles();
            $role_data->role_name = $request['role_name'];
            $role_data->save();  
            $last_insert_id = $role_data->id;    
           
            $this->insertRolesPermissions($request, $last_insert_id); 
        
            return $role_data;
        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }

    private function insertRolesPermissions($request, $last_insert_id) {
        $permissions_data_from_table  = $this->permissionsData();
        

        foreach ($permissions_data_from_table as $key => $data) {
            $permission_id  = 'permission_id_'.$data['id'];
            $per_add  = 'per_add_'.$data['id'];
            $per_update  = 'per_update_'.$data['id'];
            $per_delete  = 'per_delete_'.$data['id'];
            
            if($request->has($permission_id) && ($request->has($per_add) || $request->has($per_update) || $request->has($per_delete))) {
                $permissions_data = new RolesPermissions();
                $permissions_data->permission_id = $data['id'];
                $permissions_data->role_id = $last_insert_id;
                
                if($request->has($per_add)) {
                    $permissions_data->per_add  = true;
                }
                
                if($request->has($per_update)) {
                    $permissions_data->per_update  = true;
                }
                
                if($request->has($per_delete)) {
                    $permissions_data->per_delete  = true;
                }
                $permissions_data->save();
            }
        }
        return "ok";
    }

    public function permissionsData() {
		$permissions = Permissions::where('is_active', true)
						->select('id','route_name','permission_name','url')
						->get()
						->toArray();

		return $permissions;
	}

    public function getById($id) {
        try {
            $role = Roles::find($id);
            if ($role) {
                return $role;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id budget.',
                'status' => 'error'
            ];
        }
    }
    public function updateRole($request) {
        try {
            $role_data = Roles::find($request->id);
            $role_data->role_name = $request['role_name'];       
            $role_data->update();  
            
        //    dd($budget_data);
            // print_r($budget_data);
            // die();
        
            return [
                'msg' => 'Marquee updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update marquee.',
                'status' => 'error'
            ];
        }
    }
    public function updateOneRole($request) {
        try {
            $role = Roles::find($request); // Assuming $request directly contains the ID        
            if ($role) {
                $is_active = $role->is_active === 1 ? 0 : 1;
                $role->is_active = $is_active;
                // dd($marquee);
                $role->save();

                return [
                    'msg' => 'Marquee updated successfully.',
                    'status' => 'success'
                ];
            }

            return [
                'msg' => 'Marquee not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update slide.',
                'status' => 'error'
            ];
        }
    }


    public function deleteById($id) {
        try {
            $role = Roles::destroy($id);
            if ($role) {
                return $role;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to delete marquee.',
                'status' => 'error'
            ];
        }
    }

    public function listRoleWisePermission($id)
    {
        try {
            return RolesPermissions::leftjoin('permissions', function($join) {
                $join->on('roles_permissions.permission_id', '=', 'permissions.id');
                })->where('role_id',$id)->get()->toArray();
        } catch (\Exception $e) {
            return $e;
        }
    }

}