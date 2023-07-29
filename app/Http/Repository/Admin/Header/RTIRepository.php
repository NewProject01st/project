<?php
namespace App\Http\Repository\Admin\Header;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	RTI
};
use Config;

class RTIRepository{
	public function getAll(){
        try {
            return RTI::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request){
    try {   
        $rti_data = new RTI();
        $rti_data->english_title = $request['english_title'];
        $rti_data->marathi_title = $request['marathi_title'];
        $rti_data->save();       
              
        $last_insert_id = $rti_data->id;

        $englishPdfName = $last_insert_id . '_english.' . $request->english_pdf->extension();
        $marathiPdfName = $last_insert_id . '_marathi.' . $request->marathi_pdf->extension();
        
        $rti_data = RTI::find($last_insert_id); // Assuming $request directly contains the ID
        $rti_data->english_pdf = $englishPdfName; // Save the pdf filename to the database
        $rti_data->marathi_pdf = $marathiPdfName; // Save the pdf filename to the database
        $rti_data->save();
        
        return $last_insert_id;


    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id){
    try {
        $rti = RTI::find($id);
        if ($rti) {
            return $rti;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id RTI.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request){
    try {
        $return_data = array();
        $rti_data = RTI::find($request->id);
        
        if (!$rti_data) {
            return [
                'msg' => 'RTI not found.',
                'status' => 'error'
            ];
        }
        $rti_data->english_title = $request['english_title'];
        $rti_data->marathi_title = $request['marathi_title'];

        $previousEnglishPdf = $rti_data->english_pdf;
        $previousMarathiPdf = $rti_data->marathi_pdf;
        $rti_data->save();        
     
        $last_insert_id = $rti_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_pdf'] = $previousEnglishPdf;
        $return_data['marathi_pdf'] = $previousMarathiPdf;
        return  $return_data;
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update RTI.',
            'status' => 'error'
        ];
    }
}
public function updateOne($request){
        try {
            $rti = RTI::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($rti) {
                $is_active = $rti->is_active === 1 ? 0 : 1;
                $rti->is_active = $is_active;
                $rti->save();

                return [
                    'msg' => 'RTI updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'RTI not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update RTI.',
                'status' => 'error'
            ];
        }
    }
public function deleteById($id){
    try {
        $rti = RTI::find($id);
        if ($rti) {
            if (file_exists_s3(Config::get('DocumentConstant.RTI_PDF_DELETE') . $rti->english_pdf)) {
                removeImage(Config::get('DocumentConstant.RTI_PDF_DELETE') . $rti->english_pdf);
            }
            if (file_exists_s3(Config::get('DocumentConstant.RTI_PDF_DELETE') . $rti->marathi_pdf)) {
                removeImage(Config::get('DocumentConstant.RTI_PDF_DELETE') . $rti->marathi_pdf);
            }
            $rti->delete();           
            return $rti;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


       
}