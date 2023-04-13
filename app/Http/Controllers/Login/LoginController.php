<?php

namespace App\Http\Controllers\Applicant\Common\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Common\GeneralQueries;
use App\Http\Services\Login\LoginService;
use App\Http\Controllers\MaterApiController;
use Session;

class LoginController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        self::$loginServe = new LoginService();
        self::$masterApi  = new MaterApiController();
    }

    public function index(){
        
        return view('applicant.common.login.login');
    }

    public function submitLogin(Request $request){
        $this->validateLogin($request);
        $resp  = self::$loginServe->checkLogin($request);
        
        if($resp['status']=='success'){
            //dd($resp['data'][0]->stagesCompleted);
            $applicantCurrPincode = Session::get('applicantCurrPincode');
            $cityFromPincode = self::$masterApi->getCityFromPincode($applicantCurrPincode);
            $request->session()->put('applicantCurrCity',$cityFromPincode);
            $applicantId = Session::get('applicantId');

            $classMarksApplicable = getClassSettingMapping();

            $userConfirmStatus = getUserConfirmStatus();

            $marksheetEntered = self::$loginServe->getApplicantMarksheetDetails($applicantId);

            if($resp['data'][0]->stagesCompleted==0){
              
                    return Redirect(route('register'));
                
            }
            else if($resp['data'][0]->stagesCompleted==1)
            {
                  return Redirect(route('eligibleSchoolList'));         
            }
            else if($resp['data'][0]->stagesCompleted==2)
            {
                  return Redirect(route('applicant'));         
            }
            else if($resp['data'][0]->stagesCompleted==3)
            {
                  return Redirect(route('father'));         
            }
            else if($resp['data'][0]->stagesCompleted==4)
            {
                  return Redirect(route('mother'));         
            }
            else if($resp['data'][0]->stagesCompleted==5)
            {
                  return Redirect(route('sibling'));         
            }
            else if($resp['data'][0]->stagesCompleted==6)
            {
                 // return Redirect(route('finalEligibleSchoolList'));   
                // Added from here
                if($userConfirmStatus==0)
                {
                    if($classMarksApplicable==1)
                    {
                        if(sizeof($marksheetEntered)>0)
                        {
                            return Redirect(route('profile')); 
                        }
                        else
                        {
                            return Redirect(route('studentMarksheet')); 
                        }
                        
                    }
                    else
                    {
                        return Redirect(route('profile'));  
                    }
                         
                }
                else
                {
                    return Redirect(route('finalEligibleSchoolList'));   
                }      
                // till here
            }
            else
            {
                return Redirect(route('eligibleSchoolList')); 
            }
           
        }else{
            return view('applicant.common.login.login')->withErrors([
                    'name' => $resp['msg'],
                ]);
        }
    }

    protected function validateLogin(Request $request)
    {   
        $this->validate($request, [
            $this->username() => 'required', 
            'password' => 'required',
            'mobile'=>'required|digits:10'
        ]);
    }

    public function username()
    {
         return 'name';
    }

    public function logout(Request $request)
    {
 
        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('login');
    }
}
