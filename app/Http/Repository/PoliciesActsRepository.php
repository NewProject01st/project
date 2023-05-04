<?php
namespace App\Http\Repository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	PoliciesActs
};

class PoliciesActsRepository  {
	public function getAll()
    {
        try {
            return PoliciesActs::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/policiesacts', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/policiesacts', $marathiPdf);
        
        $policiesacts_data = new PoliciesActs();
        $policiesacts_data->english_title = $request['english_title'];
        $policiesacts_data->marathi_title = $request['marathi_title'];
        $policiesacts_data->english_description = $request['english_description'];
        $policiesacts_data->marathi_description = $request['marathi_description'];
        $policiesacts_data->marathi_pdf = $englishPdf;
        $policiesacts_data->english_pdf = $marathiPdf;
        $policiesacts_data->save();       
              
		return $policiesacts_data;

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
        $policiesacts = PoliciesActs::find($id);
        if ($policiesacts) {
            return $policiesacts;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Policies Acts.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $policiesacts_data = PoliciesActs::find($request->id);
        
        if (!$policiesacts_data) {
            return [
                'msg' => 'PoliciesActs not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/pdf/policiesacts/' . $policiesacts_data->marathi_pdf,
            'public/pdf/policiesacts/' . $policiesacts_data->english_pdf
        ]);

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/policiesacts', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/policiesacts', $marathiPdf);
        
        $policiesacts_data = PoliciesActs::find($request->$id);
        $policiesacts_data->english_title = $request['english_title'];
        $policiesacts_data->marathi_title = $request['marathi_title'];
        $policiesacts_data->english_description = $request['english_description'];
        $policiesacts_data->marathi_description = $request['marathi_description'];
        $policiesacts_data->marathi_description = $englishPdf;
        $policiesacts_data->marathi_description = $marathiPdf;
        $policiesacts_data->save();          
     
        return [
            'msg' => 'Policies Acts updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Policies Acts.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $policiesacts = PoliciesActs::find($id);
        if ($policiesacts) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/pdf/policiesacts/'.$policiesacts->marathi_pdf,
                'public/pdf/policiesacts/'.$policiesacts->english_pdf
            ]);

            // Delete the record from the database
            $policiesacts->delete();
            
            return $policiesacts;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}

}


