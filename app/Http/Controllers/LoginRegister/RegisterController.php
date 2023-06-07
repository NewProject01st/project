<?php

namespace App\Http\Controllers\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\LoginRegister\RegisterServices;
use App\Models\ {
    Roles,
    Permissions
};
use Validator;

class RegisterController extends Controller {
    /**
     * Topic constructor.
     */
    public function __construct()
    {
        $this->service = new RegisterServices();
    }

    public function index()
    {
        $register_user = $this->service->index();
        return view('admin.pages.users.users-list',compact('register_user'));
    }


    public function addUsers()
    {
        $roles = Roles::where('is_active', true)
                        ->select('id','role_name')
                        ->get()
                        ->toArray();
        $permissions = Permissions::where('is_active', true)
                            ->select('id','route_name','permission_name','url')
                            ->get()
                            ->toArray();
    	return view('admin.pages.users.add-users',compact('roles','permissions'));
    }

    public function editUsers(Request $request) {
        $user_data = $this->service->editUsers($request);
        // dd($user_data);
        return view('admin.pages.users.edit-users',compact('user_data'));
    }

    public function update(Request $request) {
        // $user_data = $this->service->editUsers($request);
        // return view('admin.pages.users.users-list',compact('user_data'));

        $rules = [
            // 'u_email' => 'required',
            'u_uname' => 'required',
            // 'u_password' => 'required',
            'role_id' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required'
         ];       

        $messages = [   
                        // 'u_email.required' => 'Please enter email.',
                        // 'u_email.email' => 'Please enter valid email.',
                        'u_uname.required' => 'Please enter user uname.',
                        // 'u_password.required' => 'Please enter password.',
                        'role_id.required' => 'Select role',
                        'f_name.required' => 'Please enter first name.',
                        'm_name.required' =>'Please enter middle name.',
                        'l_name.required' => 'Please enter last name.',
                    ];


        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('edit-users')
            ->withInput()
            ->withErrors($validation);
        }
        else
        {
            $register_user = $this->service->update($request);

            if($register_user)
            {
            
                $msg = $register_user['msg'];
                $status = $register_user['status'];
                if($status=='success') {
                    return redirect('list-users')->with(compact('msg','status'));
                }
                else {
                    return redirect('list-users')->withInput()->with(compact('msg','status'));
                }
            }
            
        }

    }



    public function register(Request $request) {

        $rules = [
                    'u_email' => 'required',
                    'u_uname' => 'required',
                    'u_password' => 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                    'role_id' => 'required',
                    'f_name' => 'required',
                    'm_name' => 'required',
                    'l_name' => 'required'
                 ];       

        $messages = [   
                        'u_email.required' => 'Please enter email.',
                        'u_email.email' => 'Please enter valid email.',
                        'u_uname.required' => 'Please enter user uname.',
                        'u_password.required' => 'Please enter password.',
                        'u_password.regex' => 'Please enter atleast 3 capital letter, 3 small letter and 2 numbers in password.',
                        // 'u_password.min' => 'Please combination of number character of 8 char.',
                        'role_id.required' => 'Select role',
                        'f_name.required' => 'Please enter first name.',
                        'm_name.required' =>'Please enter middle name.',
                        'l_name.required' => 'Please enter last name.',
                    ];


        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-users')
            ->withInput()
            ->withErrors($validation);
        }
        else
        {
            $register_user = $this->service->register($request);
       
            if($register_user)
            {
              
                $msg = $register_user['msg'];
                $status = $register_user['status'];
                if($status=='success') {
                    return redirect('list-users')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-users')->withInput()->with(compact('msg','status'));
                }
            }
            
        }


    }

    public function delete(Request $request) {
        $delete_user = $this->service->delete($request);
        $msg = 'User deleted successfully';
        $status = 'success';
        return redirect('list-users')->with(compact('msg','status'));
    }
   
}
