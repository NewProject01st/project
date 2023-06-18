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
use Config;

class EmergencyContactNumbersRepository {
	public function getAll(){
        try {
            $data_output = EmergencyContactNumbers::all();
            $data_output_array = AddMoreEmergencyContactNumbers::all();
            // $data_output = $data_output->get()->toArray();
            // $data_output_array = $data_output_array->get()->toArray();
            // dd($data_output_array);
            return ['data_output' => $data_output, 'data_output_array' => $data_output_array];

            // return EmergencyContactNumbers::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function addAll($request){
        try {
        
            $emergencyContactNumbers = new EmergencyContactNumbers();
            $emergencyContactNumbers->english_title = $request->input('english_title');
            $emergencyContactNumbers->marathi_title = $request->input('marathi_title');
            $emergencyContactNumbers->english_description = $request->input('english_description');
            $emergencyContactNumbers->marathi_description = $request->input('marathi_description');

            // dd($emergencyContactNumbers);
            $emergencyContactNumbers->save();

            $emergencyContactId = $emergencyContactNumbers->id;

            $data = $request->input('no_of_text_boxes');
            //   dd($data);
            for ($i = 1; $i<=$data; $i++) {
            // dd("hey in loop");
                $english_emergency_contact_title  = 'english_emergency_contact_title_'.$i;
                $marathi_emergency_contact_title  = 'marathi_emergency_contact_title_'.$i;
                $english_emergency_contact_number  = 'english_emergency_contact_number_'.$i;
                $marathi_emergency_contact_number  = 'marathi_emergency_contact_number_'.$i;
                // dd($request->$marathi_emergency_contact_title);
                $addressesData = new AddMoreEmergencyContactNumbers();
                $addressesData->emergency_contact_id = $emergencyContactId;
                
            

                // Assign values to the new object
                $addressesData->english_emergency_contact_title = $request->$english_emergency_contact_title;
                $addressesData->marathi_emergency_contact_title = $request->$marathi_emergency_contact_title;
                $addressesData->english_emergency_contact_number = $request->$english_emergency_contact_number;
                $addressesData->marathi_emergency_contact_number = $request->$marathi_emergency_contact_number;

                // dd($addressesData);

                $addressesData->save();
            }
            // dd("hi");
            $last_insert_id = $emergencyContactNumbers->id;

            $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
            
            $emergencyContactNumbers = EmergencyContactNumbers::find($last_insert_id); // Assuming $request directly contains the ID
          
            $emergencyContactNumbers->english_image = $englishImageName; // Save the image filename to the database
            $emergencyContactNumbers->marathi_image = $marathiImageName; // Save the image filename to the database
            $emergencyContactNumbers->save();

            return $last_insert_id;

        } catch (\Exception $e) {
            return [
                'msg' => $e->getMessage(),
                'status' => 'error'
            ];
        }
    }


    public function addAllAddMore($request)
{
    try {
        $emergencyContactNumbers = new EmergencyContactNumbers();
        $last_insert_id = $emergencyContactNumbers->id;
        $contact_data = new AddMoreEmergencyContactNumbers(); 
        
        $contact_data->emergency_contact_id = $last_insert_id;
        $contact_data->english_emergency_contact_title = $request->input('english_emergency_contact_title');
        $contact_data->marathi_emergency_contact_title = $request->input('marathi_emergency_contact_title');
        $contact_data->english_emergency_contact_number = $request->input('english_emergency_contact_number');
        $contact_data->marathi_emergency_contact_number = $request->input('marathi_emergency_contact_number');

        $contact_data->save();       
              
		return $contact_data;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

    public function getById($id){
        try {
            $return_data = [];
            $emergencycontactnumbers = EmergencyContactNumbers::find($id);
            $emergencycontactnumbersAddMore = AddMoreEmergencyContactNumbers::where('emergency_contact_id', '=', $id)->get()->toArray();
            $emergencycontactnumbersAddMoreID = AddMoreEmergencyContactNumbers::where('emergency_contact_id', '=', $id)->pluck('id');
            $return_data['emergencycontactnumbers']  = $emergencycontactnumbers;
            $return_data['emergencycontactnumbersAddMore']  = $emergencycontactnumbersAddMore;
            $return_data['emergencycontactnumbersAddMoreID']  = $emergencycontactnumbersAddMoreID;
            if ($return_data) {
                return $return_data;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateAll($request){
    
        try {
            // dd($request);
            $return_data = array();
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
            $emergencycontactnumbers_data->save();  
            
            $emergencyContactId = $emergencycontactnumbers_data->id;

            $data = $request->input('no_of_text_boxes');
            //   dd($data);
            for ($i = 1; $i<=$data; $i++) {
            // dd("hey in loop");
                $english_emergency_contact_title  = 'english_emergency_contact_title_'.$i;
                $marathi_emergency_contact_title  = 'marathi_emergency_contact_title_'.$i;
                $english_emergency_contact_number  = 'english_emergency_contact_number_'.$i;
                $marathi_emergency_contact_number  = 'marathi_emergency_contact_number_'.$i;
                // dd($request->$marathi_emergency_contact_title);
                $addressesData = new AddMoreEmergencyContactNumbers();
                $addressesData->emergency_contact_id = $emergencyContactId;
                
            

                // Assign values to the new object
                $addressesData->english_emergency_contact_title = $request->$english_emergency_contact_title;
                $addressesData->marathi_emergency_contact_title = $request->$marathi_emergency_contact_title;
                $addressesData->english_emergency_contact_number = $request->$english_emergency_contact_number;
                $addressesData->marathi_emergency_contact_number = $request->$marathi_emergency_contact_number;

                // dd($addressesData);

                $addressesData->save();
            }
            // dd("hi");
            $last_insert_id = $emergencycontactnumbers_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;

            return  $return_data;
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update ReliefMeasures Resources.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id){
        try {
            $emergencycontactnumbers = EmergencyContactNumbers::find($id);
            if ($emergencycontactnumbers) {
                unlink(storage_path(Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_DELETE') . $emergencycontactnumbers->english_image));
                unlink(storage_path(Config::get('DocumentConstant.EMERGENCY_CONTACT_NUMBERS_DELETE') . $emergencycontactnumbers->marathi_image));
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