<?php
namespace App\Http\Repository\Admin\Footer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	WebsiteContactDepartment
};
class WebsiteContactDepartmentRepository  {
	public function getAll(){
        try {
            return WebsiteContactDepartment::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request){
        try {
            $contact_data = new WebsiteContactDepartment();  
            $contact_data->department_english_name =  $request['department_english_name'];
            $contact_data->department_marathi_name =  $request['department_marathi_name'];
            $contact_data->department_english_address =  $request['department_english_address'];
            $contact_data->department_marathi_address =  $request['department_marathi_address'];
            $contact_data->department_email =  $request['department_email'];
            $contact_data->department_english_contact_number =  $request['department_english_contact_number'];
            $contact_data->department_marathi_contact_number =  $request['department_marathi_contact_number'];
            $contact_data->save();       
                
            return $contact_data;

        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }
    public function getById($id)
    {
        try {
            $contact = WebsiteContactDepartment::find($id);
            if ($contact) {
                return $contact;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Contact.',
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request)
    {
        try {
            $contact_data = WebsiteContactDepartment::find($request->id);
            
            if (!$contact_data) {
                return [
                    'msg' => 'Contact not found.',
                    'status' => 'error'
                ];
            }
            $contact_data->department_english_name =  $request['department_english_name'];
            $contact_data->department_marathi_name =  $request['department_marathi_name'];
            $contact_data->department_english_address =  $request['department_english_address'];
            $contact_data->department_marathi_address =  $request['department_marathi_address'];
            $contact_data->department_email =  $request['department_email'];
            $contact_data->department_english_contact_number =  $request['department_english_contact_number'];
            $contact_data->department_marathi_contact_number =  $request['department_marathi_contact_number'];
            $contact_data->save();        
        
            return [
                'msg' => 'Contact updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Contact.',
                'status' => 'error'
            ];
        }
    }
    public function updateOne($request)
    {
        try {
            $contact = WebsiteContactDepartment::find($request); // Assuming $request directly contains the ID        
            if ($contact) {
                $is_active = $contact->is_active === 1 ? 0 : 1;
                $contact->is_active = $is_active;
                
                $contact->save();
                return [
                    'msg' => 'Contact updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'Contact not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update Contact.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id)
    {
        try {
            $contact = WebsiteContactDepartment::find($id);
            if ($contact) {
                $contact->delete();
                return $contact;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
}