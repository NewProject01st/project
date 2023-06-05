<?php

namespace App\Http\Repository\LoginRegister;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ {
    User,
    RolesPermissions
};
use App\dbmodel\Applicant;
use App\SuperAdmin;


class LoginRepository
{
	function __construct() {
		
    }

    //For Applicant 
    public function checkLogin($request) {
        // get school description
        $data = [];
        $data['user_details'] = User::where( [
                                        'u_email' => $request['email'],
                                        'is_active' =>true
                                        ])
                                        ->select('*')
                                        ->first();
        if($data['user_details']) {
            $data['user_permission'] = RolesPermissions::join('permissions', function($join) {
                                            $join->on('roles_permissions.permission_id', '=', 'permissions.id')
                                            ->where('permissions.is_active','=',true);
                                        })
                                        ->where('roles_permissions.is_active','=',true)
                                        ->where('user_id','=',$data['user_details']->id)
                                        ->select(
                                                "roles_permissions.per_add",
                                                "roles_permissions.per_edit",
                                                "roles_permissions.per_update",
                                                "roles_permissions.per_delete",
                                                "permissions.route_name",
                                                "permissions.permission_name",
                                                "permissions.url")
                                        ->get()
                                        ->toArray();
        }
        return $data;
    }
}