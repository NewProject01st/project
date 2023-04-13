<?php

namespace App\Http\Repository\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\dbmodel\Applicant;
use App\SuperAdmin;


class LoginRepository
{
	function __construct() {
		
    }
    // school Group admin
    public function checkSchlGrpAdminLogin($request){
        return DB::table("superadmins")
                    ->where([["superadmins.emailid",'=',$request->email],["superadmins.role","=",4]])
                    ->select("superadmins.*")
                    ->get();
    }
    // super admin functions
    public function checkSperAdminLogin($request){
    	return DB::table("superadmins")
                    ->where([["superadmins.emailid",'=',$request->email],["superadmins.role","=",1]])
    				->select("superadmins.*")
    				->get();
    }
    // end of school admin fun
     // school admin login
    public function checkSchoolAdminLogin($request){
        return DB::table("superadmins")
                    ->leftjoin("m_schools","m_schools.id","=","superadmins.schoolid")
                    ->where([["superadmins.emailid",'=',$request->email],["superadmins.role","=",2]])
                    ->select("superadmins.*","m_schools.group_serialId")
                    ->get();
    }
    // end school  admin 
    //For Applicant 
    public function checkLogin(Request $request){
        // get school description
        return  User::where([['name','=',$request->name],['mobile','=',$request->mobile]])->select('*')->get();
    }

    public function updateFormid($newformid){
        return User::where('id','=',session()->get('userId'))->update(['formId'=>$newformid]);
    }

    public function applicantDetails($userId){
        // get school description
        return Applicant::where('userId','=',$userId)->select('id', 'appliedClassId', 'currentPincode')->get();
    }
    
    public function getApplicantMarksheetDetails($applicantId)
    {
        $ad = DB::select(DB::raw("SELECT id from s_marksheet where applicantId = '".$applicantId."' "));

        return $ad;
    }
    // end of Applicant
}