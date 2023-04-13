<?php
namespace App\Http\Repository\Login;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\User;
use App\dbmodel\Applicant;


class RegisterRepository  {

	public function register($request)
	{
        $ipAddress = getIPAddress($request);
		$data = [
			'u_email' => $request->u_email,
			'u_uname' => $request->u_uname,
			'u_password' => $request->u_password,
			'role_id' => $request->role_id,
			'f_name' => $request->f_name,
			'm_name' => $request->m_name,
			'l_name' => $request->l_name,
			'ip_address' => $ipAddress,
		];

        $ins_q= User::insert($data);
        $last_insert_id = DB::getPdo()->lastInsertId();
        return $last_insert_id;
	}


   public function checkDupCredentials($request){
   		return User::where([['u_email','=',$request->u_email]])
   					->orWhere([['u_uname','=',$request->u_uname]])
					->select('id')->get();
   }


}


