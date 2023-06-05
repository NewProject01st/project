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
    public function __construct() {
        $this->repo = new RegisterRepository();
    }


    public function index() {
        $data_users = $this->repo->getUsersList();
        return $data_users;
    }


    public function register($request) {
       // $academicYear = 1;
        $chk_dup = $this->repo->checkDupCredentials($request);
        if(sizeof($chk_dup)>0)
        {
            return ['status'=>'failed','msg'=>'Registration Failed. The name has already been taken.'];
        }
        else
        {
            $user_register_id = $this->repo->register($request);
            return ['status'=>'success','msg'=>'User Data Added Successful.'];
        }
    }

    public function update($request) {
            $user_register_id = $this->repo->update($request);
            return ['status'=>'success','msg'=>'Data Updated Successful.'];
    }

    

    public function editUsers($request) {
        $data_users = $this->repo->editUsers($request);
        return $data_users;
    }



}
