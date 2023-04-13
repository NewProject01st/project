<?php

namespace App\Http\Repository\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class ForgotPasswordRepository
{
    function __construct() {
        
    }

   public function checkCredentials($request){
        return User::where([['name','=',$request->userid],['mobile','=',$request->mobile]])->select('*')->get();
   }
}