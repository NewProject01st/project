<?php
namespace App\Http\Repository\ResourceCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	TrainingMaterialsWorkshops
};

class TrainingAndWorkshopRepository  {
	public function getAll()
    {
        try {
            return TrainingMaterialsWorkshops::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        
        $training_data = new TrainingMaterialsWorkshops();
        $training_data->english_title = $request['english_title'];
        $training_data->marathi_title = $request['marathi_title'];
        // $training_data->url = $request['url'];
        // $training_data->english_description = $request['english_description'];
        // $training_data->marathi_description = $request['marathi_description'];
     
        $training_data->save();       
        $last_insert_id = $training_data->id;

        $englishPdfName = $last_insert_id . '_english.' . $request->english_pdf->extension();
        $marathiPdfName = $last_insert_id . '_marathi.' . $request->marathi_pdf->extension();
        
        $document = TrainingMaterialsWorkshops::find($last_insert_id); // Assuming $request directly contains the ID
        $document->english_pdf = $englishPdfName; // Save the image filename to the database
        $document->marathi_pdf = $marathiPdfName; // Save the image filename to the database
        $document->save();
        
        return $last_insert_id;      
		
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
        $training = TrainingMaterialsWorkshops::find($id);
        if ($training) {
            return $training;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id documents.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
        $return_data = array();
        $update_training = TrainingMaterialsWorkshops::find($request->id);
        
        if (!$update_training) {
            return [
                'msg' => 'Training Material and Workshop not found.',
                'status' => 'error'
            ];
        }
        // Store the previous image names
        $previousEnglishPdf = $update_training->english_pdf;
        $previousMarathiPdf = $update_training->marathi_pdf;


        $update_training->english_title = $request['english_title'];
        $update_training->marathi_title = $request['marathi_title'];
        // $update_training->url = $request['url'];
        // $update_training->english_description = $request['english_description'];
        // $update_training->marathi_description = $request['marathi_description'];
        $update_training->save();
        $last_insert_id = $update_training->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_pdf'] = $previousEnglishPdf;
        $return_data['marathi_pdf'] = $previousMarathiPdf;
        return  $return_data;

        
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Training Material and Workshop.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $training = TrainingMaterialsWorkshops::find($id);
        if ($training) {
             // Delete the images from the storage folder
             if (file_exists(storage_path(Config::get('DocumentConstant.TRAINING_MATERIAL_DELETE') . $training->english_image))) {
                unlink(storage_path(Config::get('DocumentConstant.TRAINING_MATERIAL_DELETE') . $training->english_image));
            }
            if (file_exists(storage_path(Config::get('DocumentConstant.TRAINING_MATERIAL_DELETE') . $training->marathi_image))) {
                unlink(storage_path(Config::get('DocumentConstant.TRAINING_MATERIAL_DELETE') . $training->marathi_image));
            }
            $training->delete();
                        
            return $training;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


       
}