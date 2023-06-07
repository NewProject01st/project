<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Http\Services\Menu\RoleServices;
use Validator;
class RoleController extends Controller
{

   public function __construct()
    {
        $this->service = new RoleServices();
    }
    public function index()
    {
        try {
            $roles = $this->service->getAllRole();
            return view('admin.pages.menu.roles.list-role', compact('roles'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.menu.roles.add-role');
    }

    public function store(Request $request) {
        $rules = [
            'role_name' => 'required',
            
         ];
    $messages = [   
        'role_name.required' => 'Please  enter english title.',
       
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-role')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_role = $this->service->addRole($request);
            if($add_role)
            {
                $msg = $add_role['msg'];
                $status = $add_role['status'];
                if($status=='success') {
                    return redirect('list-role')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-role')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-role')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $roles = $this->service->getById($request->show_id);
            return view('admin.pages.menu.roles.show-role', compact('roles'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $roles = Roles::find($request->edit_id);
        // dd($budgets);

        return view('admin.pages.menu.roles.edit-role', compact('roles'));
    }

    public function update(Request $request) {
    $rules = [
             'role_name' => 'required',
        
     ];

    $messages = [   
        'role_name.required' => 'Please  enter english title.',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_role = $this->service->updateRole($request);
            if ($update_role) {
                $msg = $update_role['msg'];
                $status = $update_role['status'];
                if ($status == 'success') {
                    return redirect('list-role')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        }
        
    } catch (Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
public function updateOneRole(Request $request)
{
    try {
        $active_id = $request->active_id;
    $result = $this->service->updateOneRole($active_id);
        return redirect('list-role')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $roles = $this->service->deleteById($request->delete_id);
            return redirect('list-role')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}