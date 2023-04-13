<?php
namespace App\Http\Repository\Login;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\User;
use App\dbmodel\Applicant;


class RegisterRepository
{


	public function getClassList($academicYear)
	{
		//$ad= DB::select(DB::raw("SELECT id, class, groupId, displayName, code from m_class where active=0 and streamId = 0 "));
		$currentTime = get_current_time_stamp();
		$curr_date_tm = date("Y-m-d H:i:s",mktime(0,0,0, date("m",$currentTime), date("d",$currentTime),date("Y",$currentTime)));
		$currTime = date("H:i:s", $currentTime);

		/*$ad= DB::select(DB::raw("SELECT c.id, c.class, c.groupId, c.displayName, c.code  from m_class as c, schoolclassmapping as s 
			where c.active=0 and c.streamId = 0 and
			s.academicYear_serialId = ".$academicYear." and s.admissionStartDate<= '".$curr_date_tm."' and s.admissionEndDate >= '".$curr_date_tm."'  and s.id NOT IN (select id from schoolclassmapping where s.admissionEndDate = '".$curr_date_tm."' and s.admissionEndTime < '".$currTime."'  ) and
			c.id = s.classess_serialId GROUP BY s.classess_serialId order by c.level "));*/

		$ad= DB::select(DB::raw("SELECT c.id, c.class, c.groupId, c.displayName, c.code  from m_class as c, schoolclassmapping as s 
			where c.active=0 and s.status = '0' and
			c.id = s.classess_serialId  GROUP BY s.classess_serialId order by c.level "));	
         
        return $ad;
	}
	

	public function register($user_name,$mob_no,$email_id,$pincode,$stages_completed,$sel_gender,$genderName,$sel_grade,$birth_date,$chk_terms,$ipAddress,$passEncrypt,$academicYear)
	{
		$currentTime = get_current_time_stamp();
        $curr_date_tm = date("y-m-d H:i:s",$currentTime);

        $ins_q= DB::insert(DB::raw("INSERT INTO `users` (`agreedToTermsOfUse`, `email`, `name`, `mobile`, `password`, `stagesCompleted`, `created_at`, `ipAddress`) VALUES ('".$chk_terms."', '".$email_id."', '".strtoupper($user_name)."', '".$mob_no."', '".$passEncrypt."', '".$stages_completed."', '".$curr_date_tm."', '".$ipAddress."')"));

        $last_insert_id = DB::getPdo()->lastInsertId();
        
       // dd($last_insert_id);
        return $last_insert_id;
	}

	public function registerApplicant($userId,$sel_grade,$sel_gender,$genderName,$birth_date,$pincode,$ipAddress,$academicYear)
	{

		$currentTime = get_current_time_stamp();
        $curr_date_tm = date("y-m-d H:i:s",$currentTime);

        $ins_qey =  DB::insert(DB::raw("INSERT INTO `s_applicant` (`appliedClassId`, `gender`, `genderId`, `userId`, `dateOfBirth`, `currentPincode`, `academicYear`, `created_at`, `ipAddress`) VALUES ('".$sel_grade."', '".$genderName."', '".$sel_gender."', '".$userId."', '".$birth_date."', '".$pincode."', '".$academicYear."', '".$curr_date_tm."', '".$ipAddress."')"));
        
        $last_insert_id = DB::getPdo()->lastInsertId();
		//dd($last_insert_id);
        return $last_insert_id;
       
       //dd("hi");

	}

	public function checkCredentials($user_name,$mob_no){
   		return User::where([['name','=',$user_name],['mobile','=',$mob_no]])->select('*')->get();
   }
   
   public function getApplicantDetails($id){
   		return Applicant::where([['id','=',$id]])->select('*')->get();
   }

   public function checkDupCredentials($user_name){
   		return User::where([['name','=',$user_name]])->select('id')->get();
   }
   
   public function getClassName($id)
   {
		$ad= DB::select(DB::raw("SELECT id, class from m_class where id='".$id."' "));
         
        return $ad;
   }
   

}


