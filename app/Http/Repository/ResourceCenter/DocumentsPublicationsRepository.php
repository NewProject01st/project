<?php
namespace App\Http\Repository\ResourceCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Documentspublications
};
use Config;

class DocumentsPublicationsRepository  {
	public function getAll()
    {
        try {
            return Documentspublications::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request){
    try {
       
        $documents_data = new Documentspublications();
        $documents_data->english_title = $request['english_title'];
        $documents_data->marathi_title = $request['marathi_title'];
        $documents_data->english_description = $request['english_description'];
        $documents_data->marathi_description = $request['marathi_description'];

        $documents_data->save();       
        $last_insert_id = $documents_data->id;

        $englishImageName = $last_insert_id . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id . '_marathi.' . $request->marathi_image->extension();
        
        $document = Documentspublications::find($last_insert_id); // Assuming $request directly contains the ID
        $document->english_image = $englishImageName; // Save the image filename to the database
        $document->marathi_image = $marathiImageName; // Save the image filename to the database
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
        $documents = Documentspublications::find($id);
        if ($documents) {
            return $documents;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Document Publication.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
        $return_data = array();
        $update_document = Documentspublications::find($request->id);
        
        if (!$update_document) {
            return [
                'msg' => 'Document Publication not found.',
                'status' => 'error'
            ];
        }
        // Store the previous image names
        $previousEnglishImage = $update_document->english_image;
        $previousMarathiImage = $update_document->marathi_image;

        $update_document->english_title = $request['english_title'];
        $update_document->marathi_title = $request['marathi_title'];
        $update_document->english_description = $request['english_description'];
        $update_document->marathi_description = $request['marathi_description'];

        $update_document->save();
            $last_insert_id = $update_document->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_image'] = $previousEnglishImage;
            $return_data['marathi_image'] = $previousMarathiImage;
            return  $return_data;

    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Document Publication.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $documents = Documentspublications::find($id);
        if ($documents) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/pdf/research-center/documents'.$documents->marathi_pdf,
                'public/pdf/research-center/documents'.$documents->english_pdf
            ]);

            // Delete the record from the database
            $documents->delete();
            
            return $documents;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


       
}