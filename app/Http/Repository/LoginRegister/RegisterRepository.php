<?php
namespace App\Http\Repository\LoginRegister;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	User,
	Permissions,
	RolesPermissions,
	Roles
};

class RegisterRepository  {

	public function getUsersList() {
        $data_users = User::join('roles', function($join) {
							$join->on('users.role_id', '=', 'roles.id');
						})
						// ->where('users.is_active','=',true)
						->select('roles.role_name',
								'users.u_email',
								'users.f_name',
								'users.m_name',
								'users.l_name',
								'users.id',
							)->get();
							// ->toArray();

		return $data_users;
    }


	public function permissionsData() {
		$permissions = Permissions::where('is_active', true)
						->select('id','route_name','permission_name','url')
						->get()
						->toArray();

		return $permissions;
	}
	public function register($request)
	{
        $ipAddress = getIPAddress($request);
		$user_data = new User();
		$user_data->u_email = $request['u_email'];
		$user_data->u_uname = $request['u_uname'];
		$user_data->u_password = bcrypt($request['u_password']);
		$user_data->role_id = $request['role_id'];
		$user_data->f_name = $request['f_name'];
		$user_data->m_name = $request['m_name'];
		$user_data->l_name = $request['l_name'];
		$user_data->ip_address = $ipAddress;
		$user_data->save();

		$last_insert_id = $user_data->id;
		// dd($last_insert_id);
		$this->insertRolesPermissions($request, $last_insert_id);
        return $last_insert_id;
	}

	public function update($request)
	{
        $ipAddress = getIPAddress($request);
		$user_data = User::where('id',$request['edit_id']) 
						->update([
							'u_uname' => $request['u_uname'],
							'role_id' => $request['role_id'],
							'f_name' => $request['f_name'],
							'm_name' => $request['m_name'],
							'l_name' => $request['l_name'],
							'is_active' => isset($request['is_active']) ? true :false,
						]);
		
		$this->updateRolesPermissions($request, $request->edit_id);
        return $request->edit_id;
	}


	private function updateRolesPermissions($request, $last_insert_id) {

		$permissions_data_from_table  = $this->permissionsData();
		$update_data = array();
		foreach ($permissions_data_from_table as $key => $data) {
			$permission_id  = 'permission_id_'.$data['id'];
			$per_add  = 'per_add_'.$data['id'];
			$per_update  = 'per_update_'.$data['id'];
			$per_delete  = 'per_delete_'.$data['id'];

			$update_data['role_id'] = $request->role_id;
			if($request->has($per_add)) {
				$update_data['per_add']  = true;
			} else {
				$update_data['per_add']  = false;
			}
			
			if($request->has($per_update)) {
				$update_data['per_update']  = true;
			} else {
				$update_data['per_update']  = false;
			}
			
			if($request->has($per_delete)) {
				$update_data['per_delete']  = true;
			} else {
				$update_data['per_delete']  = false;
			}
			info('$update_data');
			info($update_data);
			// if($request->has($permission_id) && ($request->has($per_add) || $request->has($per_update) || $request->has($per_delete))) {
				// dd("I am here for permission");
				\DB::enableQueryLog(); // Enable query log

				$permissions_data_all = RolesPermissions::where([
					'user_id' =>$request['edit_id'],
					'permission_id' =>$data['id']
				])->get()->toArray();
				if(count($permissions_data_all)>0) {

					$permissions_data = RolesPermissions::where([
						'user_id' =>$request['edit_id'],
						'permission_id' =>$data['id']
					])->update($update_data);
				} else {
					$update_data['user_id']  = $request['edit_id'];
					$update_data['permission_id']  = $data['id'];
					$permissions_data = RolesPermissions::insert($update_data);
				}
				
				info(\DB::getQueryLog()); // Show results of log

			// }
			
		}
		return "ok";
	}


	private function insertRolesPermissions($request, $last_insert_id) {

		$permissions_data_from_table  = $this->permissionsData();
		foreach ($permissions_data_from_table as $key => $data) {
			$permission_id  = 'permission_id_'.$data['id'];
			$per_add  = 'per_add_'.$data['id'];
			$per_update  = 'per_update_'.$data['id'];
			$per_delete  = 'per_delete_'.$data['id'];
			if($request->has($permission_id) && ($request->has($per_add) || $request->has($per_update) || $request->has($per_delete))) {
				// dd("I am here for permission");
				$permissions_data = new RolesPermissions();
				$permissions_data->permission_id = $data['id'];
				$permissions_data->role_id = $request->role_id;
				$permissions_data->user_id = $last_insert_id;
				
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

   public function checkDupCredentials($request) {
   		return User::where('u_email','=',$request['u_email'])
   					->orWhere('u_uname','=',$request['u_uname'])
					->select('id')->get();
   }

   public function editUsers($reuest) {

	$data_users = [];

	$data_users['roles'] = Roles::where('is_active', true)
							->select('id','role_name')
							->get()
							->toArray();
	$data_users['permissions'] = Permissions::where('is_active', true)
						->select('id','route_name','permission_name','url')
						->get()
						->toArray();

	$data_users_data = User::join('roles', function($join) {
						$join->on('users.role_id', '=', 'roles.id');
					})
					// ->join('roles_permissions', function($join) {
					// 	$join->on('users.id', '=', 'roles_permissions.user_id');
					// })
					->where('users.id','=',$reuest->edit_id)
					// ->where('roles_permissions.is_active','=',true)
					// ->where('users.is_active','=',true)
					->select('roles.id as role_id',
							'users.u_uname',
							'users.u_password',
							'users.u_email',
							'users.f_name',
							'users.m_name',
							'users.l_name',
							'users.id',
							'users.is_active',
						)->get()
						->toArray();
	$data_users['data_users'] = $data_users_data[0];
	$data_users['permissions_user'] = User::join('roles_permissions', function($join) {
							$join->on('users.id', '=', 'roles_permissions.user_id');
						})
						->join('permissions', function($join) {
							$join->on('roles_permissions.permission_id', '=', 'permissions.id');
						})
						->where('roles_permissions.user_id','=',$reuest->edit_id)
						->where('roles_permissions.is_active','=',true)
						// ->where('users.is_active','=',true)
						->select(
							'roles_permissions.per_add',
							'roles_permissions.per_update',
							'roles_permissions.per_delete',
							'permissions.id as permissions_id'
							)->get()
							->toArray();

	return $data_users;
}



}


