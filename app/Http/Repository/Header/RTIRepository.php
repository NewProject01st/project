<?php
namespace App\Http\Repository\Header;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	RTI
};

class RTIRepository  {
	public function getAll()
    {
        try {
            return RTI::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        
        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/header/rti', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/header/rti', $marathiPdf);
        
        
        $rti_data = new RTI();
        $rti_data->english_title = $request['english_title'];
        $rti_data->marathi_title = $request['marathi_title'];
        $rti_data->url = $request['url'];
        $rti_data->english_pdf = $englishPdf;
        $rti_data->marathi_pdf = $marathiPdf;
        $rti_data->save();       
              
		return $rti_data;

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

public function updateAll($request)
{
    try {
        $rti_data = RTI::find($request->id);
        
        if (!$rti_data) {
            return [
                'msg' => 'RTI not found.',
                'status' => 'error'
            ];
        }
        $rti_data->english_title = $request['english_title'];
        $rti_data->marathi_title = $request['marathi_title'];
        $rti_data->url = $request['url'];

        $previousEnglishPdf = $rti_data->english_pdf;
        $previousMarathiPdf = $rti_data->marathi_pdf;

        if($request->hasFile('english_pdf'))
       
        {
            if($previousEnglishPdf)
            {
                //delete previous stored pdf
                Storage::delete('public/pdf/header/rti/' . $previousEnglishPdf );

                //insert new pdf
                $englishPdf = time() . '_english.' . $request->english_pdf->extension();
                $request->english_pdf->storeAs('public/pdf/header/rti/', $englishPdf);
                $rti_data->english_pdf = $englishPdf;
            }

        }

        if($request->hasFile('marathi_pdf'))
       
        {
            if($previousMarathiPdf)
            {
                //delete previous stored pdf
                Storage::delete('public/pdf/header/rti/' . $previousMarathiPdf );

                //insert new pdf
                $marathiPdf = time() . '_marathi.' . $request->marathi_pdf->extension();
                $request->marathi_pdf->storeAs('public/pdf/header/rti/', $marathiPdf);
                $rti_data->marathi_pdf = $marathiPdf;
            }

        }
                
        $rti_data->save();        
     
        return [
            'msg' => 'RTI updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update RTI.',
            'status' => 'error'
        ];
    }
}
public function updateOne($request)
    {
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
public function deleteById($id)
{
    try {
        $rti = RTI::find($id);
        if ($rti) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/pdf/header/rti/'.$rti->marathi_pdf,
                'public/pdf/header/rti/'.$rti->english_pdf
            ]);

            // Delete the record from the database
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