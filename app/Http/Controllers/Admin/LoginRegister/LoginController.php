<?php

namespace App\Http\Controllers\Admin\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\LoginRegister\LoginService;
use Session;
use Validator;
use PDO;

class LoginController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        self::$loginServe = new LoginService();
    }

    public function index(){
        
        return view('admin.login');
    }

    public function submitLogin(Request $request) {

        $rules = [
            'email' => 'required | email', 
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            ];
        $messages = [   
            'email.required' => 'Please Enter Email.',
            'email.email' => 'Please Enter a Valid Email Address.',
            'password.required' => 'Please Enter Password.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('login')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $resp  = self::$loginServe->checkLogin($request);
                if($resp['status']=='success') {
                    return redirect('/dashboard');
                } else {
                    return redirect('/login')->with('error', $resp['msg']);
                }

            }

        } catch (Exception $e) {
            return redirect('feedback-suggestions')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
        
    }

    public function logout(Request $request)
    {
 
        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/login');
    }
}
