<?php
namespace App\Http\Repository\LoginRegister;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	User,
	Permissions,
	RolesPermissions
};

class RegisterRepository  {

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


	private function insertRolesPermissions($request, $last_insert_id) {

		$permissions_data_from_table  = $this->permissionsData();
		foreach ($permissions_data_from_table as $key => $data) {
			$permission_id  = 'permission_id_'.$data['id'];
			if($request->has($permission_id)) {
				// dd("I am here for permission");
				$permissions_data = new RolesPermissions();
				$permissions_data->permission_id = $data['id'];
				$permissions_data->role_id = $request->role_id;
				$permissions_data->user_id = $last_insert_id;

				$per_add  = 'per_add_'.$data['id'];
				if($request->has($per_add)) {
					$permissions_data->per_add  = true;
				}
				// $per_delete  = 'per_delete_'.$data['id'];
				// if($request->has($per_delete)) {
				// 	$permissions_data->per_edit  = $request->;
				// }
				$per_update  = 'per_update_'.$data['id'];
				if($request->has($per_update)) {
					$permissions_data->per_update  = true;
				}
				$per_delete  = 'per_delete_'.$data['id'];
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


}


