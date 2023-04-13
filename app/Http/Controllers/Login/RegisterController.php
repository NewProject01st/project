<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Login\RegisterServices;
use App\Models\Roles;
use Validator;

class RegisterController extends Controller
{
    /**
     * Topic constructor.
     */
    public function __construct()
    {
        $this->service = new RegisterServices();
    }

    public function index()
    {
        $roles = Roles::where('is_active', true)->get();
    	return view($this->viewPath.'.register',compact('roles'));
    }


    public function register(Request $req)
    {

        $user_name = $req->user_name;
        $mob_no = $req->mob_no;
        $email_id = $req->email_id;
        $pincode = $req->pincode;
        
        $sel_gender = $req->sel_gender;
        $sel_grade = $req->sel_grade;
        $birth_date = $req->birth_date;
        $chk_terms = $req->chk_terms;



        $ipAddress = getIPAddress($req);

        $rules = [
                    'user_name' => 'required|max:20',
                    'mob_no' => 'required',
                    'pincode' => 'required|digits:6',
                    'sel_gender' => 'required',
                    'sel_grade' => 'required',
                    'birth_date' => 'required',
                    'chk_terms' => 'required'
                 ];       

        $messages = [   
                        'user_name.required' => 'Please enter valid user name.',
                        'user_name.max' => 'User name should be at most 20 chars.',
                        'mob_no.required' => 'Please enter mobile no.',
                        'pincode.required' => 'Please enter valid pincode.',
                        'sel_gender.required' => 'Select gender.',
                        'sel_grade.required' => 'Select grade.',
                        'birth_date.required' => 'Please select birth date.',
                        'chk_terms.required' => 'You must agree to terms & conditions.'
                    ];


        $validation = Validator::make($req->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('register')
            ->withInput()
            ->withErrors($validation);
        }
        else
        {
            if($birth_date!='')
            {
                $birth_date = strtotime($birth_date);
            }
        
            $register_user = $this->service->register($req,$user_name,$mob_no,$email_id,$pincode,$sel_gender,$sel_grade,$birth_date,$chk_terms,$ipAddress);
       
            if($register_user)
            {
              
                $msg = $register_user['msg'];
                $status = $register_user['status'];
                if($status=='success')
                {
                    return redirect('login')->with(compact('msg','status'));
                }
                else
                {
                    return redirect('register')->withInput()->with(compact('msg','status'));
                }
            }
            
        }


    }
    
    public function registerConfirmation(Request $req)
    {

        $userName = $req->userName;
        $mobNo = $req->mobNo;
        $emailId = $req->emailId;
        $pincode = $req->pincode;
        
        $gender = $req->gender;
        $grade = $req->grade;
        $birthDate = $req->birthDate;
        $confirmStatus = $req->confirmStatus;

        $genderName = $this->service->getGenderName($gender);
        $className = $this->service->getClassName($grade);

        return view($this->viewPath.'.registerModal',compact('userName','mobNo','emailId','pincode','genderName','className','birthDate','confirmStatus'));
       // dd($userName);


    }

    

   
}
