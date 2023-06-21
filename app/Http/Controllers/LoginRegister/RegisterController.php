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
use session;

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
            // 'u_uname' => 'required',
            // 'u_password' => 'required',
            'role_id' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'number' => 'regex:/^\d{10}$/',
            'designation' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'regex:/^[0-9]+$/'
         ];       

        $messages = [   
                        // 'u_email.required' => 'Please enter email.',
                        // 'u_email.email' => 'Please enter valid email.',
                        // 'u_uname.required' => 'Please enter user uname.',
                        // 'u_password.required' => 'Please enter password.',
                        'role_id.required' => 'Select role',
                        'f_name.required' => 'Please enter first name.',
                        'm_name.required' =>'Please enter middle name.',
                        'l_name.required' => 'Please enter last name.',
                        'number.required' => 'Please enter number.',
                        'number.regex' => 'Please enter 10 digit number.',
                        'designation.required' =>'Please enter designation.',
                        'address.required' => 'Please enter address.',
                        'state.required' => 'Please enter state.',
                        'city.required' =>'Please enter city.',
                        'pincode.required' => 'Please enter pincode.',
                        'pincode.regex' => 'Please enter only numbers.',
                    ];


        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
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

        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }

    }



    public function register(Request $request) {

        $rules = [
                    'u_email' => 'required',
                    // 'u_uname' => 'required',
                    'u_password'=>'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[a-zA-Z\d]).{8}$/',
                    // 'u_password'=>'required',
                    // 'u_password'=>'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[a-zA-Z0-9])(?=.*[^a-zA-Z0-9]).{8}$/',
                    // 'u_password' => 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                    'role_id' => 'required',
                    'f_name' => 'required',
                    'm_name' => 'required',
                    'l_name' => 'required',
                    'number' => 'regex:/^\d{10}$/',
                    'designation' => 'required',
                    'address' => 'required',
                    
                    'state' => 'required',
                    'city' => 'required',
                    'pincode' => 'regex:/^[0-9]+$/'
                 ];       

        $messages = [   
                        'u_email.required' => 'Please enter email.',
                        'u_email.email' => 'Please enter valid email.',
                        // 'u_uname.required' => 'Please enter user uname.',
                        // 'u_password.required' => 'Please enter password.',
                        'u_password.regex' => 'Please enter 8 digit password with atleast 1 capital letter,1 small letter, 1 number and 1 alpha numeric char.',
                        // 'u_password.min' => 'Please combination of number character of 8 char.',
                        'role_id.required' => 'Select role',
                        'f_name.required' => 'Please enter first name.',
                        'm_name.required' =>'Please enter middle name.',
                        'l_name.required' => 'Please enter last name.',
                        'number.required' => 'Please enter number.',
                        'number.regex' => 'Please enter 10 digit number.',
                        'designation.required' =>'Please enter designation.',
                        'address.required' => 'Please enter address.',
                        'state.required' => 'Please enter state.',
                        'city.required' =>'Please enter city.',
                        'pincode.required' => 'Please enter pincode.',
                        'pincode.regex' => 'Please enter pincode.',

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
    // ======================================

    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-users')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function editUsersProfile(Request $request) {
        $user_data = $this->service->getProfile($request);
        // $user_detail= session()->get('user_id');
        // $id = $user_data->id;
        // dd($user_data);
        // return view('admin.layout.master',compact('user_data'));
        return view('admin.pages.users.edit-user-profile',compact('user_data'));
    }

    public function updateProfile(Request $request) {
        $rules = [
            // 'u_email' => 'required',
            // 'u_password' => 'required',
            // 'number' => 'regex:/^\d{10}$/',
         ];       

        $messages = [   
                        // 'u_email.required' => 'Please enter email.',
                        // 'u_email.email' => 'Please enter valid email.',
                        // 'u_password.required' => 'Please enter password.',
                        // 'number.regex' => 'Please enter 10 digit number.',
                    ];


        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $register_user = $this->service->updateProfile($request);
            // dd($register_user);
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

        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }

    }
   
}