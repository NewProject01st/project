<?php
namespace App\Http\Repository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Tenders
};

class TendersRepository  {
	public function getAll()
    {
        try {
            return Tenders::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/tenders', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/tenders', $marathiPdf);
        
        $tender_data = new Tenders();
        $tender_data->tender_date = $request['tender_date'];
        $tender_data->english_title = $request['english_title'];
        $tender_data->marathi_title = $request['marathi_title'];
        $tender_data->english_description = $request['english_description'];
        $tender_data->marathi_description = $request['marathi_description'];
        $tender_data->start_date = $request['start_date'];
        $tender_data->end_date = $request['end_date'];
        $tender_data->open_date = $request['open_date'];
        $tender_data->tender_number = $request['tender_number'];
        $tender_data->marathi_pdf = $englishPdf;
        $tender_data->english_pdf = $marathiPdf;
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
        $tender = Tenders::find($id);
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
        $tender_data = Tenders::find($request->id);
        
        if (!$tender_data) {
            return [
                'msg' => 'Tender not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/pdf/tenders/' . $tender_data->marathi_pdf,
            'public/pdf/tenders/' . $tender_data->english_pdf
        ]);

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf = time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/tenders', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/tenders', $marathiPdf);
        
        $tender_data->tender_date = $request['tender_date'];
        $tender_data->english_title = $request['english_title'];
        $tender_data->marathi_title = $request['marathi_title'];
        $tender_data->english_description = $request['english_description'];
        $tender_data->marathi_description = $request['marathi_description'];
        $tender_data->start_date = $request['start_date'];
        $tender_data->end_date = $request['end_date'];
        $tender_data->open_date = $request['open_date'];
        $tender_data->tender_number = $request['tender_number'];
        $tender_data->marathi_pdf = $marathiPdf;
        $tender_data->english_pdf = $englishPdf;
        $tender_data->save();        
     
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
        $tender = Tenders::find($id);
        if ($tender) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/pdf/tenders/'.$tender->marathi_pdf,
                'public/pdf/tenders/'.$tender->english_pdf
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


