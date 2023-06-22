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
    
    public function delete($request) {
        $delete_user = $this->repo->delete($request);
        return $delete_user;
    }
   
    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getProfile($request) {
        $data_users = $this->repo->getProfile($request);
        // dd($data_users);
        return $data_users;
    }

    public function updateProfile($request) {
        $profile_data = $this->repo->updateProfile($request);
        return $profile_data;
    }

    //  public function verifyOtp($otp){
    //     $user = User::where('otp_number', $otp)->first();
    //     if ($user) {
    //         // Clear OTP after successful verification
    //         $user->otp_number = null;
    //         $user->save();

    //         return true; // Valid OTP
    //     }

    //     return false; // Invalid OTP
    // }

}
