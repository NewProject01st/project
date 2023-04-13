<?php
namespace App\Http\Services\Login;

use Illuminate\Http\Request;
use App\Http\Repository\Login\LoginRepository;
use Hash;
use File;
use App\User;
use Session;

class LoginService 
{
	protected $repo;
	public function __construct()
    {        
        $this->repo = new LoginRepository();
    }
    
    // School Group Admin
    public function checkSchlGrpAdminLogin($request){
        $response = $this->repo->checkSchlGrpAdminLogin($request);
        if(count($response)>0){
            $password = $request->password;
             if ($password==\Crypt::decryptString($response[0]->password))
            {
                $request->session()->put('schlGrpAdminId',$response[0]->id);
                $request->session()->put('GrpSerialId',$response[0]->classGroupId);

                $json = ['status'=>'success','data'=>$response];
            }else{
                $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
            }
        }else{
            $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
        }

        return $json;
    }


    // school admin functions
    public function checkSperAdminLogin($request){
        $response = $this->repo->checkSperAdminLogin($request);
        if(count($response)>0){
            $password = strtoupper($request->password);
             if ($password==\Crypt::decryptString($response[0]->password))
            {
                $request->session()->put('superAdminId',$response[0]->id);

                $json = ['status'=>'success','data'=>$response];
            }else{
                $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
            }
        }else{
            $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
        }

        return $json;
    }

     // end school admin functions
     
     // school admin login fun 
    public function checkSchoolAdminLogin($request){
        $response = $this->repo->checkSchoolAdminLogin($request);
        if(count($response)>0){
            $password = strtoupper($request->password);
             if ($password==\Crypt::decryptString($response[0]->password))
            {
            $request->session()->put('loggedSchoolId',$response[0]->schoolid);
            $request->session()->put('grpSerialId',$response[0]->group_serialId);

                $json = ['status'=>'success','data'=>$response];
            }else{
                $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
            }
        }else{
            $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
        }

        return $json;
    }
    //end school admin

    public function checkLogin($request){
        $response = $this->repo->checkLogin($request);
        if(count($response)>0){
            // use bcrypt for login
            $password = strtoupper($request->password);
            if (Hash::check($password, $response[0]->password))
            {
                $request->session()->put('userId',$response[0]->id);
                $request->session()->put('userName',$response[0]->name);
                $request->session()->put('formId',$response[0]->formId);
                
                $acdmcyr = getAcademicyear();

                $applicantDetails = $this->repo->applicantDetails($response[0]->id);
                
                $request->session()->put('appliedClassId',$applicantDetails[0]->appliedClassId);
                $request->session()->put('applicantId',$applicantDetails[0]->id);
                $request->session()->put('applicantCurrPincode',$applicantDetails[0]->currentPincode);
               

                if($response[0]->formId==NULL){
                   // $yeararray=explode("-",$acdmcyr);
                   // $year = substr($yeararray[0], -2, 2);
                   // $formyear=(string)$year.(string)($year+1);
                    $currTime = get_current_time_stamp();
                    $formyear = date("Y",$currTime);
                    $studendid=str_pad((session()->get('userId')),6,0,STR_PAD_LEFT);
                    $newformid=$formyear.'-'.$studendid;
                    $this->CreateNewDirectory($newformid);
                    $this->repo->updateFormid($newformid);
                    $request->session()->put('formId',$newformid);
                }

                $json = ['status'=>'success','data'=>$response];
            }else{
                $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
            }
            
        }else{
            $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
        }
        return $json;
    }

    public function CreateNewDirectory($newformid) {
         $result = File::makeDirectory(storage_path('formdoc/' . $newformid));
         return;
    }

    public function getApplicantMarksheetDetails($applicantId)
    {
        return $this->repo->getApplicantMarksheetDetails($applicantId);
    }
}