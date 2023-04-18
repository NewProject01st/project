<?php
namespace App\Http\Services\LoginRegister;

use App\Http\Repository\LoginRegister\RegisterRepository;

use App\User;
use Carbon\Carbon;


class RegisterServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new RegisterRepository();
    }


    public function register($request)
    {
       // $academicYear = 1;
        $chk_dup = $this->repo->checkDupCredentials($request);
        if(sizeof($chk_dup)>0)
        {
            return ['status'=>'failed','msg'=>'Registration Failed. The name has already been taken.'];
        }
        else
        {
            $user_register_id = $this->repo->register($request);
            return ['status'=>'success','msg'=>'Registration Successful. Please login to complete admission process with credentials sent to your mobile and/or email.'];
        }
    }



}
