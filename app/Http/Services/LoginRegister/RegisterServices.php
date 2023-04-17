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
     
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'); 
        shuffle($seed);
        $rand = '';

        foreach (array_rand($seed, 6) as $k)
            $rand .= $seed[$k];

        $pass = strtoupper($rand);

        $u_password = bcrypt($pass);

       // $academicYear = 1;
        $chk_dup = $this->repo->checkDupCredentials($request);
        if(sizeof($chk_dup)>0)
        {
            return ['status'=>'failed','msg'=>'Registration Failed. The name has already been taken.'];
        }
        else
        {
            $user_register_id = $this->repo->register($request,$u_password);
            return ['status'=>'success','msg'=>'Registration Successful. Please login to complete admission process with credentials sent to your mobile and/or email.'];
        }
    }



}
