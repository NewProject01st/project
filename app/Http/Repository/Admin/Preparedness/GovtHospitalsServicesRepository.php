<?php
namespace App\Http\Repository\Admin\Preparedness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	GovtHospitals
};
use Config;

class GovtHospitalsServicesRepository{
	public function getAll()
    {
        try {
            return GovtHospitals::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function addAll($request) {
        try {
            $govt_data = new GovtHospitals();
            $govt_data->hospital_english_type = $request['hospital_english_type'];
            $govt_data->english_name = $request['english_name'];
            $govt_data->marathi_name = $request['marathi_name'];
            $govt_data->english_area = $request['english_area'];
            $govt_data->marathi_area = $request['marathi_area'];
            $govt_data->english_address = $request['english_address'];
            $govt_data->marathi_address = $request['marathi_address'];
    
            if ($request['hospital_english_type'] == 1) {
                $govt_data->marathi_phone = $request['marathi_phone'];
                $govt_data->english_phone = $request['english_phone'];
                $govt_data->email = ''; // or null, depending on your requirements
                $govt_data->marathi_pincode = '';
                $govt_data->english_pincode = '';
            } elseif ($request['hospital_english_type'] == 2) {
                $govt_data->email = $request['email'];
                $govt_data->marathi_pincode = $request['marathi_pincode'];
                $govt_data->english_pincode = $request['english_pincode'];
                $govt_data->marathi_phone = '';
                $govt_data->english_phone = '';
            } else {
                // You might want to handle other cases or provide a default behavior here
            }
    
            $govt_data->save();       
    
            return $govt_data;
        } catch (\Exception $e) {
            return [
                'msg' => $e->getMessage(),
                'status' => 'error'
            ];
        }
    }
    
    
    public function getById($id){
        try {
            $disaster_act = GovtHospitals::find($id);
            if ($disaster_act) {
                return $disaster_act;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Data.',
                'status' => 'error'
            ];
        }
    }

    public function updateAll($request){
        try {
            $govt_data = GovtHospitals::find($request->id);
            
            if (!$govt_data) {
                return [
                    'msg' => 'Data not found.',
                    'status' => 'error'
                ];
            }
            $govt_data->hospital_english_type = $request['hospital_english_type'];
            $govt_data->english_name = $request['english_name'];
            $govt_data->marathi_name = $request['marathi_name'];
            $govt_data->english_area = $request['english_area'];
            $govt_data->marathi_area = $request['marathi_area'];
            $govt_data->english_address = $request['english_address'];
            $govt_data->marathi_address = $request['marathi_address'];
    
            if ($request['hospital_english_type'] == 1) {
                $govt_data->marathi_phone = $request['marathi_phone'];
                $govt_data->english_phone = $request['english_phone'];
                $govt_data->email = ''; // or null, depending on your requirements
                $govt_data->marathi_pincode = '';
                $govt_data->english_pincode = '';
            } elseif ($request['hospital_english_type'] == 2) {
                $govt_data->email = $request['email'];
                $govt_data->marathi_pincode = $request['marathi_pincode'];
                $govt_data->english_pincode = $request['english_pincode'];
                $govt_data->marathi_phone = '';
                $govt_data->english_phone = '';
            } else {
                // You might want to handle other cases or provide default behavior here
            }

            $govt_data->save();        
        
            return [
                'msg' => 'Data updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Data.',
                'status' => 'error'
            ];
        }
    }


    // public function updateAll($request)
    // {
    //     try { 
    //         $return_data = array();
    //         $govt_data = GovtHospitals::find($request->id);
            
    //         if (!$govt_data) {
    //             return [
    //                 'msg' => 'Hospital not found.',
    //                 'status' => 'error'
    //             ];
    //         }
    
    //         $govt_data->hospital_english_type = $request['hospital_english_type'];
    //         $govt_data->english_name = $request['english_name'];
    //         $govt_data->marathi_name = $request['marathi_name'];
    //         $govt_data->english_area = $request['english_area'];
    //         $govt_data->marathi_area = $request['marathi_area'];
    //         $govt_data->english_address = $request['english_address'];
    //         $govt_data->marathi_address = $request['marathi_address'];
    
    //         if ($request['hospital_english_type'] == 1) {
    //             $govt_data->marathi_phone = $request['marathi_phone'];
    //             $govt_data->english_phone = $request['english_phone'];
    //             $govt_data->email = ''; // or null, depending on your requirements
    //             $govt_data->marathi_pincode = '';
    //             $govt_data->english_pincode = '';
    //         } elseif ($request['hospital_english_type'] == 2) {
    //             $govt_data->email = $request['email'];
    //             $govt_data->marathi_pincode = $request['marathi_pincode'];
    //             $govt_data->english_pincode = $request['english_pincode'];
    //             $govt_data->marathi_phone = '';
    //             $govt_data->english_phone = '';
    //         } else {
    //             // You might want to handle other cases or provide default behavior here
    //         }
    
    //         $last_insert_id = $govt_data->id;

    //         $return_data['last_insert_id'] = $last_insert_id;
          
    //         return  $return_data;
    //         dd($return_data);
    //         die();
    //         return [
    //             'msg' => 'Data updated successfully.',
    //             'status' => 'success'
    //         ];
    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => 'Failed to update Data.',
    //             'status' => 'error'
    //         ];
    //     }
    // }
    
    

    public function updateOne($request){
        try {
            $vacancy = GovtHospitals::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($vacancy) {
                $is_active = $vacancy->is_active === 1 ? 0 : 1;
                $vacancy->is_active = $is_active;
                $vacancy->save();

                return [
                    'msg' => 'Data updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'Data not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update Data.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id){
        try {
            $disaster_act = GovtHospitals::find($id);
            if ($disaster_act) {
                // Delete the images from the storage folder
                if (file_exists_s3(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->english_pdf)) {
                    removeImage(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->english_pdf);
                }
                if (file_exists_s3(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->marathi_pdf)) {
                    removeImage(Config::get('DocumentConstant.DISASTER_MANAGEMENT_ACT_DELETE') . $disaster_act->marathi_pdf);
                }
                $disaster_act->delete();
                return $disaster_act;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
       
}