<?php

namespace App\Http\Controllers\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\LoginRegister\LoginService;
use Session;

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
        $this->validateLogin($request);
        $resp  = self::$loginServe->checkLogin($request);
        
        if($resp['status']=='success') {
           
              return view('dashboard');
        } else {
            return view('applicant.common.login.login')->withErrors([
                    'name' => $resp['msg'],
                ]);
        }
    }

    protected function validateLogin(Request $request)
    {   
        $this->validate($request, [
            'email' => 'required | email', 
            'password' => 'required',
            'mobile'=>'required|digits:10'
        ]);
    }


    public function logout(Request $request)
    {
 
        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('login');
    }
}
