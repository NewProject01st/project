<?php
namespace App\Http\Services\Login;

use App\Http\Repository\Login\RegisterRepository;

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


    public function register($req,$user_name,$mob_no,$email_id,$pincode,$sel_gender,$sel_grade,$birth_date,$chk_terms,$ipAddress)
    {
        $passEncrypt = bcrypt($pass);
        $chk_dup = $this->repo->checkDupCredentials($user_name);
        if(sizeof($chk_dup)>0)
        {
            return ['status'=>'failed','msg'=>'Registration Failed. The name has already been taken.'];
        }
        else
        {
            $user_register_id = $this->repo->register($user_name,$mob_no,$email_id,$pincode,$stages_completed,$sel_gender,$genderName,$sel_grade,$birth_date,$chk_terms,$ipAddress,$passEncrypt,$academicYear);
            return ['status'=>'success','msg'=>'Registration Successful. Please login to complete admission process with credentials sent to your mobile and/or email.'];
        }
    }



}
