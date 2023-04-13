<?php
namespace App\Http\Services\Login;

use App\Http\Repository\Login\RegisterRepository;
use Illuminate\Database\QueryException;
use Session;
use App\Http\Common\MasterApi;
use App\Http\Controllers\mobilenotification\registernotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

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
    	//dd("inside");
        $this->repo = new RegisterRepository();
        $this->masterApi = new MasterApi();
    }


    public function getClassList()
    {
    	
    	$classFinal = array();
        $academicYearDet = getAcademicyear();
        $academicYear = $academicYearDet[0]->id;
        //dd($academicYear);
    	$classList = $this->repo->getClassList($academicYear);
    	if(sizeof($classList)>0)
    	{
    		foreach ($classList as $key => $value) 
    		{
    			$classListArr = array();
    			array_push($classListArr,array('id'=>$value->id));
    			array_push($classListArr,array('class'=>$value->class));
    			array_push($classListArr,array('displayName'=>$value->displayName));
    			array_push($classListArr,array('code'=>$value->code));

    			$objectAtt = new \stdClass();
    			if(sizeof($classListArr)>0)
		        {
		            	foreach ($classListArr as $key => $value) {
		        			//dd($value);
		            		foreach ($value as $k => $v) {
		            			$objectAtt->{$k} = $v;
		        			}
		        		}	
		    		
				}

    			array_push($classFinal, $objectAtt);
     		}
    	}

    	return $classFinal;
    }

    public function getGenderList()
    {
    	$masterGenderList = $this->masterApi->getGenderList();
    	$genderData = $masterGenderList->data;
    	//dd($genderData);
    	$genderArr = array();
    	

    	foreach ($genderData as $key => $value) 
    	{
    		if($value->active==0)
    		{
    			array_push($genderArr, $value);
    		}
    		
    	}
    	//dd($genderArr);

    	return $genderArr;

    
    }

    public function getGenderName($genderId)
    {
        $masterGenderList = $this->masterApi->getGenderList();
        $genderData = $masterGenderList->data;
        //dd($genderData);
        $genderName = '';
        

        foreach ($genderData as $key => $value) 
        {
            if($value->id==$genderId)
            {
                $genderName = $value->gender;
            }
            
        }
        //dd($genderArr);

        return $genderName;

    
    }

    public function register($req,$user_name,$mob_no,$email_id,$pincode,$sel_gender,$sel_grade,$birth_date,$chk_terms,$ipAddress)
    {
    	//echo "--->".$birth_date;
        //dd($birth_date);
        //$strdate = strtotime($birth_date);
        $genderName = $this->getGenderName($sel_gender);
        //$birth_date = date("Y-m-d",$strdate);
        $birth_date = date("Y-m-d",$birth_date);
        //dd($birth_date);
        $stages_completed = 1;
        
        $academicYear = getAcademicyear();
        //dd("okkk");
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';

        foreach (array_rand($seed, 6) as $k)
            $rand .= $seed[$k];

        $pass = strtoupper($rand);

        $passEncrypt = bcrypt($pass);

       // $academicYear = 1;
        $chk_dup = $this->repo->checkDupCredentials($user_name);
        if(sizeof($chk_dup)>0)
        {
            return ['status'=>'failed','msg'=>'Registration Failed. The name has already been taken.'];
        }
        else
        {

            $user_register_id = $this->repo->register($user_name,$mob_no,$email_id,$pincode,$stages_completed,$sel_gender,$genderName,$sel_grade,$birth_date,$chk_terms,$ipAddress,$passEncrypt,$academicYear);

            $chk_entry = $this->repo->checkCredentials($user_name,$mob_no);

           // dd($chk_entry);
            if(sizeof($chk_entry)>0)
            {
                $registerApp = $this->repo->registerApplicant($user_register_id,$sel_grade,$sel_gender,$genderName,$birth_date,$pincode,$ipAddress,$academicYear);
               // dd("registerApp");
                if($registerApp)
                {
                    ///dd("kkk");
                    //echo "-->".$pass;
                    //dd("yes");
                    $getApplicantDetails = $this->repo->getApplicantDetails($registerApp);
                     $check=$this->SendSms($req,$chk_entry,$getApplicantDetails);
                     //$check = 1;

                     if($check==1){
                   return ['status'=>'success','msg'=>'Registration Successful. Please login to complete admission process with credentials sent to your mobile and/or email.'];
                    }
                }
               
            }
            else
            {
                return "";
            }
        }

    //	dd("ok");
    }

    public function SendSms($request,$userdata,$applicantData){
        $check=0;
        /* generate random 6 letter string */
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';

        foreach (array_rand($seed, 6) as $k)
            $rand .= $seed[$k];

        $pass = strtoupper($rand);
        $passEncrypt = bcrypt($pass);

        $userrfiller =new User();
        
        $userrfiller = User::find($userdata[0]->id);
                 
        $userrfiller->password=$passEncrypt;
          
        $userrfiller->passwordModifiedDate=Carbon::now();
        
        $issave=$userrfiller->save();
        //dd("hello");
        if($issave){
            $check=1;  
            
            $name =$userdata[0]->name;
            $mobileNo = $userdata[0]->mobile;
            $userid = $userdata[0]->id;

            $applicantPincode = $applicantData[0]->currentPincode;
            $gender = $applicantData[0]->gender;
            if($applicantData[0]->dateOfBirth!='')
            {
                $dob = date("d-m-Y",strtotime($applicantData[0]->dateOfBirth));
            }
            else
            {
                 $dob = '';
            }
            
            $grade = $this->getClassName($applicantData[0]->appliedClassId);
            
            $repMob = substr_replace($mobileNo, str_repeat("X", 7), 0, 7);
            $message = 'Your registration User Name is ' . $name . ' and new password is ' . $pass . ' Use this for login and complete application process';
            $registersms = new registernotification();

            $categoryName = 'Registration Template';
            $respMsg=$registersms->sendMessage($message, $userdata[0]->mobile,$name,$userid,$categoryName); 

            if($userrfiller->email!=null)
            {
                $data = [
                    'user_name' => strtoupper($name),
                    'password'  => $pass,
                    'currentYear' => date("Y",time()),
                    'mobileNo' => $repMob,
                    'pincode' => $applicantPincode,
                    'gender' => $gender,
                    'dob' => $dob,
                    'grade' => $grade
                ];
                $sendMail = $this->registerMail(env('MAIL_USERNAME'),$userrfiller->email,$data);
            }

            if($respMsg[0]==false){
                $check=2;
                return $check;
            }
            else{
                return $check; 
            }
        
        }
        return $check;
    }

     public function registerMail($fromEmail,$toEmail,$data)
    {
       //return Mail::to('prachi.kothawade3@gmail.com')->from('prachi.kothawade3@gmail.com','test')->send(new SendMailable($name));


       return Mail::send('applicant.common.login.registerEmail', $data, function($message) use ($toEmail, $fromEmail, $data) {
                  $message->to($toEmail)->subject
                     ('Registration Successful');
                  $message->from($fromEmail,'Intelliadmissions');
               });
       
       //return 'Email was sent';
    }
    
    public function getClassName($id)
    {
        $classDetails = $this->repo->getClassName($id);

        if(sizeof($classDetails)>0)
        {
            $className = $classDetails[0]->class;
        }
        else
        {
            $className = '';
        }

        return $className;
    }



}
