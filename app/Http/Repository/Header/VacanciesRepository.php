<?php
namespace App\Http\Repository\Header;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	VacanciesHeader
};

class VacanciesRepository  {
	public function getAll()
    {
        try {
            return VacanciesHeader::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        
        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();
        
        $request->english_pdf->storeAs('public/pdf/header/vacancy', $englishPdf);
        $request->marathi_pdf->storeAs('public/pdf/header/vacancy', $marathiPdf);
        
        
        $vacancy_data = new VacanciesHeader();
        $vacancy_data->english_title = $request['english_title'];
        $vacancy_data->marathi_title = $request['marathi_title'];
        $vacancy_data->url = $request['url'];
        $vacancy_data->english_pdf = $englishPdf;
        $vacancy_data->marathi_pdf = $marathiPdf;
        $vacancy_data->save();       
              
		return $vacancy_data;

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
        $vacancy = VacanciesHeader::find($id);
        if ($vacancy) {
            return $vacancy;
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
        $vacancy_data = VacanciesHeader::find($request->id);
        
        if (!$vacancy_data) {
            return [
                'msg' => 'Tender not found.',
                'status' => 'error'
            ];
        }
        $vacancy_data->english_title = $request['english_title'];
        $vacancy_data->marathi_title = $request['marathi_title'];
        $vacancy_data->url = $request['url'];

        $previousEnglishPdf = $vacancy_data->english_pdf;
        $previousMarathiPdf = $vacancy_data->marathi_pdf;

        if($request->hasFile('english_pdf'))
       
        {
            if($previousEnglishPdf)
            {
                //delete previous stored pdf
                Storage::delete('public/pdf/header/vacancy/' . $previousEnglishPdf );

                //insert new pdf
                $englishPdf = time() . '_english.' . $request->english_pdf->extension();
                $request->english_pdf->storeAs('public/pdf/header/vacancy/', $englishPdf);
                $vacancy_data->english_pdf = $englishPdf;
            }

        }

        if($request->hasFile('marathi_pdf'))
       
        {
            if($previousMarathiPdf)
            {
                //delete previous stored pdf
                Storage::delete('public/pdf/header/vacancy/' . $previousMarathiPdf );

                //insert new pdf
                $marathiPdf = time() . '_marathi.' . $request->marathi_pdf->extension();
                $request->marathi_pdf->storeAs('public/pdf/header/vacancy/', $marathiPdf);
                $vacancy_data->marathi_pdf = $marathiPdf;
            }

        }

        $vacancy_data->save();        
     
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
        $vacancy = VacanciesHeader::find($id);
        if ($vacancy) {
             // Delete the images from the storage folder
             Storage::delete([
                'public/pdf/header/vacancy/'.$vacancy->marathi_pdf,
                'public/pdf/header/vacancy/'.$vacancy->english_pdf
            ]);

            // Delete the record from the database
            $vacancy->delete();
            
            return $vacancy;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}


       
}