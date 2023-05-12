<?php
namespace App\Http\Repository\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	GeneralContact
};

class GeneralContactRepository  {
	public function getAll()
    {
        try {
            return GeneralContact::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_icon->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_icon->extension();
        
        $request->english_icon->storeAs('public/images/general_contact', $englishImageName);
        $request->marathi_icon->storeAs('public/images/general_contact', $marathiImageName);
        
        $contact_data = new GeneralContact();  
        $contact_data->english_name = $request['english_name'];
        $contact_data->marathi_name = $request['marathi_name'];
        $contact_data->english_number = $request['english_number'];
        $contact_data->marathi_number = $request['marathi_number'];
        $contact_data->english_icon =   $englishImageName;
        $contact_data->marathi_icon =   $marathiImageName;
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
        $contact = GeneralContact::find($id);
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
        $contact_data = GeneralContact::find($request->id);
        
        if (!$contact_data) {
            return [
                'msg' => 'Contact not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/general_contact/' . $contact_data->english_icon,
            'public/images/general_contact/' . $contact_data->marathi_icon
        ]);
        
        $englishImageName = time() . '_english.' . $request->english_icon->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_icon->extension();
        
        $request->english_icon->storeAs('public/images/general_contact', $englishImageName);
        $request->marathi_icon->storeAs('public/images/general_contact', $marathiImageName);
                
        $contact_data->english_name = $request['english_name'];
        $contact_data->marathi_name = $request['marathi_name'];
        $contact_data->english_number = $request['english_number'];
        $contact_data->marathi_number = $request['marathi_number'];
        $contact_data->english_icon =   $englishImageName;
        $contact_data->marathi_icon =   $marathiImageName;
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

public function deleteById($id)
{
    try {
        $contact = GeneralContact::find($id);
        if ($contact) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/general_contact/'.$contact->english_icon,
                'public/images/general_contact/'.$contact->marathi_icon,
            ]);

            // Delete the record from the database
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