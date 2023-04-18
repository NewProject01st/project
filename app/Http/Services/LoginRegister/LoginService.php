<?php
namespace App\Http\Services\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Repository\LoginRegister\LoginRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginService 
{
	protected $repo;
	public function __construct()
    {        
        $this->repo = new LoginRepository();
    }

    public function checkLogin($request) {
        $response = $this->repo->checkLogin($request);
        if(count($response)>0) {
            // use bcrypt for login
            $password = strtoupper($request->password);
            if (Hash::check($password, $response[0]->password)) {
                $request->session()->put('user_id',$response[0]->id);
                $request->session()->put('u_email',$response[0]->u_email);

                $json = ['status'=>'success','msg'=>$response];
            } else {
                $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
            }
            
        } else {
            $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
        }
        return $json;
    }
}