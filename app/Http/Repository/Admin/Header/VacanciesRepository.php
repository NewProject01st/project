<?php
namespace App\Http\Repository\Admin\Header;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	VacanciesHeader
};
use Config;

class VacanciesRepository {
	public function getAll(){
        try {
            return VacanciesHeader::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request){
        try {
            
            $vacancy_data = new VacanciesHeader();
            $vacancy_data->english_title = $request['english_title'];
            $vacancy_data->marathi_title = $request['marathi_title'];
            $vacancy_data->save();       
                
            $last_insert_id = $vacancy_data->id;

            $englishPdfName = $last_insert_id . '_english.' . $request->english_pdf->extension();
            $marathiPdfName = $last_insert_id . '_marathi.' . $request->marathi_pdf->extension();
            
            $vacancy_data = VacanciesHeader::find($last_insert_id); // Assuming $request directly contains the ID
            $vacancy_data->english_pdf = $englishPdfName; // Save the pdf filename to the database
            $vacancy_data->marathi_pdf = $marathiPdfName; // Save the pdf filename to the database
            $vacancy_data->save();
            
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
            $vacancy = VacanciesHeader::find($id);
            if ($vacancy) {
                return $vacancy;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Vacancies.',
                'status' => 'error'
            ];
        }
    }

    public function updateAll($request){
        try {
            $return_data = array();
            $vacancy_data = VacanciesHeader::find($request->id);
            
            if (!$vacancy_data) {
                return [
                    'msg' => 'Vacancies not found.',
                    'status' => 'error'
                ];
            }
            $vacancy_data->english_title = $request['english_title'];
            $vacancy_data->marathi_title = $request['marathi_title'];

            $previousEnglishPdf = $vacancy_data->english_pdf;
            $previousMarathiPdf = $vacancy_data->marathi_pdf;
            $vacancy_data->save();        
        
        //    dd($vacancy_data);
            $last_insert_id = $vacancy_data->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['english_pdf'] = $previousEnglishPdf;
            $return_data['marathi_pdf'] = $previousMarathiPdf;
            return  $return_data;
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Vacancies.',
                'status' => 'error'
            ];
        }
    }
    public function updateOne($request){
        try {
            $vacancy = VacanciesHeader::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($vacancy) {
                $is_active = $vacancy->is_active === 1 ? 0 : 1;
                $vacancy->is_active = $is_active;
                $vacancy->save();

                return [
                    'msg' => 'Vacancies updated successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'Vacancies not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update Vacancies.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id){
        try {
            $vacancy = VacanciesHeader::find($id);
            if ($vacancy) {
                if (file_exists_s3(Config::get('DocumentConstant.VACANCIES_PDF_DELETE') . $vacancy->english_pdf)) {
                    removeImage(Config::get('DocumentConstant.VACANCIES_PDF_DELETE') . $vacancy->english_pdf);
                }
                if (file_exists_s3(Config::get('DocumentConstant.VACANCIES_PDF_DELETE') . $vacancy->marathi_pdf)) {
                    removeImage(Config::get('DocumentConstant.VACANCIES_PDF_DELETE') . $vacancy->marathi_pdf);
                }
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