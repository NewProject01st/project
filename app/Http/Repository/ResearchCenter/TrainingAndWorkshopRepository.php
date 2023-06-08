<?php
namespace App\Http\Repository\ResearchCenter;
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
        
        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/research-center/training', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/research-center/training', $marathiPdf);
        
        
        $training_data = new TrainingMaterialsWorkshops();
        $training_data->english_title = $request['english_title'];
        $training_data->marathi_title = $request['marathi_title'];
        // $training_data->url = $request['url'];
        // $training_data->english_description = $request['english_description'];
        // $training_data->marathi_description = $request['marathi_description'];
        $training_data->english_pdf = $englishPdf;
        $training_data->marathi_pdf = $marathiPdf;
        $training_data->save();       
              
		return $training_data;
        dd($training_data);

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
        $update_training = TrainingMaterialsWorkshops::find($request->id);
        
        if (!$update_training) {
            return [
                'msg' => 'Tender not found.',
                'status' => 'error'
            ];
        }

        $update_training->english_title = $request['english_title'];
        $update_training->marathi_title = $request['marathi_title'];
        // $update_training->url = $request['url'];
        // $update_training->english_description = $request['english_description'];
        // $update_training->marathi_description = $request['marathi_description'];

        $previousEnglishPdf = $update_training->english_pdf;
        $previousMarathiPdf = $update_training->marathi_pdf;

        if($request->hasFile('english_pdf'))
       
        {
            if($previousEnglishPdf)
            {
                //delete previous stored pdf
                Storage::delete('public/pdf/research-center/training/' . $previousEnglishPdf );

                //insert new pdf
                $englishPdf = time() . '_english.' . $request->english_pdf->extension();
                $request->english_pdf->storeAs('public/pdf/research-center/training/', $englishPdf);
                $update_training->english_pdf = $englishPdf;
            }

        }

        if($request->hasFile('marathi_pdf'))
       
        {
            if($previousMarathiPdf)
            {
                //delete previous stored pdf
                Storage::delete('public/pdf/research-center/documents/' . $previousMarathiPdf );

                //insert new pdf
                $marathiPdf = time() . '_marathi.' . $request->marathi_pdf->extension();
                $request->marathi_pdf->storeAs('public/pdf/research-center/documents/', $marathiPdf);
                $update_training->marathi_pdf = $marathiPdf;
            }

        }
                
        $update_training->save();        
     
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
        $training = TrainingMaterialsWorkshops::find($id);
        if ($training) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/pdf/research-center/training'.$training->marathi_pdf,
                'public/pdf/research-center/training'.$training->english_pdf
            ]);

            // Delete the record from the database
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