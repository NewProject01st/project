<?php

namespace App\Http\Repository\LoginRegister;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\dbmodel\Applicant;
use App\SuperAdmin;


class LoginRepository
{
	function __construct() {
		
    }

    //For Applicant 
    public function checkLogin($request){
        // get school description
        return  User::where('u_email','=',$request['email'])->select('*')->get();
    }

}