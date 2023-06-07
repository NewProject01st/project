<?php
namespace App\Http\Repository\Menu;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Roles
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

	public function addRole($request)
{
    try {
        $role_data = new Roles();
        $role_data->role_name = $request['role_name'];
        $role_data->save();       
     
		return $role_data;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
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
public function updateRole($request)
{
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
public function updateOneRole($request)
{
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


public function deleteById($id)
{
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

}