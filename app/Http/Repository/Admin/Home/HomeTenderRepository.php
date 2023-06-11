<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	HomeTender
};

class HomeTenderRepository  {
	public function getAll()
    {
        try {
            return HomeTender::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        
        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/home-tenders', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/home-tenders', $marathiPdf);
        
        
        $tender_data = new HomeTender();
        $tender_data->english_title = $request['english_title'];
        $tender_data->marathi_title = $request['marathi_title'];
        $tender_data->english_description = $request['english_description'];
        $tender_data->marathi_description = $request['marathi_description'];
        $tender_data->tender_date = $request['tender_date'];
        $tender_data->url = $request['url'];
        $tender_data->english_pdf = $englishPdf;
        $tender_data->marathi_pdf = $marathiPdf;
        $tender_data->save();       
              
		return $tender_data;

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
        $tender = HomeTender::find($id);
        if ($tender) {
            return $tender;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Tender.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
        $update_data = HomeTender::find($request->id);
        
        if (!$update_data) {
            return [
                'msg' => 'Tender not found.',
                'status' => 'error'
            ];
        }

        Storage::delete([
            'public/pdf/home-tenders/' . $update_data->english_pdf,
            'public/pdf/home-tenders/' . $update_data->marathi_pdf,
        ]);

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf = time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/home-tenders', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/home-tenders', $marathiPdf);
                
        $update_data->english_title = $request['english_title'];
        $update_data->marathi_title = $request['marathi_title'];
        $update_data->english_description = $request['english_description'];
        $update_data->marathi_description = $request['marathi_description'];
        $update_data->tender_date = $request['tender_date'];
        $update_data->url = $request['url'];
        $update_data->english_pdf = $englishPdf;
        $update_data->marathi_pdf = $marathiPdf;
        $update_data->save();        
     
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
        $tender = HomeTender::find($id);
        if ($tender) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/pdf/home-tenders/'.$tender->marathi_pdf,
                'public/pdf/home-tenders/'.$tender->english_pdf
            ]);

            // Delete the record from the database
            $tender->delete();
            
            return $tender;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


       
}