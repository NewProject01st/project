<?php
namespace App\Http\Repository\EmergencyResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	EmergencyContactNumbers,
    AddMoreEmergencyContactNumbers
};

class EmergencyContactNumbersRepository  {
	public function getAll()
    {
        try {
            return EmergencyContactNumbers::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

// 	public function addAll($request)
// {
//     try {
//         $englishImageName = time() . '_english.' . $request->english_image->extension();
//         $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
//         $request->english_image->storeAs('public/images/emergency-response/emergency-contact-numbers', $englishImageName);
//         $request->marathi_image->storeAs('public/images/emergency-response/emergency-contact-numbers', $marathiImageName);

//         $emergencycontactnumbers_data = new EmergencyContactNumbers();
//         $emergencycontactnumbers_data->english_title = $request['english_title'];
//         $emergencycontactnumbers_data->marathi_title = $request['marathi_title'];
//         $emergencycontactnumbers_data->english_description = $request['english_description'];
//         $emergencycontactnumbers_data->marathi_description = $request['marathi_description'];
//         $emergencycontactnumbers_data->english_image = $englishImageName; // Save the image filename to the database
//         $emergencycontactnumbers_data->marathi_image = $marathiImageName; // Save the image filename to the database
      
//         foreach ($emergencycontactnumbers_data as $addressData) {
//             $address = new AddMoreEmergencyContactNumbers([
//                 'english_emergency_contact_title' => $addressData['english_emergency_contact_title'],
//                 'marathi_emergency_contact_title' => $addressData['marathi_emergency_contact_title'],
//                 'english_emergency_contact_number' => $addressData['english_emergency_contact_number'],
//                 'marathi_emergency_contact_number' => $addressData['marathi_emergency_contact_number'],
//             ]);

//             $emergencycontactnumbers_data->addresses()->save($address);
//         }
      
      
      
//         // $emergencycontactnumbers_data->save();       
     
//         return $emergencycontactnumbers_data;
//     } catch (\Exception $e) {
//         return [
//             'msg' => $e,
//             'status' => 'error'
//         ];
//     }
// }

public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();

        $request->file('english_image')->storeAs('public/images/emergency-response/emergency-contact-numbers', $englishImageName);
        $request->file('marathi_image')->storeAs('public/images/emergency-response/emergency-contact-numbers', $marathiImageName);
    
        $emergencyContactNumbers = new EmergencyContactNumbers();
        $emergencyContactNumbers->english_title = $request->input('english_title');
        $emergencyContactNumbers->marathi_title = $request->input('marathi_title');
        $emergencyContactNumbers->english_description = $request->input('english_description');
        $emergencyContactNumbers->marathi_description = $request->input('marathi_description');
        $emergencyContactNumbers->english_image = $englishImageName;
        $emergencyContactNumbers->marathi_image = $marathiImageName;

        // dd($emergencyContactNumbers);
        $emergencyContactNumbers->save();
 
        $emergencyContactId = $emergencyContactNumbers->id; // Get the ID of the saved emergency contact
        
        $data = $request->data; // Assuming the additional emergency contact numbers are sent as an array in the 'data' field of the request
        
        foreach ($data as $contact) {
            $addressesData = new AddMoreEmergencyContactNumbers();
            $addressesData->emergency_contact_id = $emergencyContactId;
            $addressesData->english_emergency_contact_title = $contact['english_emergency_contact_title'];
            $addressesData->marathi_emergency_contact_title = $contact['marathi_emergency_contact_title'];
            $addressesData->english_emergency_contact_number = $contact['english_emergency_contact_number'];
            $addressesData->marathi_emergency_contact_number = $contact['marathi_emergency_contact_number'];
            $addressesData->save();
        }

         print_r($addressesData);
        return $emergencyContactNumbers;

    } catch (\Exception $e) {
        return [
            'msg' => $e->getMessage(),
            'status' => 'error'
        ];
    }    
}




// public function addAll($request)
// {
//     try {
//         // ... existing code ...

//         $emergencyContactNumbers->save();

//         $emergencyContactId = $emergencyContactNumbers->id; // Get the ID of the saved emergency contact
        
//         $data = $request->data; // Assuming the additional emergency contact numbers are sent as an array in the 'data' field of the request
        
//         foreach ($data as $contact) {
//             $addressesData = new AddMoreEmergencyContactNumbers();
//             $addressesData->emergency_contact_id = $emergencyContactId;
//             $addressesData->english_emergency_contact_title = $contact['english_emergency_contact_title'];
//             $addressesData->marathi_emergency_contact_title = $contact['marathi_emergency_contact_title'];
//             $addressesData->english_emergency_contact_number = $contact['english_emergency_contact_number'];
//             $addressesData->marathi_emergency_contact_number = $contact['marathi_emergency_contact_number'];
//             $addressesData->save();
//         }

//         return $emergencyContactNumbers;
//     } catch (\Exception $e) {
//         return [
//             'msg' => $e->getMessage(),
//             'status' => 'error'
//         ];
//     }    
// }


public function getById($id)
{
    try {
        $emergencycontactnumbers = EmergencyContactNumbers::find($id);
        if ($emergencycontactnumbers) {
            return $emergencycontactnumbers;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Organization Chart.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
   
    try {
        $emergencycontactnumbers_data = EmergencyContactNumbers::find($request->id);
        
        if (!$emergencycontactnumbers_data) {
            return [
                'msg' => 'Emergency Contact Numbers not found.',
                'status' => 'error'
            ];
        }
        
          
        //Store the previous image name
        $previousEnglishImage = $emergencycontactnumbers_data->english_image;
        $previousMarathiImage = $emergencycontactnumbers_data->marathi_image;
  


        $emergencycontactnumbers_data = EmergencyContactNumbers::find($request->id);
        $emergencycontactnumbers_data->english_title = $request['english_title'];
        $emergencycontactnumbers_data->marathi_title = $request['marathi_title'];
        $emergencycontactnumbers_data->english_description = $request['english_description'];
        $emergencycontactnumbers_data->marathi_description = $request['marathi_description'];
        if($request->hasFile('english_image'))
        {
            if($previousEnglishImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/emergency-contact-numbers/' . $previousEnglishImage);
            }
            
            //Store and update new image
             
        $englishImageName = time() . '_english.' . $request->english_image->extension(); 
        $request->english_image->storeAs('public/images/emergency-response/emergency-contact-numbers/', $englishImageName);
        $emergencycontactnumbers_data->english_image = $englishImageName;

        }
        if($request->hasFile('marathi_image'))
        {
            if($previousMarathiImage)
            {
                // Delete existing files
                Storage::delete('public/images/emergency-response/emergency-contact-numbers/' . $previousMarathiImage);
            }
            
            //Store and update new image
             
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension(); 
        $request->marathi_image->storeAs('public/images/emergency-response/emergency-contact-numbers/', $marathiImageName);
        $emergencycontactnumbers_data->marathi_image = $marathiImageName;

        }
        $emergencycontactnumbers_data->save();       
     
        return [
            'msg' => 'Emergency Contact Numbers updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update ReliefMeasures Resources.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $emergencycontactnumbers = EmergencyContactNumbers::find($id);
        if ($emergencycontactnumbers) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/emergency-response/emergency-contact-numbers/'.$emergencycontactnumbers->english_image,
                'public/images/emergency-response/emergency-contact-numbers/'.$emergencycontactnumbers->marathi_image
            ]);

            // Delete the record from the database
            $emergencycontactnumbers->delete();
            
            return $emergencycontactnumbers;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


}