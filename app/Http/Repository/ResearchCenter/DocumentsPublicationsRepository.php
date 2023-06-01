<?php
namespace App\Http\Repository\ResearchCenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Documentspublications
};

class DocumentsPublicationsRepository  {
	public function getAll()
    {
        try {
            return Documentspublications::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        
        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/research-center/documents', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/research-center/documents', $marathiPdf);
        
        
        $documents_data = new Documentspublications();
        $documents_data->english_title = $request['english_title'];
        $documents_data->marathi_title = $request['marathi_title'];
        $documents_data->english_description = $request['english_description'];
        $documents_data->marathi_description = $request['marathi_description'];
        $documents_data->english_pdf = $englishPdf;
        $documents_data->marathi_pdf = $marathiPdf;
        $documents_data->save();       
              
		return $documents_data;

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
            'msg' => 'Failed to get by id documents.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
        $update_document = Documentspublications::find($request->id);
        
        if (!$update_document) {
            return [
                'msg' => 'Tender not found.',
                'status' => 'error'
            ];
        }

        Storage::delete([
            'public/pdf/research-center/documents' . $update_document->english_pdf,
            'public/pdf/research-center/documents' . $update_document->marathi_pdf,
        ]);

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf = time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/research-center/documents', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/research-center/documents', $marathiPdf);
                
        $update_document->english_title = $request['english_title'];
        $update_document->marathi_title = $request['marathi_title'];
        $update_document->english_description = $request['english_description'];
        $update_document->marathi_description = $request['marathi_description'];
        $update_document->english_pdf = $englishPdf;
        $update_document->marathi_pdf = $marathiPdf;
        $update_documents->save();        
     
        return [
            'msg' => 'Tender updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Tender.',
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