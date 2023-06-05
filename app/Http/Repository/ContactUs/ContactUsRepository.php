<?php
namespace App\Http\Repository\ContactUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Contact
};

class ContactUsRepository{
	public function getAll()
    {
        try {
            return Contact::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        
        $contact_data = new Contact();
        $contact_data->full_name = $request['full_name'];
        $contact_data->email = $request['email'];
        $contact_data->mobile_number = $request['mobile_number'];
        $contact_data->contact_type = $request['contact_type'];
        $contact_data->subject = $request['subject'];
        $contact_data->suggestion =   $request['suggestion'];
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
        $contact = Contact::find($id);
        if ($contact) {
            return $contact;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Volunteer Citizen Support.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $contact_data = Contact::find($request->id);
        
        if (!$contact_data) {
            return [
                'msg' => 'volunteer data not found.',
                'status' => 'error'
            ];
        }
      
        $contact_data->full_name = $request['full_name'];
        $contact_data->email = $request['email'];
        $contact_data->mobile_number = $request['mobile_number'];
        $contact_data->contact_type = $request['contact_type'];
        $contact_data->subject = $request['subject'];
        $contact_data->suggestion =   $request['suggestion'];
       
        $contact_data->save();        
     
        return [
            'msg' => 'volunteer data updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update volunteer data.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $contact = Contact::find($id);
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